<?php

// Load the stamp and the photo to apply the watermark to
$watermark = imagecreatefrompng('Love-f13_240pxw.png');
$image = imagecreatefromjpeg('2019_Gili_V0120026.JPG');

$wm_x = imagesx($watermark);
$wm_y = imagesy($watermark);
$img_x = imagesx($image);
$img_y = imagesy($image);

// calculate watermark size
$wm_scale = 19; // 2 = 1/2
$wm_w = $img_x/$wm_scale;
$wm_aspect = $wm_y/$wm_x;
$wm_h = (int) ($wm_aspect * $wm_w);

// calculate margin
$margin_scale = 6; // 2 = 1/2
$margen_right = $wm_w/$margin_scale;
$margen_bottom = $wm_h/$margin_scale;

// calculate watermark destination
$dst_x = $img_x - $wm_w - $margen_right;
$dst_y = $img_y - $wm_h - $margen_bottom;

imagecopyresized ($image, $watermark, $dst_x, $dst_y, 0, 0, $wm_w, $wm_h, $wm_x, $wm_y);

//imagescale($watermark, $wm_w, $wm_h);
//imagecopy($image, $watermark, $dst_x, $dst_y, 0, 0, $wm_w, $wm_h);

// Output and free memory
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);

?>