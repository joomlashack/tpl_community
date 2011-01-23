<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );
$scheme = $style;

$cookie_prefix = "cascada-";
if (isset($_SESSION[$cookie_prefix. 'scheme'])) {
	$scheme = $_SESSION[$cookie_prefix. 'scheme'];
} elseif (isset($_COOKIE[$cookie_prefix. 'scheme'])) {
	$scheme = $_COOKIE[$cookie_prefix. 'scheme'];
}

if (isset($_SESSION['darklight'])) {
	$darklight = $_SESSION['darklight'];
} elseif (isset($_COOKIE['darklight'])) {
	$darklight = $_COOKIE['darklight'];
}

if (isset($_SESSION['bodystyle'])) {
	$bodystyle = $_SESSION['bodystyle'];
} elseif (isset($_COOKIE['bodystyle'])) {
	$bodystyle = $_COOKIE['bodystyle'];
}

?>