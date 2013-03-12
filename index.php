<?php
	$tabs = array();
	$active = isset($_GET['tab']) ? $_GET['tab'] : null;
	
	foreach(glob('*.html') as $file) {
		$file = substr($file, 0, strlen($file) - 5); // - ".html"
		$tabs[] = $file;
	}
	
	if(empty($tabs))
		die('There doesn\'t exists any additional pages.');
	
	if(!in_array($active, $tabs))
		$active = $tabs[0];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>RacingLife Recruit</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<ul id="menu">
			<?php
				foreach($tabs as $t) {
					echo '<li'.($t == $active ? ' class="active"' : '').'><a data-tab="'.$t.'" href="?tab='.rawurlencode($t).'">'.$t.'</a></li>';
				}
			?>
		</ul>
		<div id="content">
			<?php
				include($active.'.html');
			?>
		</div>
		<script>
			$('#menu a').click(function(e) {
				e.preventDefault();
				$('#menu .active').removeClass('active');
				$(this).parent().addClass('active');
				$('#content').stop().fadeTo("fast", 0.3);
				
				$.ajax($(this).data('tab')+'.html').done(function(code) {
					$("#content").stop().fadeTo("fast", 1.0).html(code);
				});
			});
		</script>
	</body>
</html>