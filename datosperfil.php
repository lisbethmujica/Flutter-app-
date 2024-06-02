<?php
$conexion = mysqli_connect("localhost", "root", "", "db_veterinaria");

// Verificar si la conexión fue exitosa
if (!$conexion) {
   die("Error al conectar con la base de datos: " . mysqli_connect_error());
   return;
}

// Verificar si se enviaron datos mediante el formulario
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario y escaparlos para evitar inyección de SQL
    $peso = mysqli_real_escape_string($conexion, $_POST['peso']);
    $Tamano = mysqli_real_escape_string($conexion, $_POST['Tamano']);
    $color = mysqli_real_escape_string($conexion, $_POST['color']);

    // Insertar los datos en la tabla "perfil"
    $sqlperfil = "INSERT INTO perfil (Peso, Tamano, Color) VALUES ('$peso', '$Tamano', '$color')";
    $resultado = mysqli_query($conexion, $sqlperfil);

    // Verificar si la inserción en la tabla "perfil" fue exitosa
    if ($resultado) {
        $id = mysqli_insert_id($conexion);
        // Continuar con el resto del código...
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar en la tabla perfil: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
<br><br>
<button class="btn-login" style="background-color: rgb(184, 230, 59); color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;"><a href="login.php" style="color: #fff; text-decoration: none;">Regresar</a></button>
  </div>