<?php
	include('db.php');
	$timeccc=time();
	$set=mysqli_query($con, "SELECT * FROM customers_service WHERE id IN (SELECT MAX(id) FROM customers_service GROUP BY customer_id)");
	while ($setto=@mysqli_fetch_assoc($set)) {
    $result[] = $setto;   
}
$y=0;
foreach($result as $res) {
    if (($res['nextservice']<=$timeccc) && ($res['resolved']==1) && ($res['nextservice']!=0)) {
        $comp=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `dealer_id`,`deleted_at` FROM `customers` WHERE `id` = '$res[customer_id]' LIMIT 1"));
        if (($comp['deleted_at']==0) && ($res['nextservice']>='1514764800')) {
        $y++;
        echo $y."-".$comp['dealer_id']."-".$comp['deleted_at']."-".$res['id']."-".$res['customer_id']."-".date('d/m/Y', $res['nextservice'])."<br>";
        }
    }
    //mysqli_query($con, "UPDATE `customers_service` SET `resolved` = '0' WHERE `id` = '$res[id]' AND `nextservice` >= '$timeccc'");
}
	/*
    mysqli_query($con, "UPDATE `customers_service` SET `resolved` = '0' WHERE `nextservice` >= '$timeccc'");
mysqli_query($con, "UPDATE `customers_service` SET `resolved`='1'");
$set=mysqli_query($con, "SELECT id FROM customers_service WHERE id IN (SELECT MAX(id) FROM customers_service_test GROUP BY customer_id)");
while ($setto=@mysqli_fetch_assoc($set)) {
    $result[] = $setto;   
}
foreach($result as $res) {
    echo $res['id']."<br>";
    mysqli_query($con, "UPDATE `customers_service` SET `resolved` = '0' WHERE `id` = '$res[id]' AND `nextservice` >= '$timeccc'");
}
*/
?>