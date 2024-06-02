<?php
session_start();

// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "db_veterinaria");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

function guardar_archivos($archivo, $key, $extensiones_permitidas) {
    $nombre_archivo = $archivo["name"][$key]; // Nombre de nuestro archivo
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION)); // Extensión de nuestro archivo
    $archivo_temporal = $archivo["tmp_name"][$key]; // Ruta temporal a donde se carga el archivo 

    // Carpeta donde subiremos nuestros archivos
    $carpeta_destino = "files";

    // Ruta donde se guardará el archivo
    $archivo_destino = $carpeta_destino . '/' . uniqid('resultado_') .".$extension";

    // Si la carpeta no existe, la creamos
    if (!file_exists($carpeta_destino)) {
        mkdir($carpeta_destino, 0777, true);
    };

    // Validamos el tamaño del archivo
    $file_size = $archivo["size"][$key];
    if ($file_size > 1000000) {
        echo "El archivo es muy pesado";
        return false;
    }

    // Validamos la extensión del archivo
    if (!in_array($extension, $extensiones_permitidas)) {
        echo "";
        return false;
    }

    // Movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
    if (move_uploaded_file($archivo_temporal, $archivo_destino)) {
        echo "El archivo " . htmlspecialchars(basename($nombre_archivo)) . " ha sido cargado con éxito.  <br><br>" ;
        
        return $archivo_destino;
       
        
    } else {
        echo "Ha habido un error al cargar tu archivo.";
        return false;
    }
}

// Verificar si se envió el formulario
if (isset($_POST['submit'])) {
    // Obtener los archivos subidos
    $archivos = $_FILES['archivo'];

    // Definir las extensiones permitidas
    $extensiones_permitidas = array('jpg', 'jpeg', 'png', 'gif');

    // Array para almacenar las rutas de los archivos guardados
    $rutas_guardadas = array();

    // Recorrer los archivos subidos
    foreach ($archivos['name'] as $key => $nombre_archivo) {
        // Guardar archivo y obtener la ruta de guardado
        $ruta_guardada = guardar_archivos($archivos, $key, $extensiones_permitidas);
        
        if ($ruta_guardada) {
            // Agregar la ruta a la lista de rutas guardadas
            $rutas_guardadas[] = $ruta_guardada;
        }
    }

    // Insertar las rutas en la base de datos
    foreach ($rutas_guardadas as $ruta) {
        $query = "INSERT INTO tratamiento (idPaciente, url) VALUES (?,?)";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt,'is', $_SESSION['usuario']['id'], $ruta);
        $result = mysqli_execute($stmt);
        if($result){
            echo "Se registro correctamente!<br>";
            continue;
        }
            echo "Fallo al registrar el archivo en la base de datos!<br>";
    }

   
    
$sqltimeline = "INSERT INTO timeline(idPaciente) VALUES({$_SESSION['usuario']['id']})";

$resultado_timeline = mysqli_query($conexion, $sqltimeline);
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
<br><br>
<button class="btn-login" style="background-color: rgb(184, 230, 59); color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;"><a href="resultados.php" style="color: #fff; text-decoration: none;">Continuar</a></button>


