<?php
session_start();

if (!isset($_SESSION['usuario'])) {
   header('Location: login.php');
   exit();
 }

$conexion = mysqli_connect("localhost", "root", "", "db_veterinaria");

// Verificar si la conexión fue exitosa
if (!$conexion) {
   die("Error al conectar con la base de datos: " . mysqli_connect_error());
   return;
}

// Obtener los datos del formulario y escaparlos para evitar inyección de SQL
$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$ci = mysqli_real_escape_string($conexion, $_POST["ci"]);
$direccion = mysqli_real_escape_string($conexion, $_POST["direccion"]);
$telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);
$motivo = mysqli_real_escape_string($conexion, $_POST["motivo"]);
$anamnesico = mysqli_real_escape_string($conexion, $_POST["anamnesico"]);
$municipio = mysqli_real_escape_string($conexion, $_POST["municipio"]);
$nombre_paciente = mysqli_real_escape_string($conexion, $_POST["nombre_paciente"]);
$especie = mysqli_real_escape_string($conexion, $_POST["especie"]);
$color = mysqli_real_escape_string($conexion, $_POST["color"]); 
$sexo = mysqli_real_escape_string($conexion, $_POST["sexo"]);

$edad = mysqli_real_escape_string($conexion, $_POST["edad"]);
$fechaNacimiento = mysqli_real_escape_string($conexion, $_POST["fechaNacimiento"]);
$procedencia = mysqli_real_escape_string($conexion, $_POST["procedencia"]);
$vacunado = mysqli_real_escape_string($conexion, $_POST["vacunado"]);
$vacunado_fecha = mysqli_real_escape_string($conexion, $_POST["vacunado_fecha"]);
$vacunas_caninas = mysqli_real_escape_string($conexion, $_POST["vacunas_caninas"]);
$vacunas_felinas = mysqli_real_escape_string($conexion, $_POST["vacunas_felinas"]);
$desparasitacion = mysqli_real_escape_string($conexion, $_POST["desparasitacion"]);
$desparasitacion_fecha = mysqli_real_escape_string($conexion, $_POST["desparasitacion_fecha"]);
$producto = mysqli_real_escape_string($conexion, $_POST["producto"]);
$estado_reproductivo = mysqli_real_escape_string($conexion, $_POST["estado_reproductivo"]);
$alimentacion = mysqli_real_escape_string($conexion, $_POST["alimentacion"]);
$alergias = mysqli_real_escape_string($conexion, $_POST["alergias"]);
$enfermedades_anteriores = mysqli_real_escape_string($conexion, $_POST["enfermedades_anteriores"]);
$habitat = mysqli_real_escape_string($conexion, $_POST["habitat"]);
$temperatura = mysqli_real_escape_string($conexion, $_POST["temperatura"]);
$fcardiaca = mysqli_real_escape_string($conexion, $_POST["fcardiaca"]);
$respiracion = mysqli_real_escape_string($conexion, $_POST["respiracion"]);
$peso = mysqli_real_escape_string($conexion, $_POST["peso"]);
// Insertar datos en la tabla "propietario"
$sqlpropietario = "INSERT INTO propietario (nombre, ci, direccion, telefono, motivo, anamnesico, municipio)
VALUES ('$nombre', '$ci', '$direccion', '$telefono', '$motivo', '$anamnesico', '$municipio')";
$resultado = mysqli_query($conexion, $sqlpropietario);

// Verificar si la inserción en la tabla "propietario" fue exitosa
if ($resultado) {
   $propietario_id = mysqli_insert_id($conexion);
   
   // Insertar datos en la tabla "pacientes"
   $sqlpacientes = "INSERT INTO pacientes (idPaciente, idPropietario, nombre_paciente, especie, color, sexo, edad, fechaNacimiento, procedencia)
   VALUES ({$_SESSION['usuario']['id']},'$propietario_id', '$nombre_paciente', '$especie', '$color', '$sexo', '$edad', '$fechaNacimiento', '$procedencia')";
   $resultadopacientes = mysqli_query($conexion, $sqlpacientes);
   $paciente_id = mysqli_insert_id($conexion);
   
   // Insertar datos en la tabla "historial_paciente"
   $sqlhistorial_paciente = "INSERT INTO historial_paciente (idPaciente, vacunado, vacunado_fecha, vacunas_caninas, vacunas_felinas, desparasitacion, desparasitacion_fecha, producto, estado_reproductivo, alimentacion, alergias, enfermedades_anteriores, habitat)
   VALUES ('$paciente_id','$vacunado', '$vacunado_fecha', '$vacunas_caninas', '$vacunas_felinas', '$desparasitacion', '$desparasitacion_fecha', '$producto', '$estado_reproductivo', '$alimentacion', '$alergias', '$enfermedades_anteriores', '$habitat')";
   $resultadohistorialpaciente = mysqli_query($conexion, $sqlhistorial_paciente);

   // Insertar datos en la tabla "constantes_fisiologicas"
   $sqlconstantes_fisiologicas = "INSERT INTO constantes_fisiologicas (idPaciente, temperatura,fcardiaca,respiracion,peso)
   VALUES ('$paciente_id','$temperatura','$fcardiaca','$respiracion','$peso')";
   $resultadoconstantes_fisiologicas = mysqli_query($conexion, $sqlconstantes_fisiologicas);

   // Insertar datos en la tabla "constantes_fisiologicas"
   $timeline = "INSERT INTO timeline (idPaciente)
   VALUES ('$paciente_id')";
   $resultado_timeline = mysqli_query($conexion, $timeline);

   
   if ($resultadopacientes && $resultadohistorialpaciente && $resultadoconstantes_fisiologicas && $resultado_timeline) {
      echo "Información enviada con éxito <br><br>";
      
      echo '<button class="btn-login" style="background-color: rgb(184, 230, 59); color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;"><a href="historialclinico.php" style="color: #fff; text-decoration: none;">Regresar</a></button>';
   } else {
      echo "Error al enviar la información ". mysqli_error($conexion);
   }
} else {
   echo "Error al insertar la información en la base de datos" . mysqli_error($conexion);
}

// Cerrar la conexión con la base de datos
mysqli_close($conexion);
?>



 

