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

$hematologia_completa_y_descarte_hemotropico = isset($_POST['hematologia_completa_y_descarte_hemotropico']);
$descarte_hemotropicos = isset($_POST['descarte_hemotropicos']);
$VSG = isset($_POST['VSG']);
$HB_Y_HTO = isset($_POST['HB_Y_HTO']);
$CUENTA_LEUCOCITARIA = isset($_POST['CUENTA_LEUCOCITARIA']);
$PLAQUETAS = isset($_POST['PLAQUETAS']);
$perfil_hepatico = isset($_POST['perfil_hepatico']);
$perfil_renal = isset($_POST['perfil_renal']);
$perfil_lipidico = isset($_POST['perfil_lipidico']);
$perfil_tiroideo = isset($_POST['perfil_tiroideo']);
$urea = isset($_POST['urea']);
$creatinina = isset($_POST['creatinina']);
$tgo_tgp = isset($_POST['tgo_tgp']);
$bilirrubina = isset($_POST['bilirrubina']);
$proteina = isset($_POST['proteina']);
$glicemia = isset($_POST['glicemia']);
$colesterol = isset($_POST['colesterol']);
$trigliceridos = isset($_POST['trigliceridos']);
$PT = isset($_POST['PT']);
$PTT = isset($_POST['PTT']);
$fibrinogeno = isset($_POST['fibrinogeno']);
$analisis_coprologico_willy = isset($_POST['analisis_coprologico_willy']);
$analisis_coprologico_mac_master = isset($_POST['analisis_coprologico_mac_master']);
$analisis_coprologico_sedimentacion_tamizado = isset($_POST['analisis_coprologico_sedimentacion_tamizado']);
$sangre_oculta_en_heces = isset($_POST['sangre_oculta_en_heces']);
$uroanalisis = isset($_POST['uroanalisis']);
$leptospirina = isset($_POST['leptospirina']);
$brucella = isset($_POST['brucella']);
$rinotraqueitis_infecciosa_bovina = isset($_POST['rinotraqueitis_infecciosa_bovina']);
$diarrea_viral_bovina = isset($_POST['diarrea_viral_bovina']);
$neospora_caninum = isset($_POST['neospora_caninum']);
$distemper_canino = isset($_POST['distemper_canino']);
$parvovirus_canino = isset($_POST['parvovirus_canino']);
$leucemia_e_inmunodeficiencia_felina = isset($_POST['leucemia_e_inmunodeficiencia_felina']);
$lipasa = isset($_POST['lipasa']);
$amilasa = isset($_POST['amilasa']);
$ldh = isset($_POST['ldh']);
$ggt = isset($_POST['ggt']);
$fosfatasas_alcalinas = isset($_POST['fosfatasas_alcalinas']);
$sodio = isset($_POST['sodio']);
$potasio = isset($_POST['potasio']);
$cloro = isset($_POST['cloro']);
$calcio = isset($_POST['calcio']);
$fosforo = isset($_POST['fosforo']);
$magnesio = isset($_POST['magnesio']);
$vaginal = isset($_POST['vaginal']);
$otica = isset($_POST['otica']);
$de_piel = isset($_POST['de_piel']);
$oncologica = isset($_POST['oncologica']);
$citologia_de_liquidos = isset($_POST['citologia_de_liquidos']);
$exadado_trasudado = isset($_POST['exadado_trasudado']);
$raspado_de_piel = isset($_POST['raspado_de_piel']);
$t4l_canino = isset($_POST['t4l_canino']);

// Insertar datos en la tabla "propietario"
$sqlpropietario = "INSERT INTO paravet (
   idPaciente,
   hemat_comp_desc_de_hemo,
   desc_de_hemo,
   vsg,
   hb_y_hto,
   cuenta_leuco,
   plaquetas,
   perfil_hepatico,
   perfil_renal,
   perfil_lipidico,
   perfil_tiroideo_canino,
   urea,
   creatinina,
   tgo_y_tgp,
   bilirrubina_t_y_f,
   proteinas_y_f,
   glicemia,
   colesterol,
   trigliceridos,
   pt,
   ptt,
   fibrinogeno,
   analisis_coprologico_willys,
   analisis_coprologico_mac_master,
   analisis_coprologico_sedimentacion_tamizado,
   sangre_oculta_en_heces,
   uroanalisis,
   leptospirina_mat,
   brucella,
   rinotraqueitis_infecciosa_bovina,
   diarrea_viral_bobina,
   neospora_caninum,
   distemper_canino,
   parvovirus_canino,
   leucemia_e_inmunodeficiencia_felina,
   lipasa,
   amilasa,
   ldh,
   ggt,
   fosfatasas_alcalinas,
   na,
   k,
   cl,
   ca,
   p,
   mg,
   vaginal,
   otica,
   de_piel,
   oncologica,
   citologia_de_liquidos,
   exudado_trasudado,
   raspado_de_piel,
   t4l_canino
)
VALUES (
'{$_SESSION['usuario']['id']}',
'$hematologia_completa_y_descarte_hemotropico',
'$descarte_hemotropicos',
'$VSG',
'$HB_Y_HTO',
'$CUENTA_LEUCOCITARIA',
'$PLAQUETAS',
'$perfil_hepatico',
'$perfil_renal',
'$perfil_lipidico',
'$perfil_tiroideo',
'$urea',
'$creatinina',
'$tgo_tgp',
'$bilirrubina',
'$proteina',
'$glicemia',
'$colesterol',
'$trigliceridos',
'$PT',
'$PTT',
'$fibrinogeno',
'$analisis_coprologico_willy',
'$analisis_coprologico_mac_master',
'$analisis_coprologico_sedimentacion_tamizado',
'$sangre_oculta_en_heces',
'$uroanalisis',
'$leptospirina',
'$brucella',
'$rinotraqueitis_infecciosa_bovina',
'$diarrea_viral_bovina',
'$neospora_caninum',
'$distemper_canino',
'$parvovirus_canino',
'$leucemia_e_inmunodeficiencia_felina',
'$lipasa',
'$amilasa',
'$ldh',
'$ggt',
'$fosfatasas_alcalinas',
'$sodio',
'$potasio',
'$cloro',
'$calcio',
'$fosforo',
'$magnesio',
'$vaginal',
'$otica',
'$de_piel',
'$oncologica',
'$citologia_de_liquidos',
'$exadado_trasudado',
'$raspado_de_piel',
'$t4l_canino'
)";
$resultado = mysqli_query($conexion, $sqlpropietario);

$sqltimeline = "INSERT INTO timeline(idPaciente) VALUES({$_SESSION['usuario']['id']})";

$resultado_timeline = mysqli_query($conexion, $sqltimeline);
// Verificar si la inserción en la tabla "propietario" fue exitosa
if ($resultado && $resultado_timeline) {
   echo "Información enviada con éxito";
} else {
   echo "Error al insertar la información en la base de datos<br>";
   echo mysqli_error($conexion);
}

echo '<br><br><button class="btn-login" style="background-color: rgb(184, 230, 59); color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;"><a href="admin.php" style="color: #fff; text-decoration: none;">
      Regresar</a></button>';

// Cerrar la conexión con la base de datos
mysqli_close($conexion);
?>




 

