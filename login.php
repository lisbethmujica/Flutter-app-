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
  <link rel="stylesheet" href="css/stiloslogin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Clinica V. Tienda de Mascotas</title>
</head>
<body>
  <div class="container-main">
    <form>
      <div class="logo">
        <img src="https://cdn.glitch.global/769c6fb2-7354-41d1-b226-849a52edbc39/logo.jpg?v=1675216932686" class="circulo"> 
      </div> <br>
      <div class="palabra">
        <h1>Ingresa tus credenciales para ingresar.</h1>
      </div>
    </form>
    <br>
    <form action="autenticacion.php" method="post">
      <label form="name">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="id_codigo" placeholder="codigo"  required><br>
      
      <label form="password">
        <i class="fas fa-lock"></i>
        <input type="password" name="id_nuevacontrasena" placeholder="Contraseña" required><br><br>

      <button class="btn-login">
        <h1>Iniciar Sesión</h1>
      </button>
      <br>
      <br>
    </form>
    <a style="color: #c6ffdd;" href="crear.php">¿Has olvidado la contraseña?</a>
    <br><br>
    <form action="nuevo.php" method="post">
      <a><button class="btn-login"><h2>Crear cuenta nueva</h2></button></a>
    </form>

    <a href="https://wa.me/584145700663?text=Buenas%20tardes,%20quiero%20saber%20sobre%20la%20clínica%20Veterinaria%20Tienda%20de%20Mascotas.%20y%20sus%20servicios%3F" target="_blank">
      <address id="contactos">
        <div class="mensaje">
          <img src="img/emoji.png" width="200px">
        </div>
      </address>
    </a>
    <br>
    <br>
    <br>
    <br>
    <footer>
      <p>© 2023 Lisbeth Mujica. All rights reserved</p>
    </footer>
  </div>
</body>
</html>
