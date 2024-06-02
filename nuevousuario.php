<?php
session_start();

// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "db_veterinaria");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Verificar si los campos están definidos antes de obtener sus valores
$id_codigo = isset($_POST['id_codigo']) ? mysqli_real_escape_string($conexion, $_POST['id_codigo']) : '';
$id_nuevacontrasena = isset($_POST['id_nuevacontrasena']) ? mysqli_real_escape_string($conexion, $_POST['id_nuevacontrasena']) : '';

// Crear la consulta para verificar si el usuario ya existe
$verificar_usuario = "SELECT * FROM nuevo WHERE id_codigo = '$id_codigo'";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $verificar_usuario);

// Verificar si el usuario ya existe
if (mysqli_num_rows($resultado) > 0) {
    echo "El usuario ya está registrado";
} else {
    // Generar un valor aleatorio para la columna "id"
    $id = rand(1, 1000);

    // Crear la consulta para insertar un nuevo registro
    $query = "INSERT INTO nuevo (id, id_codigo, id_nuevacontrasena) VALUES ('$id', '$id_codigo', '$id_nuevacontrasena')";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $query)) {
        echo "Registro insertado exitosamente";
    } else {
        echo "Error al insertar el registro: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
<br><br>
<button class="btn-login" style="background-color: rgb(184, 230, 59); color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;"><a href="nuevo.php" style="color: #fff; text-decoration: none;">Regresar</a></button>