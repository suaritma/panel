
<?php

$eID= $_GET['id'];

$servername = "localhost";
$username = "aquacora_panel";
$password = "M200403306";
$dbname = "aquacora_panel";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE customers SET deleted_at=0 WHERE id='".$eID."' ";
  // Prepare komutu
  $stmt = $conn->prepare($sql);
  // komutu çalıştırma
  $stmt->execute();
  //  
   header('Location: /panel/yonetim/trash/customer?ok');

  echo $stmt->rowCount() . "<br><br><center>kayıt geri alındı. <a href='https://www.aquacora.com.tr/panel/yonetim/trash/customer'>Geri dön</a></center>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
?>