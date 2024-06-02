<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:title" content="Clinica V. Tienda de Mascotas">
  <meta property="og:url" content="https://www.instagram.com/cvtiendademascotas/?hl=es">
  <meta property="og:description" content="Dr.Henrry Graterol👨🏻‍⚕️Cirugía🔍Control general 🐶Vacunas💉Productos💊baños químicos🐩Tramites Viajes para mascotas✈️Formación de auxiliares veterinarios🚑">
  <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
  <link rel="stylesheet" href="css/stiloshistorial.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Clinica V. Tienda de Mascotas</title>
</head>
<body>
<nav class="nav-wrapper">
  </nav>

  <nav class="menu">  

  <div class="logo">
  <form id="formulario-imagen">
      <input id="fileinput" type="file" name="fileinput" style="display: none;">
      <label for="fileinput">
     <i id="icono" class="fas fa-edit"></i> 
      </label>
    </form>
    


    <?php if (isset($_SESSION['usuario']['ruta_imagen'])): ?>
      <img id="ruta_imagen" src="<?php echo $_SESSION['usuario']['ruta_imagen']; ?>" class="circulo" />
    <?php else: ?>
      <img id="ruta_imagen" src="https://images.unsplash.com/photo-1561037404-61cd46aa615b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVycm98ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" class="circulo" />
    <?php endif; ?>
  </div>

<script>

    const input = document.getElementById('fileinput');


    const upload = (file) => {
      const form = new FormData()
      form.append('foto', file)
      fetch('http://localhost/veterinaria/cambiar_foto_perfil.php', {
        method: 'POST',
        body: form 
      }).then(
        response => response.text() 
      ).then(
        success => console.log(success) 
      ).catch(
        error => console.log(error) 
      );
    };

   
    const onSelectFile = () => {
      upload(input.files[0]);
      document.getElementById('ruta_imagen').src = URL.createObjectURL(input.files[0])
    }


    input.addEventListener('change', onSelectFile, false)

  </script>
  
    <label class="abrir" for="menu-check">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAFJJREFUSEtjZKAxYKSx+QyjFhAMYfoH0Y5n1v8JOguPAg+poyiOxvABzS2gxPXY9NI/DmjuA5rHAc0toHkQDX0LaB4HNLdg6MfBqA/QQ4DmpSkAtTYYGXTnLk4AAAAASUVORK5CYII=">
    </label>
    <input type="checkbox" id="menu-check" name="menu-check" checked>
    
     <br>
    <h1><?php echo $_SESSION['usuario']['id_codigo']; ?></h1>


<br>

    <ul>
      <li><a href="perfil.php">Perfil</a></li>
      <li><a href="admin.php">Regresar</a></li>
      <li><a href="exit.php">Salir</a></li>
    </ul>
    <br>
    <p>0414-5700663</p>
    <p>Clinica V.Tienda de Mascotas</p>
    <p>Dr. Henrry Graterol</p>
  </nav>
    
 
 
      <?php if (intval($_SESSION['usuario']['rol']) === 2): ?>
    <div class="modulo">
      <li><a href="doctor.php">Descargar</a></li>
    </div>
    <?php endif; ?>


  <!-- Cierra de la Barra de Busqueda -->
     
   
    <!-- Inicio del formulario  del Propietario -->
    <div class="propietario">
  <h2>Datos del Propietario</h2>
</div>
<br>
<form action="historiales.php" method="POST">
  <b><label for="nombre">Nombre:</label></b>
  <input type="text" id="nombre" name="nombre" required>

  <b><label for="ci">C.I:</label></b>
  <input type="text" id="ci" name="ci">

  <b><label for="direccion">Dirección:</label></b>
  <input type="text" id="direccion" name="direccion"required>

  <b><label for="telefono">Teléfono fijo o de casa:</label></b>
  <input type="text" id="telefono" name="telefono" required>

  <b><label for="motivo">Motivo de la consulta:</label></b>
  <textarea id="motivo" name="motivo"></textarea required>

  <b><label for="anamnesico">Anamnéstico:</label></b>
  <input type="text" id="anamnesico" name="anamnesico"required>

  <b><label for="municipio">Municipio:</label><br></b>
  <select id="municipio" name="municipio"required>
    <option value="munioption">Seleccione una opción</option>
    <option value="Alberto Arvelo Torrealba">Alberto Arvelo Torrealba</option>
    <option value="Andrés Eloy Blanco">Andrés Eloy Blanco</option>
    <option value="Antonio José de Sucre">Antonio José de Sucre</option>
    <option value="Arismendi">Arismendi</option>
    <option value="Barinas">Barinas</option>
    <option value="Bolívar">Bolívar</option>
    <option value="Cruz Paredes">Cruz Paredes</option>
    <option value="">José Antonio Páez</option>
    <option value="">Ezequiel Zamora</option>
    <option value="">Obispos</option>
    <option value="">Pedraza</option>
    <option value="">Rojas</option>
    <option value="">Sosa</option>
  </select><br><br>

  <!-- Inicio del formulario del Paciente -->
  <div class="paciente">
    <h2>Datos del Paciente</h2>
  </div>
  <br>
  <b><label for="nombre_pacient">Nombre:</label></b>
  <input type="text" id="nombre_paciente" name="nombre_paciente"required><br>

  <b><label for="especi">Especie:</label></b>
  <input type="text" id="especie" name="especie"required><br>

  <b><label for="color">Color:</label></b>
  <input type="text" id="color" name="color"required><br>

  <b><label for="sex">Sexo:</label></b>
  <input type="radio" id="sexo-macho" checked name="sexo" value="Macho"required>
  <b><label for="sexo-macho">Macho</label></b>
  <input type="radio" id="sexo-hembra" checked name="sexo" value="Hembra"required>
  <b><label for="sexo-hembra">Hembra</label><br></b><br>

  <b><label for="eda">Edad:</label></b><br>
  <input type="number" id="edad" name="edad" requiere><br><br>

  <b><label for="fechaNacimient">Fecha de nacimiento:</label></b><br>
  <input type="date" id="fechaNacimiento" name="fechaNacimiento"required><br><br>

  <b><label for="procedenci">Procedencia:</label></b><br>
  <input type="text" id="procedencia" name="procedencia" required><br>

  <!-- Inicio del formulario del Historial del Paciente-->
  <div class="vacunacion">
    <h2>Historia del Paciente</h2>
  </div>
  <br>
  <label for="Vacunado"><b>¿Fue Vacunado?</b></label>
  <input type="text" id="vacunado" name="vacunado"required>

  <label for="vacunado_fecha"><b>fecha:</b></label>
  <input type="date" id="vacunado_fecha" name="vacunado_fecha"required><br>

  <label for="vacunas_caninas"><b>Vacunas Caninas:</b></label>
  <select id="vacunas_caninas" name="vacunas_caninas"required>
    <option value="selected">Seleccione...</option>
    <option value="NO">NO</option>
    <option value="PV">PV</option>
    <option value="TRIPLE">TRIPLE</option>
    <option value="RABIA">RABIA</option>
    <option value="SEXTUPLE">SEXTUPLE</option>
  </select>

  <div class="felinos">
    <label for="vacunas_felinas"><b>Vacunas Felinas:</b></label>
    <select id="vacunas_felinas" name="vacunas_felinas"required>
      <option value="selected">Seleccione...</option>
      <option value="NO">NO</option>
      <option value="TRIPLE">TRIPLE</option>
      <option value="RABIA">RABIA</option>
      <option value="OTRA">OTRA</option>
    </select>
  </div>

  <br><br>

  <label for="desparasitacion"><b>¿Fue Desparasitado?</b></label>
  <input type="text" id="desparasitacion" name="desparasitacion"required>

  <label for="desparasitacion_fecha"><b>fecha:</b></label>
  <input type="date" id="desparasitacion_fecha" name="desparasitacion_fecha"required><br>

  <div class="producto">
    <b><label for="producto">Producto:</label></b>
    <input type="text" id="producto" name="producto"required>
  </div>

  <div class="Estado">
    <label for="estado_reproductivo"><b>Estado Reproductivo:</b></label>
    <select id="estado_reproductivo" name="estado_reproductivo"required>
      <option value="selected">Seleccione...</option>
      <option value="CASTRADO">CASTRADO</option>
      <option value="ENTERO">ENTERO</option>
      <option value="GESTACION">GESTACION</option>
      <option value="LACTANTE">LACTANTE</option>
    </select>
  </div>

  <div class="Alimentacion">
    <label for="alimentacion"><b>Alimentacion:</b></label>
    <select id="alimentacion" name="alimentacion" required>
      <option value="selected">Seleccione...</option>
      <option value="MIXTA">MIXTA</option>
      <option value="CONCENTRADA">CONCENTRADA</option>
    </select>
  </div>

  <div class="alergias">
    <label for="alergias"><b>Alergias:</b></label>
    <input type="text" id="alergias" name="alergias"required>
  </div>

  <div class="enfermedades">
    <label for="enfermedades_anteriores"required><b>Enfermedades Anteriores:</b></label>
    <input type="text" id="enfermedades_anteriores" name="enfermedades_anteriores"requiere>
  </div>
</div>

<div class="habitat">
  
    <label for="habitat"><b>Habitat:</b></label>
    <select id="habitat" name="habitat"required>
      <option value="selected">Seleccione...</option>
      <option value="CASA">CASA</option>
      <option value="APTO">APTO</option>
      <option value="FINCA">FINCA</option>
      <option value="OTRO">OTRO</option>
    </select>
  
<br>
<br>
  
    <label for="alimentacion"><b>Alimentación:</b></label>
    <select id="alimentacion" name="alimentacion"required>
      <option value="temperatura">Seleccione...</option>
      <option value="fcardiaca">Mixta</option>
      <option value="respiracion">Concentrada</option>
    </select>
</div>

<br>
<br>

<div class="fisiologicas">
  <h2>Constantes Fisiologicas</h2>
</div>
<br>

  <label for="constantes_fisiologicas"><b>Constantes Fisiologicas:</b></label>
  <br>
  <label for="temperatura"><b> Temperatura</b></label>
  <input type="number" id="temperatura" value=0 name="temperatura"required>
   <br>
   <label for="fcardiaca"><b>F. Cardiaca</b></label>
  <input type="number" step="1" value=0 id="fcardiaca" name="fcardiaca"required>
  <br>
  <label for="respiracion"><b>Respiración</b></label>
  <input type="number" value=0 id="respiracion" name="respiracion"required>
    <br>
    <label for="peso"><b>Peso</b></label>
  <input type="number" value=0 step="1" id="peso" name="peso"required>
   
<!-- Cierre del formulario de las Constantes Fisiologicas-->

<br>
<br>

<!-- Inicio del botón -->

  <input type="submit" value="Enviar">
</form>
<!-- Cierre del botón -->
</html>
</body>
