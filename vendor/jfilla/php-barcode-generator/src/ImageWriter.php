<?php

namespace JFilla\Barcode;

interface ImageWriter
{

	public function create($width, $height);

	public function setBackgroundColor($rgb);

	public function setForegroundColor($rgb);

	public function drawRectangle($x1, $y1, $x2, $y2);

	public function getTextBoxSize($fontSize, $rotation, $fontFile, $text);

	public function drawText($fontSize, $rotation, $x, $y, $fontFile, $text);

	public function getImage();
}