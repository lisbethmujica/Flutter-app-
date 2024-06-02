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
  <link rel="stylesheet" href="css/stilosbiomet.css">
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

<div class="logo" style="text-align: center;">
  <img src="img/biomevet.jpg" class="circulo" >
  <br>
</div>
<div class="BIOMET" style="text-align: center;">
  <br>
  <h1>Laboratorio Clinico Veterinario BIOMET, C.A</h1>
  <p>Av. Blonval López. C.C. Galerías América Piso 1 - Local 4. Frente al Estacionamiento Clínica Varyna. Alto Barinas Sur, Edo. Barinas.</p>
</div>
<div>
  <br>

  <center>
    <form action="archivosbiomet.php" method="post">
    <input type="checkbox" name="hematologia_completa_con_descarte_hemotropicos">Hematología completa con Descarte hemotropicos<br>
    <input type="checkbox" name="hematologia_completa_especial_hematozoario">Hematología completa Especial Hematozoario<br>
    <input type="checkbox" name="hematologia_completa_emergencia">Hematología completa Emergencia<br>
    <input type="checkbox" name="descarte_hematozoario">Descarte Hematozoario<br>
    <input type="checkbox" name="perfil_renal_pr">PERFIL RENAL (PR)<br>
    <input type="checkbox" name="perfil_hepatico_pm">PERFIL HEPATICO (PM)<br>
    <input type="checkbox" name="perfil_lipidico_pl">PERFIL LIPIDICO(PL)<br>
    <input type="checkbox" name="proteinas_totales_y_fraccionadas">PROTEINAS TOTALES Y FRACCIONADAS<br>
    <input type="checkbox" name="electrolitos_cl_na_k">ELECTROLITOS (CL-NA-K)<br>
    <input type="checkbox" name="urea">UREA<br>
    <input type="checkbox" name="creatinina">CREATINIMA<br>
    <input type="checkbox" name="bum">BUM<br>
    <input type="checkbox" name="tgo">TGO  <br>
    <input type="checkbox" name="tgp">TGP <br>
    <input type="checkbox" name="bilirrubina">BILIRRUBINA Total y Directa<br>
    <input type="checkbox" name="calcio">calcio<br>
    <input type="checkbox" name="fosforo">fosforo<br>
    <input type="checkbox" name="magnesio">magnesio<br>
    <input type="checkbox" name="colesterol">colesterol<br>
    <input type="checkbox" name="trigliceridos">trigliceridos<br>
    <input type="checkbox" name="glicemia">glicemia<br>
    <input type="checkbox" name="proteina_total">proteina total<br>
    <input type="checkbox" name="albumina">albumina<br>
    <input type="checkbox" name="globulina">globulina<br>
    <input type="checkbox" name="amilasa">amilasa<br>
    <input type="checkbox" name="lipasa">lipasa<br>
    <input type="checkbox" name="fosfatasas_alcalinas">fosfatasas alcalinas<br>
    <input type="checkbox" name="fribrinogeno">fribrinogeno<br>
    <input type="checkbox" name="tiempo_de_protombina">Tiempo de Protombina<br>
    <input type="checkbox" name="tiempo_de_parcial_de_tromboplastina">Tiempo de Parcial de Tromboplastina<br>
    <input type="checkbox" name="velocidad_de_sedimentacion">Velocidad de Sedimentacion<br>
    <input type="checkbox" name="card_test_brucela">Card test brucela<br>
    <input type="checkbox" name="leptospira">leptospira<br>
    <input type="checkbox" name="luecosis">Leucosis<br>
    <input type="checkbox" name="rinotraqueitis_infecciosa_bovina">rinotraquitis infecciosa bovina<br>
    <input type="checkbox" name="diarrea_viral_bovina"> diarrea viral bovina<br>
    <input type="checkbox" name="neospora">neospora<br>
    <input type="checkbox" name="parvovirus_y_cornavirus">parvovirus + cornavirus<br>
    <input type="checkbox" name="distember_canino">distember canino<br>
    <input type="checkbox" name="test_de_coggins_control">test de coggins control<br>
    <input type="checkbox" name="test_de_coggins_control_con_reseña">test de coggins control con reseña<br>
    <input type="checkbox" name="raspado_cutaneo">raspado cutaneo<br>
    <input type="checkbox" name="citologia_otica"> citologia otica<br>
    <input type="checkbox" name="citologia_de_piel"> citologia de piel<br>
    <input type="checkbox" name="citologia_oncologica"> citologia oncologica<br>
    <input type="checkbox" name="exudado_transudado"> exudado - transudado <br>
    <input type="checkbox" name="uroanalisis"> uroanalisis<br>
    <input type="checkbox" name="coproanalisis_para_peq_animales"> coproanalisis para peq. animales<br>
    <input type="checkbox" name="coproanalisis_para_grd_animales"> coproanalisis para grd. animales<br>
    <input type="checkbox" name="sangre_oculta_en_heces"> sangre oculta en heces<br>
    <input type="checkbox" name="urocultivo"> urocultivo<br>
    <input type="checkbox" name="tinsion_ziehl_neelsen"> tinsion  ziehl- neelsen<br>
    <input type="checkbox" name="cultivo_de_bk_tuberculosis"  > cultivo de b.k (tuberculosis)<br>
    <input type="checkbox" name="cultivo_de_hongos" >cultivo de hongos <br>
    <input type="checkbox" name="cultivo_de_piogenos" >cultivo de piogenos<br>
    <input type="checkbox" name="cultivo_de_anaerobicos">cultivo de anaerobicos<br>
    </div>
    
    <br><br>
    
    
    <div class style="text-align: center;">
    <p>Para más Información: <a style="color: green;" href="https://www.biomevet.com/inicio.php">https://www.biomevet.com/inicio.php</a></p>
    </div>
    <br>
    
  </center>
  <input type="submit" value="Enviar"></input>
    </form>
    
</html>
</body>