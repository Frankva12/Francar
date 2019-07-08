<?php
require_once('reporte.php');
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/dashboard/bitacora.php');

ini_set('date.timezone', 'America/El_Salvador');
$pdf = new PDF();
$bitacora = new Bitacora();
$pdf->head('REPORTE DE CONTROL');
$pdf->date();
$pdf->SetFont('Arial', 'B', '10');
$pdf->SetFillColor(36, 113, 163);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(50);

$pdf->Cell(47,10, utf8_decode('Fecha'),0,0,'C', true);
$pdf->Cell(47,10, utf8_decode('Acción realizada'),0,0,'C', true);

$pdf->Ln();
if($bitacora ->setId($_SESSION['id_administrador'])){
    $data = $bitacora->readBitacora();
    foreach($data as $datos){
        $pdf->setFont('Arial','','10');
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(50);
        $pdf->Cell(47,10, utf8_decode($datos['fecha']), 'B, T',0,'C',true);
        $pdf->Cell(47,10, utf8_decode($datos['accion']), 'B, T',0,'C',true);
        $pdf->Ln();
    }
    $pdf->Output();
}
?>