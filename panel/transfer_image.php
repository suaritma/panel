<?php
echo "Transfer Image Method Deactivated! - Please Edit This File For Activation!"; exit();
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set("Europe/Istanbul");
$con_old = mysqli_connect("localhost", "aquacora_isatest", "159*357", "aquacora_boga");
$con_new = mysqli_connect("localhost", "aquacora_panel", "M200403306", "aquacora_panel");
mysqli_set_charset($con_old, "utf8");
mysqli_set_charset($con_new, "utf8");
$old_images = mysqli_query($con_old, "SELECT `customers`.`fullname` as `fullname`, `customers`.`gsm` as `gsm`, `customers`.`email` as `email`, `images`.`filename` as `filename`, `images`.`description` as `description` FROM `images` INNER JOIN `customers` ON `customers`.`id` = `images`.`customer_id`");
while($old_img=mysqli_fetch_assoc($old_images)) {
    $row[] = $old_img;
}
$counter=1538397419;
foreach($row as $res) {
    $tm=time();
    $counter++;
    $split=explode(" ", $res['fullname']);
    $kac=count($split);
    $firstname=explode(" ".$split[$kac-1], $res['fullname']);
    $lastname=$split[$kac-1];
    $find_on_new=@mysqli_fetch_assoc(mysqli_query($con_new, "SELECT `id`, `dealer_id` FROM `customers` WHERE (`firstname` = '$firstname[0]' AND `lastname` = '$lastname') AND (`gsm` = '$res[gsm]' AND `email` = '$res[email]') LIMIT 1"));
    $new_namez=$counter.'.'.str_pad((string)$find_on_new['dealer_id'], 11, "0", STR_PAD_LEFT);
    $new_name=$new_namez.".tmp";
    $file = file_get_contents("../bayi/storage/app/images/".$res['filename']);
    file_put_contents('uploads/customers/'.$new_name, $file);
    mysqli_query($con_new, "INSERT INTO `customers_image` VALUES ('','$find_on_new[id]','0','$new_namez','$res[description]','$tm','0','1')");
    //echo $res['fullname']." - ".$res['gsm']." - ".$res['email']." - ".$res['filename']." - ".$new_name." - ".$firstname[0]." ".$lastname." - ".$find_on_new['id']." - ".$res['description']."<br>";
}
echo "Everything Transferred!";
?>
