<?php
session_start();

// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "db_veterinaria");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

function guardar_archivos($archivo, $extensiones_permitidas) {
    $nombre_archivo = $archivo["name"]; // Nombre de nuestro archivo
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION)); // Extensión de nuestro archivo
    $archivo_temporal = $archivo["tmp_name"]; // Ruta temporal a donde se carga el archivo 

    // Carpeta donde subiremos nuestros archivos
    $carpeta_destino = "/files";

    // Ruta donde se guardará el archivo
    $archivo_destino = $carpeta_destino . '/' . uniqid('video_') . ".$extension";

    // Si la carpeta no existe, la creamos
    if (!file_exists($carpeta_destino)) {
        mkdir($carpeta_destino, 0777, true);
    }

    // Validamos el tamaño del archivo
    $file_size = $archivo["size"];
    $tamanio_maximo = 1000000 * 300; // Tamaño máximo permitido (1 MB)
    if ($file_size > $tamanio_maximo) {
        echo "El archivo es muy pesado";
        return false;
    }

    // Validamos la extensión del archivo
    if (!in_array($extension, $extensiones_permitidas)) {
        echo "Solo se permiten archivos de video tipo MP4, AVI y MOV";
        return false;
    }
    // Movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
    if (move_uploaded_file($archivo_temporal, __dir__.$archivo_destino)) {
        echo "El archivo " . htmlspecialchars(basename($nombre_archivo)) . " ha sido cargado con éxito.<br><br>";
        return $archivo_destino;
    } else {
        echo "Ha habido un error al cargar tu archivo.";
        return false;
    }
}
// Verificar si se envió el formulario
if (isset($_POST['submit'])) {
    // Obtener los archivos subidos
    if (isset($_FILES['archivo'])) {
        $archivo = $_FILES['archivo'];
        // Verificar si se seleccionaron archivos
        if (!empty($archivo['name'])) {
            // Definir las extensiones permitidas
            $extensiones_permitidas = array('mp4', 'avi', 'mov');

            // Guardar archivo y obtener la ruta de guardado
            $ruta_guardada = guardar_archivos($archivo, $extensiones_permitidas);
            
            if ($ruta_guardada === false) {
                // Agregar la ruta a la lista de rutas guardadas
                echo "No se pudo guardar el archivo";
                exit;
            }
            
            // Insertar las rutas en la base de datos
            $query = "INSERT INTO videos (idPaciente, url) VALUES (?,?)";
            $stmt = mysqli_prepare($conexion, $query);
            
            $idPaciente = $_SESSION['usuario']['id'];

            $host = $_SERVER['HTTP_HOST'];
            $protocol=$_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
            $ruta_guardada = "$protocol://$host/veterinaria$ruta_guardada";
            mysqli_stmt_bind_param($stmt, "is", $idPaciente, $ruta_guardada);
            $res = mysqli_execute($stmt);
            if ($res){
                echo "<br>Se guardo correctamente en la base de datos";
            }else{
                echo "<br>No se guardo en la base de datos " . mysqli_error($conexion);
            }

        } else {
            echo "<br>No se han seleccionado archivos.";
        }
    } else {
        echo "<br>No se ha recibido el campo de archivo en el formulario.";
    }

    $sqltimeline = "INSERT INTO timeline(idPaciente) VALUES({$_SESSION['usuario']['id']})";

    $resultado_timeline = mysqli_query($conexion, $sqltimeline);
    // Cerrar la conexión a la base de datos
  
    mysqli_close($conexion);
}
?>
<br><br>
<button class="btn-login" style="background-color: rgb(184, 230, 59); color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;"><a href="resultados.php" style="color: #fff; text-decoration: none;">Continuar</a></button>

