<?php
require_once('reporte.php');
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/dashboard/libros.php');

ini_set('date.timezone', 'America/El_Salvador');
$pdf = new PDF();
$libros = new Libros();
$suma = 0;
$pdf->head('REPORTE DE VENTAS POR CATEGORIA');
$pdf->date();
$pdf->SetFont('Arial', 'B', '10');
$pdf->SetFillColor(36, 113, 163);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(50);
$pdf->Cell(47,10, utf8_decode('Categoria'),0,0,'C', true);
$pdf->Cell(47,10, utf8_decode('Precio'),0,0,'C', true);

$pdf->Ln();

if($libros ->setId($_SESSION['id_administrador'])){
    $data = $libros->cantidad_ventas_categoria();
    foreach($data as $datos){
        $pdf->setFont('Arial','','10');
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(50);
        $pdf->Cell(47,10, utf8_decode($datos['nombre_categoria']), 'B, T',0,'C',true);
        $pdf->Cell(47,10, utf8_decode($datos['precio']), 'B, T',0,'C',true);
        

        $pdf->Ln();
        $suma+= $datos['precio'];
    }
    $pdf->Cell(150,10,'Total$ '.$suma,0,0,'R');
    $pdf->Output();
}
?>