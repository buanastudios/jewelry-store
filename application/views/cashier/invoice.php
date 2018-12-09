<?php
require('../vendors/fpdf/fpdf.php');

if(isset($_REQUEST['invoice_properties'])){
	$invoice_props = $_REQUEST['invoice_properties'];
	//printf($invoice_props);
	$a =  $_REQUEST['invoice_num'];
	$b =  $_REQUEST['product_name'];
	$c = $_REQUEST['invoice_trx_date'];									
	$d = $_REQUEST['cashier_name'];
	$e = $_REQUEST['product_weight'];
	$f = $_REQUEST['product_price'];
	$g = $_REQUEST['invoice_price'];
	$h = $_REQUEST['invoice_price_word'];
};

class PDF extends FPDF
{
	var $invoice_num;
	var $invoice_date;
function setInvoice($a,$b)
	{
		$this->invoice_num = $a;
		$this->invoice_date = $b;
	}
// Page header
function Header()
{
    // Logo
    //$this->Image('http://localhost/courses/derry/development/assets/img/neclace.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // INVOICE
    $this->Cell(35,10,$this->invoice_num,0,0,'C');
    // DATE
    $this->Cell(30);
    $this->SetFont('Arial','',12);
    $this->Cell(20);
    $this->Cell(30,10,$this->invoice_date,0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    //$this->SetY(-15);
    // Arial italic 8
   // $this->SetFont('Arial','I',8);
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

	$filename="code128";

		$default_value = array();
		$default_value['output'] = 1;
		$default_value['dpi'] = 72;
		$default_value['thickness'] = 30;
		$default_value['res'] = 1 ;
		$default_value['rotation'] = 0.0;
		$default_value['font_family'] = 'Arial.ttf';
		$default_value['font_size'] = 8;
		$default_value['text2display'] = 'ProductBarcode123';
		$default_value['a1'] = '';
		$default_value['a2'] = '';
		$default_value['a3'] = '';

		$output = intval(isset($_POST['output']) ? $_POST['output'] : $default_value['output']);
		$dpi = isset($_POST['dpi']) ? $_POST['dpi'] : $default_value['dpi'];
		$thickness = intval(isset($_POST['thickness']) ? $_POST['thickness'] : $default_value['thickness']);
		$res = intval(isset($_POST['res']) ? $_POST['res'] : $default_value['res']);
		$rotation = isset($_POST['rotation']) ? $_POST['rotation'] : $default_value['rotation'];
		$font_family = isset($_POST['font_family']) ? $_POST['font_family'] : $default_value['font_family'];
		$font_size = intval(isset($_POST['font_size']) ? $_POST['font_size'] : $default_value['font_size']);
		$text2display = isset($_POST['text2display']) ? $_POST['text2display'] : $default_value['text2display'];
		$a1 = isset($_POST['a1']) ? $_POST['a1'] : $default_value['a1'];
		$a2 = isset($_POST['a2']) ? $_POST['a2'] : $default_value['a2'];
		$a3 = isset($_POST['a3']) ? $_POST['a3'] : $default_value['a3'];
		
		$theimage = '<img src="http://localhost/courses/derry/development/assets/library/barcodegen.1d-php5.v2.2.0/html/image.php?code=' . $filename . '&amp;o=' . $output . '&amp;dpi=' . $dpi . '&amp;t=' . $thickness . '&amp;r=' . $res . '&amp;rot=' . $rotation . '&amp;text=' . urlencode($text2display) . '&amp;f1=' . $font_family . '&amp;f2=' . $font_size . '&amp;a1=' . $a1 . '&amp;a2=' . $a2 . '&amp;a3=' . $a3 . '" alt="Barcode Image" />';									
		$theimage = genbarcode ($filename,$output, $dpi, $thickness,  $res, $rotation , 'KALUNG 100g', $font_family , $font_size , $a1 ,$a2, $a3);
		
		function genbarcode ($filename,$output, $dpi, $thickness,  $res, $rotation , $text2display , $font_family , $font_size , $a1 ,$a2, $a3){
				return '<img src="http://localhost/courses/derry/development/assets/library/barcodegen.1d-php5.v2.2.0/html/image.php?code=' . $filename . '&amp;o=' . $output . '&amp;dpi=' . $dpi . '&amp;t=' . $thickness . '&amp;r=' . $res . '&amp;rot=' . $rotation . '&amp;text=' . urlencode($text2display) . '&amp;f1=' . $font_family . '&amp;f2=' . $font_size . '&amp;a1=' . $a1 . '&amp;a2=' . $a2 . '&amp;a3=' . $a3 . '" alt="Barcode Image" />';									
		}

// Instanciation of inherited class
$pdf = new PDF('L','mm',array(113,210));
$pdf->setInvoice($a,$c);
$pdf->AliasNbPages();

$pdf->SetLeftMargin(0);
$pdf->SetTopMargin(12);
$pdf->AddPage();

$pdf->SetFont('Times','',12);
$pdf->Image('http://localhost/courses/derry/development/assets/img/neclace.jpg',10,40,30);
$pdf->Image('http://localhost/courses/derry/development/assets/img/barcode.png',70,50,30);
$pdf->Cell(70,20,'',0,0,'R');
$pdf->Cell(70,30,$b,0,0,'L');
$pdf->Cell(30,40,$e,0,0);
$pdf->Cell(30,40,$f,0,1);
$pdf->Ln(2);

$pdf->SetFont('Times','',12);
$pdf->Cell(0,1,$g,0,1,'R');
$pdf->SetFont('Times','',10);
$pdf->Cell(1);
$pdf->Cell(0,5,$h,0,0,'L');
$pdf->Ln(1);
$pdf->Ln(15);

$pdf->Cell(0,1,$d,0,0,'R');

$pdf->Output();
?>