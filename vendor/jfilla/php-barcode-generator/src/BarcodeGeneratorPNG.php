<?php

namespace JFilla\Barcode;

class BarcodeGeneratorPNG extends BarcodeGenerator
{

	/**
	 * @var ImageWriter
	 */
	private $imageWriter;

	public function __construct(ImageWriter $imageWriter = NULL)
	{
		if ($imageWriter === NULL) {
			$imageWriter = new GDImageWriter();
		}
		$this->imageWriter = $imageWriter;
	}

	/**
	 * Return a PNG image representation of barcode (requires GD or Imagick library).
	 * @param string $code code to print
	 * @param string $type type of barcode:
	 * @param int $widthFactor Width of a single bar element in pixels.
	 * @param int $totalHeight Height of a single bar element in pixels.
	 * @param array $color RGB (0-255) foreground color for bar elements (background is transparent).
	 * @return string image data or false in case of error.
	 * @public
	 */
	public function getBarcode($code, $type, $widthFactor = 2, $totalHeight = 30, $color = [0, 0, 0], $showCode = FALSE)
	{
		$barcodeData = $this->getBarcodeData($code, $type);
		$width = ($barcodeData['maxWidth'] * $widthFactor);
		$textSpace = $this->getTextSpace($totalHeight, $showCode);
		$height = $totalHeight - $textSpace;
		$this->imageWriter->create($width, $totalHeight);
		$this->imageWriter->setBackgroundColor(255, 255, 255);
		$this->imageWriter->setForegroundColor($color);
		$this->drawBars($barcodeData, $height, $widthFactor);
		if ($showCode) {
			$this->drawText($textSpace, $width, $totalHeight, $code);
		}
		return $this->imageWriter->getImage();
	}

	private function getTextSpace($totalHeight, $showCode)
	{
		if ($showCode) {
			return (int)($totalHeight / 8);
		} else {
			return 0;
		}
	}

	private function drawText($textSpace, $width, $totalHeight, $code)
	{
		$fontSize = $textSpace * 0.9;
		$fontFile = __DIR__ . '/../fonts/arial.ttf';
		list($left, , $right) = $this->imageWriter->getTextBoxSize($fontSize, 0, $fontFile, $code);
		$textWidth = $right - $left;
		$this->imageWriter->drawText($fontSize, 0, ($width / 2) - ($textWidth / 2), $totalHeight, $fontFile, $code);
	}

	private function drawBars($barcodeData, $height, $widthFactor)
	{
		$positionHorizontal = 0;
		foreach ($barcodeData['bars'] as $bar) {
			$bw = round(($bar['width'] * $widthFactor), 3);
			$bh = round(($bar['height'] * $height / $barcodeData['maxHeight']), 3);
			if ($bar['drawBar']) {
				$y = round(($bar['positionVertical'] * $height / $barcodeData['maxHeight']), 3);
				$this->imageWriter->drawRectangle($positionHorizontal, $y, ($positionHorizontal + $bw) - 1, ($y + $bh));
			}
			$positionHorizontal += $bw;
		}
	}
}