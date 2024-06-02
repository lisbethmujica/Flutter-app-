<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
  exit;
}
require_once 'vendor/autoload.php'; // Incluye el archivo de autoloading de PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$helper = new Sample();
if ($helper->isCli()) {
    $helper->log('This example should only be run from a Web Browser' . PHP_EOL);

    return;
}
//// Create new Spreadsheet object
//$spreadsheet = new Spreadsheet();
//
//// Set document properties
//$spreadsheet->getProperties()->setCreator('Maarten Balliauw')
//    ->setLastModifiedBy('Maarten Balliauw')
//    ->setTitle('Office 2007 XLSX Test Document')
//    ->setSubject('Office 2007 XLSX Test Document')
//    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
//    ->setKeywords('office 2007 openxml php')
//    ->setCategory('Test result file');
//
//// Add some data
//$spreadsheet->setActiveSheetIndex(0)
//    ->setCellValue('A1', 'Hello')
//    ->setCellValue('B2', 'world!')
//    ->setCellValue('C1', 'Hello')
//    ->setCellValue('D2', 'world!');
//
//// Miscellaneous glyphs, UTF-8
//$spreadsheet->setActiveSheetIndex(0)
//    ->setCellValue('A4', 'Miscellaneous glyphs')
//    ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
//
//// Rename worksheet
//$spreadsheet->getActiveSheet()->setTitle('Simple');
//
//// Set active sheet index to the first sheet, so Excel opens this as the first sheet
//$spreadsheet->setActiveSheetIndex(0);



//Query a la base de datos
include 'db.php';
$query = "SELECT * FROM pacientes";
$res = mysqli_query($conexion, $query);


// Obtén la información del paciente y las pruebas realizadas desde la base de datos

// Crea una instancia de la hoja de cálculo
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Agrega los encabezados de las columnas
$sheet->setCellValue('A1', 'Nombre del paciente');
$sheet->setCellValue('B1', 'Edad');
$sheet->setCellValue('C1', 'Prueba 1');
$sheet->setCellValue('D1', 'Prueba 2');
// ...

// Llena los datos del paciente y las pruebas en las celdas correspondientes
$key = 2;
while($fila = $res->fetch_array(MYSQLI_ASSOC) && $key < 200) {
  // code...
  $sheet->setCellValue("A{$key}", $fila['nombrePaciente']);
  $sheet->setCellValue("B{$key}", $fila['edadPaciente']);
  //$sheet->setCellValue("C{$key}", $fila['resultadoPrueba1']);
  //$sheet->setCellValue("D{$key}", $fila['resultadoPrueba2']);
  $key++; 
}
// ...

// Configura el encabezado del archivo Excel

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="01simple.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
?>

