<?php
$num=$_GET['num'];

require('class/BCGFontFile.php');
require('class/BCGColor.php');
require('class/BCGDrawing.php');
//require('class/BCGean13.barcode.php');
 require('class/BCGcode128.barcode.php');
 
$font = new BCGFontFile('./font/Arial.ttf', 18);
$color_black = new BCGColor(0, 0, 0);
$color_white = new BCGColor(255, 255, 255);
 
// Barcode Part
$code = new BCGcode128();
$code->setScale(2);
$code->setThickness(30);
$code->setForegroundColor($color_black);
$code->setBackgroundColor($color_white);
$code->setFont($font);
$code->parse($num);
 
// Drawing Part
$drawing = new BCGDrawing('', $color_white);
$drawing->setBarcode($code);
$drawing->draw();
 //$bc->draw("barcode.gif");
header('Content-Type: image/png');
 
$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);

//$imagen = imagecreatetruecolor(300,200);

//imagepng(./$imagen);
/*
$tn=imagecreatetruecolor(130,130);	
imagepng($tn);
*/
?>