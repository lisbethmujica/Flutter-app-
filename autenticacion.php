<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: admin.php');
    die();
}

include("db.php");

if (!isset($_POST['id_codigo']) || !isset($_POST['id_nuevacontrasena'])) {
    header('Location: login.php');
    die();
}

$id_codigo = $_POST['id_codigo'];
$id_nuevacontrasena = $_POST['id_nuevacontrasena'];

$conexion = mysqli_connect("localhost", "root", "", "db_veterinaria");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Verificar si los campos están definidos antes de obtener sus valores
$id_codigo = isset($_POST['id_codigo']) ? mysqli_real_escape_string($conexion, $_POST['id_codigo']) : '';
$id_nuevacontrasena = isset($_POST['id_nuevacontrasena']) ? mysqli_real_escape_string($conexion, $_POST['id_nuevacontrasena']) : '';

// Crear la consulta para verificar si el usuario y contraseña coinciden en la tabla "nuevo"
$verificar_usuario = "SELECT * FROM nuevo WHERE id_codigo = '$id_codigo' AND id_nuevacontrasena = '$id_nuevacontrasena'";

$result = mysqli_query($conexion, $verificar_usuario);

if (mysqli_num_rows($result) == 1) {
    // El usuario y contraseña coinciden en la tabla "nuevo"
    $row = mysqli_fetch_assoc($result);
    $_SESSION['usuario'] = $row;
    
    if ($_SESSION['usuario']['rol'] == 2){
        header('Location: admin.doctor.php');
        die();
    }
    header('Location: admin.php');
    die();
} else {
    // El usuario y contraseña no coinciden o no existen en la tabla "nuevo"
    header('Location: login.php');
    die();
}