<?php
$img = $_POST['baseData'];
$img = str_replace('data:image/jpeg;base64,','',$img);
$img = str_replace(' ','',$img);
$data = base64_decode($img);
$imagepath = 'images/new'.rand(1000,10000).'.jpg';
file_put_contents($imagepath,$data);
echo $imagepath;
?>