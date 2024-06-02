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
  <link rel="stylesheet" href="css/stilosparavet.css">
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


<div class="solicitud">
    <h1>Solicitud para Exámenes de Laboratorio</h1>
  </div>


<br>

  <div style="text-align: center;">
          <img src="img/paravet.jpg" class="circulo" >
         <br>
  </img>
  </div>

<div class="paravet" style="text-align: center;">
    <h1>Laboratorio Paravet</h1>
    <br>Av. Blonval López, Diagonal a la Clínica Varyna, al lado de Lab. Nardo C.A. Barinas, Edo. Barinas </p>
 
</div>
<br>
<br>

<center>
    <h2>HEMOTOLOGIA</h2>
</center>
<form action="archivosparavet.php" method="post">
  <div>
    <input type="checkbox" name="hematologia_completa_y_descarte_hemotropico">Hematología completa y descarte hemotrópico<br>
    <input type="checkbox" name="descarte_hemotropicos">Descarte hemotrópicos<br>
    <input type="checkbox" name="VSG">VSG<br>
    <input type="checkbox" name="HB_Y_HTO">HB Y HTO<br>
    <input type="checkbox" name="CUENTA_LEUCOCITARIA">CUENTA LEUCOCITARIA<br>
    <input type="checkbox" name="PLAQUETAS">PLAQUETAS<br>
  </div>
<br>

<center>
    <h2>QUIMICA</h2>
</center>


<div>
  <input type="checkbox" name="perfil_hepatico">PERFIL HEPÁTICO<br>
  <input type="checkbox" name="perfil_renal">PERFIL RENAL<br>
  <input type="checkbox" name="perfil_lipidico">PERFIL LIPÍDICO<br>
  <input type="checkbox" name="perfil_tiroideo">PERFIL TIROIDEO (CANINOS)<br>
  <input type="checkbox" name="urea">UREA<br>
  <input type="checkbox" name="creatinina">CREATININA<br>
  <input type="checkbox" name="tgo_tgp">TGO Y TGP<br>
  <input type="checkbox" name="bilirrubina">BILIRRUBINA T Y F<br>
  <input type="checkbox" name="proteina">PROTEINA Y F<br>
  <input type="checkbox" name="glicemia">GLICEMIA<br>
  <input type="checkbox" name="colesterol">COLESTEROL<br>
  <input type="checkbox" name="trigliceridos">TRIGLICERIDOS<br>
</div>

<center>
    <h2>CONGULACION</h2>
</center>
<div>
  <input type="checkbox" name="PT">PT<br>
  <input type="checkbox" name="PTT">PTT<br>
  <input type="checkbox" name="fibrinogeno">FIBRINOGENO<br>
</div>
<br>
<center>
    <h2>CROPROLOGIAS</h2>
</center>
<div>
  <input type="checkbox" name="analisis_coprologico_willy">ANALISIS COPROLOGICO WILLY<br>
  <input type="checkbox" name="analisis_coprologico_mac_master">ANALISIS COPROLOGICO MAC MASTER<br>
  <input type="checkbox" name="analisis_coprologico_sedimentacion_tamizado">ANALISIS COPROLOGICO SEDIMENTACION TAMIZADO<br>
  <input type="checkbox" name="sangre_oculta_en_heces">SANGRE OCULTA EN HECES<br>
  <input type="checkbox" name="uroanalisis">UROANALISIS<br>
</div>
<center>
<br>
    <h2>INFECCIONES</h2>
</center>
<div>
  <input type="checkbox" name="leptospirina">LETOSPIRINA (MAT)<br>
  <input type="checkbox" name="brucella">BRUCELLA<br>
  <input type="checkbox" name="rinotraqueitis_infecciosa_bovina">RINOTRAQUEITIS INFECCIOSA BOVINA<br>
  <input type="checkbox" name="diarrea_viral_bovina">DIARREA VIRAL BOVINA<br>
  <input type="checkbox" name="neospora_caninum">NEOSPORA CANINUM<br>
  <input type="checkbox" name="distemper_canino">DISTEMPER CANINO<br>
  <input type="checkbox" name="parvovirus_canino">PARVOVIRUS CANINO<br>
  <input type="checkbox" name="leucemia_e_inmunodeficiencia_felina">LUCEMIA E INMUNODEFICIENCIA FELINA<br>
</div>
<br>
<center>
    <h2>ENZIMAS</h2>
</center>
<div>
  <input type="checkbox" name="lipasa">LIPASA<br>
  <input type="checkbox" name="amilasa">AMILASA<br>
  <input type="checkbox" name="ldh">LDH<br>
  <input type="checkbox" name="ggt">GGT<br>
  <input type="checkbox" name="fosfatasas_alcalinas">FOSFATASAS ALCALINAS<br>
</div>
<br>
<center>
    <h2>ELECTROLITOS</h2>
</center>
<div>
  <input type="checkbox" name="sodio">SODIO (NA)<br>
  <input type="checkbox" name="potasio">POTASIO (K)<br>
  <input type="checkbox" name="cloro">CLORO (CL)<br>
  <input type="checkbox" name="calcio">CALCIO (CA)<br>
  <input type="checkbox" name="fosforo">FOSFORO (P)<br>
  <input type="checkbox" name="magnesio">MAGNESIO (Mg)<br>
</div>
<br>
<center>
    <h2>CITOLOGIAS</h2>
</center>
<div>
  <input type="checkbox" name="vaginal">VAGINAL<br>
  <input type="checkbox" name="otica">OTICA<br>
  <input type="checkbox" name="de_piel">DE PIEL<br>
  <input type="checkbox" name="oncologica">ONCOLOGICA<br>
  <input type="checkbox" name="citologia_de_liquidos">CITOLOGIA DE LIQUIDOS<br>
  <input type="checkbox" name="exadado_trasudado">EXADADO-TRASUDADO<br>
  <input type="checkbox" name="raspado_de_piel">RASPADO DE PIEL<br>
  <input type="checkbox" name="t4l_canino">T4L (SOLO CANINO)<br>
</div>

<br>
<br>

<div class style="text-align: center;">
  <p>Para más Información: <a style="color: orange;" href="https://www.instagram.com/laboratoriosparavet/">https://www.instagram.com/laboratoriosparavet/</a></p>
</div>
<br>

  <input type="submit" value="Enviar"></input>
    </form>
    
</html>
</body>
