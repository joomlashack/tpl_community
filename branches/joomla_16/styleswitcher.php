<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );
$cookie_prefix = "cascada-";
$cookie_time = time()+31536000;
if (isset($_GET['scheme'])) {
	$scheme = $_GET['scheme'];
	$_SESSION[$cookie_prefix. 'scheme'] = $scheme;
	setcookie ($cookie_prefix. 'scheme', $scheme, $cookie_time, '/', false);
}

if (isset($_GET['darklight'])) {
	$darklight = $_GET['darklight'];
	$_SESSION['darklight'] = $darklight;
	setcookie ('darklight', $darklight, $cookie_time, '/', false);
}

if (isset($_GET['bodystyle'])) {
	$bodystyle = $_GET['bodystyle'];
	$_SESSION['bodystyle'] = $bodystyle;
	setcookie ('bodystyle', $bodystyle, $cookie_time, '/', false);
}

?>
