<?php
session_start();

// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "db_veterinaria");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Verificar si los campos están definidos antes de obtener sus valores
$id_usuario = isset($_POST['id_usuario']) ? mysqli_real_escape_string($conexion, $_POST['id_usuario']) : '';
$id_nuevacontrasena = isset($_POST['id_nuevacontrasena']) ? mysqli_real_escape_string($conexion, $_POST['id_nuevacontrasena']) : '';

// Crear la consulta para verificar si el usuario existe y actualizar la contraseña
$query = "UPDATE nuevo SET id_nuevacontrasena = '$id_nuevacontrasena' WHERE id_usuario = '$id_usuario'";

// Ejecutar la consulta
if (mysqli_query($conexion, $query)) {
    echo "Contraseña actualizada exitosamente";
} else {
    echo "Error al actualizar la contraseña: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>
<br><br>
<button class="btn-login" style="background-color: rgb(184, 230, 59); color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;"><a href="admin.doctor.php" style="color: #fff; text-decoration: none;">Regresar</a></button>