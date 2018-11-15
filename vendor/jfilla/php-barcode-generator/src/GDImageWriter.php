<?php

namespace JFilla\Barcode;

class GDImageWriter implements ImageWriter
{

	private $image;

	private $colorBackground;

	private $colorForeground;

	public function __construct()
	{
		if (!function_exists('imagecreate')) {
			throw new BarcodeException("Function imagecreate not found. Make sure GD library is loaded.");
		}
	}

	public function create($width, $height)
	{
		$this->image = imagecreate($width, $height);
	}

	public function setBackgroundColor($rgb)
	{
		$this->colorBackground = $this->allocateColor($rgb);
		imagecolortransparent($this->image, $this->colorBackground);
	}

	public function setForegroundColor($rgb)
	{
		$this->colorForeground = $this->allocateColor($rgb);
	}

	public function drawRectangle($x1, $y1, $x2, $y2)
	{
		imagefilledrectangle($this->image, $x1, $y1, $x2, $y2, $this->colorForeground);
	}

	public function getTextBoxSize($fontSize, $rotation, $fontFile, $text)
	{
		return imageftbbox($fontSize, $rotation, $fontFile, $text);
	}

	public function drawText($fontSize, $rotation, $x, $y, $fontFile, $text)
	{
		imagettftext($this->image, $fontSize, $rotation, $x, $y, $this->colorForeground, $fontFile, $text);
	}

	public function getImage()
	{
		ob_start();
		imagepng($this->image);
		imagedestroy($this->image);
		return ob_get_clean();
	}

	private function allocateColor($rgb)
	{
		return imagecolorallocate($this->image, $rgb[0], $rgb[1], $rgb[2]);
	}
}