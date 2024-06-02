<?php

session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  return;
}

$conexion = mysqli_connect("localhost", "root", "", "db_veterinaria");

// Verificar si la conexión fue exitosa
if (!$conexion) {
   die("Error al conectar con la base de datos: " . mysqli_connect_error());
   return;
}

// Obtener los datos del formulario y escaparlos para evitar inyección de SQL
$hematologia_completa_con_descarte_hemotropicos = isset($_POST["hematologia_completa_con_descarte_hemotropicos"]);
$hematologia_completa_especial_hematozoario = isset($_POST["hematologia_completa_especial_hematozoario"]);
$hematologia_completa_emergencia = isset($_POST["hematologia_completa_emergencia"]);
$descarte_hematozoario = isset($_POST["descarte_hematozoario"]);
$perfil_renal_pr = isset($_POST["perfil_renal_pr"]);
$perfil_hepatico_pm = isset($_POST["perfil_hepatico_pm"]);
$perfil_lipidico_pl = isset($_POST["perfil_lipidico_pl"]);
$proteinas_totales_y_fraccionadas = isset($_POST["proteinas_totales_y_fraccionadas"]);
$electrolitos_cl_na_k = isset($_POST["electrolitos_cl_na_k"]);
$urea = isset($_POST["urea"]);
$creatinina = isset($_POST["creatinina"]);
$bum = isset($_POST["bum"]);
$tgo = isset($_POST["tgo"]);
$tgp = isset($_POST["tgp"]);
$bilirrubina = isset($_POST["bilirrubina"]);
$calcio = isset($_POST["calcio"]);
$fosforo = isset($_POST["fosforo"]);
$magnesio = isset($_POST["magnesio"]);
$colesterol = isset($_POST["colesterol"]);
$trigliceridos = isset($_POST["trigliceridos"]);
$glicemia = isset($_POST["glicemia"]);
$proteina_total = isset($_POST["proteina_total"]);
$albumina = isset($_POST["albumina"]);
$globulina = isset($_POST["globulina"]);
$amilasa = isset($_POST["amilasa"]);
$lipasa = isset($_POST["lipasa"]);
$fosfatasas_alcalinas = isset($_POST["fosfatasas_alcalinas"]);
$fribrinogeno = isset($_POST["fribrinogeno"]);
$tiempo_de_protombina = isset($_POST["tiempo_de_protombina"]);
$tiempo_de_parcial_de_tromboplastina = isset($_POST["tiempo_de_parcial_de_tromboplastina"]);
$velocidad_de_sedimentacion = isset($_POST["velocidad_de_sedimentacion"]);
$card_test_brucela = isset($_POST["card_test_brucela"]);
$leptospira = isset($_POST["leptospira"]);
$luecosis = isset($_POST["luecosis"]);
$rinotraqueitis_infecciosa_bovina = isset($_POST["rinotraqueitis_infecciosa_bovina"]);
$diarrea_viral_bovina = isset($_POST["diarrea_viral_bovina"]);
$neospora = isset($_POST["neospora"]);
$parvovirus_y_cornavirus = isset($_POST["parvovirus_y_cornavirus"]);
$distember_canino = isset($_POST["distember_canino"]);
$test_de_coggins_control = isset($_POST["test_de_coggins_control"]);
$test_de_coggins_control_con_resena = isset($_POST["test_de_coggins_control_con_resena"]);
$raspado_cutaneo = isset($_POST["raspado_cutaneo"]);
$citologia_otica = isset($_POST["citologia_otica"]);
$citologia_de_piel = isset($_POST["citologia_de_piel"]);
$citologia_oncologica = isset($_POST["citologia_oncologica"]);
$exudado_transudado = isset($_POST["exudado_transudado"]);
$uroanalisis = isset($_POST["uroanalisis"]);
$coproanalisis_para_peq_animales = isset($_POST["coproanalisis_para_peq_animales"]);
$coproanalisis_para_grd_animales = isset($_POST["coproanalisis_para_grd_animales"]);
$sangre_oculta_en_heces = isset($_POST["sangre_oculta_en_heces"]);
$urocultivo = isset($_POST["urocultivo"]);
$tinsion_ziehl_neelsen = isset($_POST["tinsion_ziehl_neelsen"]);
$cultivo_de_bk_tuberculosis = isset($_POST["cultivo_de_bk_tuberculosis"]);
$cultivo_de_hongos = isset($_POST["cultivo_de_hongos"]);
$cultivo_de_piogenos = isset($_POST["cultivo_de_piogenos"]);
$cultivo_de_anaerobicos = isset($_POST["cultivo_de_anaerobicos"]);

// Insertar datos en la tabla "propietario"
$sqlbiomet = "INSERT INTO biomet (
   idPaciente,
   hematologia_completa_con_descarte_hemotropicos,
   hematologia_completa_especial_hematozoario,
   hematologia_completa_emergencia,
   descarte_hematozoario,
   perfil_renal_pr,
   perfil_hepatico_pm,
   perfil_lipidico_pl,
   proteinas_totales_y_fraccionadas,
   electrolitos_cl_na_k,
   urea,
   creatinina,
   bum,
   tgo,
   tgp,
   bilirrubina,
   calcio,
   fosforo,
   magnesio,
   colesterol,
   trigliceridos,
   glicemia,
   proteina_total,
   albumina,
   globulina,
   amilasa,
   lipasa,
   fosfatasas_alcalinas,
   fribrinogeno,
   tiempo_de_protombina,
   tiempo_de_parcial_de_tromboplastina,
   velocidad_de_sedimentacion,
   card_test_brucela,
   leptospira,
   leucosis,
   rinotraqueitis_infecciosa_bovina,
   diarrea_viral_bovina,
   neospora,
   parvovirus_y_cornavirus,
   distember_canino,
   test_de_coggins_control,
   test_de_coggins_control_con_resena,
   raspado_cutaneo,
   citologia_otica,
   citologia_de_piel,
   citologia_oncologica,
   exudado_transudado,
   uroanalisis,
   coproanalisis_para_peq_animales,
   coproanalisis_para_grd_animales,
   sangre_oculta_en_heces,
   urocultivo,
   tinsion_ziehl_neelsen,
   cultivo_de_bk_tuberculosis,
   cultivo_de_hongos,
   cultivo_de_piogenos,
   cultivo_de_anaerobios
   )
VALUES (
'{$_SESSION['usuario']['id']}',
'$hematologia_completa_con_descarte_hemotropicos',
'$hematologia_completa_especial_hematozoario',
'$hematologia_completa_emergencia',
'$descarte_hematozoario',
'$perfil_renal_pr',
'$perfil_hepatico_pm',
'$perfil_lipidico_pl',
'$proteinas_totales_y_fraccionadas',
'$electrolitos_cl_na_k',
'$urea',
'$creatinina',
'$bum',
'$tgo',
'$tgp',
'$bilirrubina',
'$calcio',
'$fosforo',
'$magnesio',
'$colesterol',
'$trigliceridos',
'$glicemia',
'$proteina_total',
'$albumina',
'$globulina',
'$amilasa',
'$lipasa',
'$fosfatasas_alcalinas',
'$fribrinogeno',
'$tiempo_de_protombina',
'$tiempo_de_parcial_de_tromboplastina',
'$velocidad_de_sedimentacion',
'$card_test_brucela',
'$leptospira',
'$luecosis',
'$rinotraqueitis_infecciosa_bovina',
'$diarrea_viral_bovina',
'$neospora',
'$parvovirus_y_cornavirus',
'$distember_canino',
'$test_de_coggins_control',
'$test_de_coggins_control_con_resena',
'$raspado_cutaneo',
'$citologia_otica',
'$citologia_de_piel',
'$citologia_oncologica',
'$exudado_transudado',
'$uroanalisis',
'$coproanalisis_para_peq_animales',
'$coproanalisis_para_grd_animales',
'$sangre_oculta_en_heces',
'$urocultivo',
'$tinsion_ziehl_neelsen',
'$cultivo_de_bk_tuberculosis',
'$cultivo_de_hongos',
'$cultivo_de_piogenos',
'$cultivo_de_anaerobicos'
)";
$resultado = mysqli_query($conexion, $sqlbiomet);

$sqltimeline = "INSERT INTO timeline(idPaciente) VALUES({$_SESSION['usuario']['id']})";

$resultado_timeline = mysqli_query($conexion, $sqltimeline);

// Verificar si la inserción en la tabla "propietario" fue exitosa
if ($resultado && $resultado_timeline) {
   
      echo "Información enviada con éxito";
      
   
} else {
   echo "Error al insertar la información en la base de datos <br>" . mysqli_error($conexion);
}
echo '<br><br><button class="btn-login" style="background-color: rgb(184, 230, 59); color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;"><a href="admin.php" style="color: #fff; text-decoration: none;">Regresar</a></button>';

// Cerrar la conexión con la base de datos
mysqli_close($conexion);
?>



 

