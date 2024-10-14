<?php
 
$silinecekID= $_GET['id'];

$host = "localhost";
$user = "aquacora_panel";
$pass = "M200403306";
$name = "aquacora_panel";
 
$baglan=mysqli_connect($host, $user, $pass, $name);
mysqli_set_charset($baglan, "utf8");
 
$sonuc=mysqli_query($baglan,"DELETE from customers  where id=".$silinecekID);
 
if($sonuc>0){
 header('Location: /panel/yonetim/trash/customer?ok');
 }
else
 header('Location: /panel/yonetim/trash/customer?hata');
 
?>