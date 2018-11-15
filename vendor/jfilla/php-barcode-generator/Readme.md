# PHP Barcode Generator
This is an easy to use, non-bloated, framework independent, barcode generator in PHP.

It creates PNG from the most used 1D barcode standards.

* The codebase is largely from the [picqer/php-barcode-generator](https://github.com/picqer/php-barcode-generator) 
by Casper Bakker.

## Prerequisities

*  GD Library installed

## Installation
Install through [composer](https://getcomposer.org/doc/00-intro.md):

```
composer require jfilla/php-barcode-generator
```

## Usage
Initiate the barcode generator for the output you want, then call the ->getBarcode() routine as many times as you want.

```php
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
```

The ->getBarcode() routine accepts the following:
- $code Data for the barcode
- $type Type of barcode, use the constants defined in the class
- $widthFactor Width is based on the length of the data, with this factor you can make the barcode bars wider than default
- $totalHeight The total height of the barcode
- $color Hex code of the foreground color
- $showCode Display barcode content as text