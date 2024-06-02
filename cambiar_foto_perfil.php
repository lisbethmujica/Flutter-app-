<?php
session_start();

// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "db_veterinaria");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

function guardar_archivos($archivo, $extensiones_permitidas) {
    $nombre_archivo = $archivo["name"] ; // Nombre de nuestro archivo
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION)); // Extensión de nuestro archivo
    $archivo_temporal = $archivo["tmp_name"] ; // Ruta temporal a donde se carga el archivo 

    // Carpeta donde subiremos nuestros archivos
    $carpeta_destino = "files";

    // Ruta donde se guardará el archivo
    $archivo_destino = $carpeta_destino . '/' .uniqid('fotoperfil_') .".$extension";

    // Si la carpeta no existe, la creamos
    if (!file_exists($carpeta_destino)) {
        mkdir($carpeta_destino, 0777, true);
    };

    // Validamos el tamaño del archivo
    $file_size = $archivo["size"] ;
    if ($file_size > 1000000) {
        echo "El archivo es muy pesado";
        return false;
    }

    // Validamos la extensión del archivo
    if (!in_array($extension, $extensiones_permitidas)) {
        echo "extension no permitida";
        return false;
    }

    // Movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
    if (move_uploaded_file($archivo_temporal, $archivo_destino)) {
        echo "Se movio correctamente";
        return $archivo_destino;
    } else {
        return false;
    }
}

    // Verificar si se envió el formulario
    // Obtener los archivos subidos
    $archivo = $_FILES['foto'];

    // Definir las extensiones permitidas
    $extensiones_permitidas = array('jpg', 'jpeg', 'png', 'gif');

    
    $ruta_guardada = guardar_archivos($archivo, $extensiones_permitidas);
    if ($ruta_guardada){
        $query = "UPDATE nuevo SET ruta_imagen = '$ruta_guardada' WHERE id = {$_SESSION['usuario']['id']}";
        $result = mysqli_query($conexion, $query);

        if($result){
            echo json_encode([
                'result'=>'OK',
                'url'=>$ruta_guardada
            ]);
            mysqli_close($conexion);

            exit;
        }
        echo json_encode([
            'result'=>'fail',
            'url'=>NULL
        ]);
    }


    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
