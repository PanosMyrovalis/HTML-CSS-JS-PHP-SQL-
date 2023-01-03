<?php 


$image = FALSE;
$name = (!empty($_GET['name'])) ? $_GET['name'] : 'print image';


if (isset($_GET['image']) && is_numeric($_GET['image']) ) {

	
	$image = 'gallery/' . (int) $_GET['image'];

	
	if (!file_exists ($image) || (!is_file($image))) {
		$image = FALSE;
	}
	
}


if (!$image) {
	$image = 'unavailable.png';
	$name = 'unavailable.png';
}


$info = getimagesize($image);
$fs = filesize($image);


header ("Content-Type: {$info['mime']}\n");
header ("Content-Disposition: inline; filename=\"$name\"\n");
header ("Content-Length: $fs\n");


readfile ($image);
		
?>