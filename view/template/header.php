<?php 
	
	function locateMainCssFile() {
		$path = '';
		$dir = ['/public/css/', '/../../public/css/'];
		
		if (file_exists(dirname($dir[0]))) {
			$path = $dir[0];
		} else {
			$path = $dir[1];
		}
		echo $path. 'main.css';
	}

?> 




<!DOCTYPE html>
<html>
	<!-- the head section -->
	<head>
		<title>Programming Meetup</title>
		<link rel="stylesheet" type="text/css"
			  href = '<?php locateMainCssFile() ?>'>
	</head>
	
	<!-- the body section -->
	<body>
	
	<header>
		<h1>Programming Meetup</h1>
	</header>
