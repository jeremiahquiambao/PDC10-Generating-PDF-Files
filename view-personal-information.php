<?php
require "vendor/autoload.php";
use Fpdf\Fpdf;


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Complete Name: Jeremiah Quiambao', 0,1);
$pdf->Cell(40,10,'Program: CCS', 0, 1);
$pdf->Cell(40,10,'Email Address: quiambao.jeremiah@auf.edu.ph', 0, 1);
$pdf->Cell(40,10,'Student Number: 20-0268-683', 0, 1);
$pdf->Output();
?>

$pdf>Cell(50,15,'Complete Name: Aki Garcia, Terada', 0, 1);
$pdf->Cell(50,15,'Program: CCS', 0, 1);
$pdf->Cell(50,15,'Email Address: terada.aki@auf.edu.ph', 0, 1);
$pdf->Cell(40,15,'Student Number: 18-1651-396', 0, 1);