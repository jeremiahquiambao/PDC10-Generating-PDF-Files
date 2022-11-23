<?php
require "vendor/autoload.php";
use Fpdf\Fpdf;

$pdf = new FPDF();
$pdf->AddFont('Gang Of Three','','gang_of_three.php');
$pdf->AddFont('Japanese 3017','','japanese_3017.php');
$pdf->AddFont('Korean Calligraphy','','korean_calligraphy.php');


$pdf->AddPage();
$pdf->SetFont('Gang Of Three','',40);
$pdf->Write(10,'"Even if you were not chosen, even if you were not wanted, even if you are not forgiven. You need to stand your ground no matter how pathetic you are!" - Asta (Black Clover)');   
$pdf->Ln(30);

$pdf->SetFont('Japanese 3017','',40);
$pdf->Write(10,'"You do not have to be great to start, but you have to start to be great." - Zig Ziglar');
$pdf->Ln(30);

$pdf->SetFont('Korean Calligraphy','',40);
$pdf->Write(10,'"You will face many defeats in life, but never let yourself be defeated." - Maya Angelou');
$pdf->Ln(30);


$pdf->Output();
?>