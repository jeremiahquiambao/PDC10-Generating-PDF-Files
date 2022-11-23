<?php
require "vendor/autoload.php";
use Fpdf\Fpdf;


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/auf-logo.png',95,6,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,75,'AUF History',0,1,'C');
    // Line break
    $this->Ln(-30);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '',12);
$pdf->Write(9,'        Angeles University Foundation was established on May 25, 1962, by the prominent Angeles family of Angeles, Pampanga in the Philippines. It began as the Angeles Institute of Technology (AIT) but after 9 years of operation, the institution was granted University status on April 16, 1971, by the Department of Education, Culture and Sports.

On December 4, 1975, the university was converted into a non-stock, non-profit educational foundation - a decision of the founding family motivated by the aim of providing education to the Central Luzon region. Concomitant with this decision, the Angeles couple and their children, namely, Rosario, Lutgarda, Emmanuel, Antonio, Jesusa, Josefina and Lourdes executed a Deed of Donation of their shareholdings in favor of the foundation as starting fund which resulted to the relinquishment of their ownership and proprietary rights. AUF was incorporated under Republic Act No. 6055, otherwise known as the Foundation Law, and is a tax-exempt institution approved by the Philippine government.

On February 14, 1978, AUF was converted into a Catholic university making it the first in Central Luzon. On February 20, 1990, the AUF Medical Center was inaugurated which would serve as the teaching, training, and research hospital of the university.');
$pdf->Output();
// $pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
// $pdf->Output();
?>