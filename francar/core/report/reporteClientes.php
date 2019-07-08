<?php
require_once('reporte.php');
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/dashboard/clientes.php');

ini_set('date.timezone', 'America/El_Salvador');
$pdf = new PDF();
$clientes = new Clientes();
$pdf->head('REPORTE DE CLIENTES');
$pdf->date();
$pdf->SetFont('Arial', 'B', '10');
$pdf->SetFillColor(36, 113, 163);
$pdf->SetTextColor(255,255,255);

$pdf->Cell(47,10, utf8_decode('Nombre'),0,0,'C', true);
$pdf->Cell(47,10, utf8_decode('Apellido'),0,0,'C', true);
$pdf->Cell(47,10, utf8_decode('Telefono'),0,0,'C', true);
$pdf->Cell(47,10, utf8_decode('Direccion'),0,0,'C', true);

$pdf->Ln();
if($clientes ->setId($_SESSION['id_administrador'])){
    $data = $clientes->readClientes();
    foreach($data as $datos){
        $pdf->setFont('Arial','','10');
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(47,10, utf8_decode($datos['nombre_cliente']), 'B, T',0,'C',true);
        $pdf->Cell(47,10, utf8_decode($datos['apellido_cliente']), 'B, T',0,'C',true);
        $pdf->Cell(47,10, utf8_decode($datos['telefono']), 'B, T',0,'C',true);
        $pdf->Cell(47,10, utf8_decode($datos['direccion']), 'B, T',0,'C',true);
        $pdf->Ln();
    }
    $pdf->Output();
}
?>¿