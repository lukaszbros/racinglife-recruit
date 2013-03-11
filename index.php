<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>racinglife-recruit</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
		
</head>
<body>

	<ul id="menu">

		<?php

			foreach (glob("*.html") as $fileName) {
				$linkName = explode('.', $fileName)[0];

		 	   	echo '<li><a class="menuItem" href="' . $fileName . '">' . $linkName . '</a></li>';
		 	   	echo "\n";
			}

		?>

	</ul>

	<div id="mainContent">Index page</div>

</body>
</html>