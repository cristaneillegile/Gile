<?php

$url = isset($_GET['url']) ? $_GET['url'] : 'clean';

switch ($url) {
	case 'Home':
		include 'home_gile.php';
		break;

	case 'Login':
		include 'login_gile.php';
		break;
	
	default:
		echo "<script>window.location.href='Login'</script>";
		break;
}



?>