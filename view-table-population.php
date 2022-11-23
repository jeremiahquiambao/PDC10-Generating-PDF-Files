<?php
require "vendor/autoload.php";
use Fpdf\Fpdf;

//Parsing CSV File
$csv_file = 'files/population-2020.csv';
$handle = fopen($csv_file, 'r');
$row_index = 0; // initialize
$headers = [];
$data = [];

while (($row_data = fgetcsv($handle, 1000, ',')) !== FALSE)
{
	if ($row_index++ < 1)
	{
		foreach ($row_data as $col)
		{
			array_push($headers, $col);
		}
		continue;
	}

	$tmp = [];
	for ($index = 0; $index < count($headers); $index++)
	{
		$tmp[$headers[$index]] = $row_data[$index];
	}
	array_push($data, $tmp);
}

fclose($handle);
//END of Parsing

class PDF extends FPDF
{
// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(60,25,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(60,25,$col,1);
        $this->Ln();
    }
}

// // Better table
// function ImprovedTable($header, $data)
// {
//     // Column widths
//     $w = array(40, 35, 40, 45);
//     // Header
//     for($i=0;$i<count($header);$i++)
//         $this->Cell($w[$i],7,$header[$i],1,0,'C');
//     $this->Ln();
//     // Data
//     foreach($data as $row)
//     {
//         $this->Cell($w[0],6,$row[0],'LR');
//         $this->Cell($w[1],6,$row[1],'LR');
//         $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
//         $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
//         $this->Ln();
//     }
//     // Closing line
//     $this->Cell(array_sum($w),0,'','T');
// }

// // Colored table
// function FancyTable($header, $data)
// {
//     // Colors, line width and bold font
//     $this->SetFillColor(255,0,0);
//     $this->SetTextColor(255);
//     $this->SetDrawColor(128,0,0);
//     $this->SetLineWidth(.3);
//     $this->SetFont('','B');
//     // Header
//     $w = array(40, 35, 40, 45);
//     for($i=0;$i<count($header);$i++)
//         $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
//     $this->Ln();
//     // Color and font restoration
//     $this->SetFillColor(224,235,255);
//     $this->SetTextColor(0);
//     $this->SetFont('');
//     // Data
//     $fill = false;
//     foreach($data as $row)
//     {
//         $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
//         $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
//         $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
//         $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
//         $this->Ln();
//         $fill = !$fill;
//     }
//     // Closing line
//     $this->Cell(array_sum($w),0,'','T');
// }

}

$pdf = new PDF();
// Column headings
$header = array('#', 'Country (or dependency)', 'Population(as of 2020)');
// Data loading
$pdf->SetFont('Arial','B',12);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
?>