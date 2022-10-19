<?php

// /*Checking the PHP GD Extension Enabled or Not*/
// // phpinfo();

// /*Using PHP GD Library to process images and creating dynamic certificates, captcha, reports etc.*/

// /*Creating Certificate Dynamically*/

// //Set the Content Type
// header('Content-type: image/jpeg');

// // Create Image From Existing File
// $jpg_image = imagecreatefromjpeg('certificate/certificate.jpg');

// // Allocate A Color For The Text
// $white = imagecolorallocate($jpg_image, 54, 12, 110);

// // Set Path to Font File
// $font_path = 'certificate/font.ttf';

// $name_text = "Chetan Rohilla";

// $date_text = date('jS F,Y');

// $signature = imagecreatefrompng('certificate/signature.png');

// imagettftext($jpg_image, 26, 0, 480, 400, $white, $font_path, $name_text);

// imagettftext($jpg_image, 20, 0, 220, 670, $white, $font_path, $date_text);

// /*signature on image*/
// imagecopy($jpg_image, $signature, 780, 620, 0, 0, 200, 58);
// /*signature on image*/

// // Send Image to Browser
// imagejpeg($jpg_image);

// // Clear Memory
// imagedestroy($jpg_image);

// include fpdf library class

require('fpdf/fpdf.php');

$image = 'certificate.jpg';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image($image,20,40,170,170);
$pdf->Output();

?>