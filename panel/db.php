<?php
ini_set('session.gc_maxlifetime',"86400");
ini_set("session.cookie_lifetime","86400");
ini_set('session.cache_limiter','public');
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_cache_limiter(false);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set("Europe/Istanbul");

$host = "localhost";
$user = "aquacora_panel";
$pass = "M200403306";
$name = "aquacora_panel";

$con = mysqli_connect($host, $user, $pass, $name);
mysqli_set_charset($con, "utf8");
@session_start();
define('UPLOAD_URL', 'https://www.aquacora.com.tr/panel/uploads/');
define('CUSTOMER_URL', 'https://www.aquacora.com.tr/panel/musteri/');
define('DEALER_URL', 'https://www.aquacora.com.tr/panel/bayi/');
define('ADMIN_URL', 'https://www.aquacora.com.tr/panel/yonetim/');

$time=time();
setlocale(LC_TIME, 'tr_TR');
$page=pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
if ((isset($_GET['i'])) && (!empty($_GET['i']))) {
  $i = $_GET['i'];
}
?>
