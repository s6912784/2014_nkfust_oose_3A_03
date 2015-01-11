<?
header("context-type:image/png");
$im = imagecreatetruecolor(150,80);

$color = imagecolorallocate($im,255,255,255);
$color = imagettftext($im,26,5,5,50,$color,"63193___.TTF",sprintf("%06d",$_GET[r]));
imagejpeg($im);
imagedestroy($im);
?>