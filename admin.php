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
  <link rel="stylesheet" href="css/stilosadmin.css">
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

    <div class="total">
      <section class="admin">
        <h2>Análisis Clínico</h2>
  </div>
<div style="margin-left: 70px; margin-top: 50px;">
    <?php
    echo "<h2>Bienvenido: " . $_SESSION['usuario']['id_codigo'] . "</h2>";
    if ($_SESSION['usuario']['id_codigo'] == 'admin') {
        // Código adicional aquí
    }
    ?>
   
</div>
    <div class="cajones">
      <a href="historialclinico.php" class="caja1 caja">
        <p>Historial  Clínico (Animales Domésticos y Silvestres)</p>
      </a>


      <a href="formularioparavet.php" class="caja2 caja">
        <p>Solicitudes para Exámenes del Laboratorio Paravet</p>
      </a>

      <a href="formulariobiomet.php" class="caja7 caja">
        <p>Solicitudes para Exámenes del Laboratorio Biomet</p>
      </a>

      <a href="resultados.php" class="caja3 caja">
        <p>Resultados de los Exámenes</p>
      </a>
    
      <a href="fotos.php" class="caja4 caja">
        <p>Fotos</p>
      </a>
    
      <a href="videos.php" class="caja5 caja">
        <p>Videos</p>
      </a>
    
      <a href="tratamiento.php" class="caja6 caja">
        <p>Tratamiento</p>
      </a>
    </div>
  
  
</body>
</html>



