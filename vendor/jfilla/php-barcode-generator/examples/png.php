<?php
require __DIR__ . '/../vendor/autoload.php';
use JFilla\Barcode\BarcodeGenerator;
use JFilla\Barcode\BarcodeGeneratorPNG;

$generator = new BarcodeGeneratorPNG();
$barcode = $generator->getBarcode('17020058-01', BarcodeGenerator::TYPE_CODE_128, 20, 500, [0, 0, 0], FALSE);
file_put_contents(__DIR__ . '/barcode.png', $barcode);
