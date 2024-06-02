<?php
session_start();
$datetime = new DateTime('tomorrow');
$lowdate = (isset($_GET['lowdate']))? date('Y-m-d H:i:s', strtotime($_GET['lowdate'])) : date('Y-m-d H:i:s', strtotime("-3 weeks"));
$highdate = (isset($_GET['highdate']))? date('Y-m-d H:i:s', strtotime($_GET['highdate'])) : $datetime->format('Y-m-d H:i:s');


if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit();
}

if ($_SESSION['usuario']['rol'] != 2) {
    header('Location: exit.php');
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
  <link rel="stylesheet" href="css/stilostarjetausuario.css">
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

    // Select your input type file and store it in a variable
    const input = document.getElementById('fileinput');

    // This will upload the file after having read it
    const upload = (file) => {
      const form = new FormData()
      form.append('foto', file)
      fetch('http://localhost/veterinaria/cambiar_foto_perfil.php', { // Your POST endpoint
        method: 'POST',
        body: form // This is your file object
      }).then(
        response => response.text() // if the response is a JSON object
      ).then(
        success => console.log(success) // Handle the success response object
      ).catch(
        error => console.log(error) // Handle the error response object
      );
    };

    // Event handler executed when a file is selected
    const onSelectFile = () => {
      upload(input.files[0]);
      document.getElementById('ruta_imagen').src = URL.createObjectURL(input.files[0])
    }

    // Add a listener on your input
    // It will be triggered when a file will be selected
    input.addEventListener('change', onSelectFile, false)

  </script>
  
    <label class="abrir" for="menu-check">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAFJJREFUSEtjZKAxYKSx+QyjFhAMYfoH0Y5n1v8JOguPAg+poyiOxvABzS2gxPXY9NI/DmjuA5rHAc0toHkQDX0LaB4HNLdg6MfBqA/QQ4DmpSkAtTYYGXTnLk4AAAAASUVORK5CYII=">
    </label>
    <input type="checkbox" id="menu-check" name="menu-check" checked>
    
     <br>
    <h1><?php echo $_SESSION['usuario']['id_usuario']; ?></h1>

<br>

    <ul>
     
      <li><a href="dr.clave.php">Cambiar Clave</a></li>
      <li><a href="exit.php">Salir</a></li>
    </ul>
    <br>
    <p>0414-5700663</p>
    <p>Clinica V.Tienda de Mascotas</p>
    <p>Dr. Henrry Graterol</p>
  </nav>
    
 

  <div class="total">
      <section class="admin">
        <h2>Análisis Clínico</h2>
        <form method="get">
          <label for="lowdate">Fecha de inicio: </label>
          <input type="datetime-local" onchange="form.submit()" name="lowdate" value="<?=date('Y-m-d\TH:i', strtotime($lowdate))?>">
          <label for="highdate">Fecha de fin: </label>
          <input type="datetime-local" onchange="form.submit()" name="highdate" value="<?=date('Y-m-d\TH:i', strtotime($highdate))?>">
        </form> 
      </section>

     
      <div style="margin-left: 70px; margin-top: 50px;">
    <h2><?php echo "Bienvenido: " . $_SESSION['usuario']['id_usuario']; ?></h2>
    <?php if ($_SESSION['usuario']['id_usuario'] == 'admin'): ?>
        <!-- Código adicional aquí -->
    <?php endif; ?>
</div>
    <div class="cajones">
    <?php
      include_once 'db.php';
      $query = "SELECT id, id_codigo, ruta_imagen FROM nuevo WHERE id in
        (SELECT idPaciente FROM timeline WHERE create_time
        BETWEEN '$lowdate' AND '$highdate'
        GROUP BY idPaciente ORDER BY id DESC)";
       
      $res = mysqli_query($conexion, $query);
      if(mysqli_num_rows($res) <= 0){
        ?>
          <center>No hay resultados</center>
        <?php
      }else{
        while($row = mysqli_fetch_assoc($res)){
        ?>

          <a href="admindr/datosusuario.php?idPaciente=<?=$row['id']?>" class="caja1 caja">
        <img src="<?=$row['ruta_imagen']?>"><?=$row['id_codigo']?>
          </a>

        <?php
        }

      }
    ?>
   
  
  
</body>
</html>



