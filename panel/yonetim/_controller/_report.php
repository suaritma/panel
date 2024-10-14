<?php
	if ((isset($_POST['process'])) && ($_POST['process']=="send")) {
		$myids=explode("_", $_POST['process_id']);
		$val=array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]");
		if ($myids[0]==1) {
			$check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`, `content` FROM `messages` WHERE `status` = '1' AND `type` = '$myids[1]'"));
			if (!empty($check)) {
				if ($myids[1]==8) {
					$get=mysqli_query($con, "SELECT `id`,`title`,`gsm`,`email` FROM `dealers` WHERE `status` = '1' AND `deleted_at` = '0'");
					while($row=@mysqli_fetch_assoc($get)) {
						$result[]=$row;
					}
					foreach ($result as $res) {
						$vals=array('', '', '', $res['title'], $res['email'], $res['gsm']);
						$title=str_replace($val, $vals, $check['title']);
						$content=str_replace($val, $vals, $check['content']);
						if (send_service_sms($res['gsm'],$content)) {
    	      				mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$res[id]','2','$myids[1]','$content','$time','1')");
    	      			} else {
    	      				mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$res[id]','2','$myids[1]','$content','$time','0')");
    	      			}
					}
				} else {
					$get=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`email` as `email`, `dealers`.`title` as `title`, `dealers`.`gsm` as `dealer_gsm`, `dealers`.`email` as `dealer_email` FROM `customers` INNER JOIN `customers_config` ON `customers_config`.`customer_id` = `customers`.`id` INNER JOIN `dealers` ON `customers`.`dealer_id` = `dealers`.`id` WHERE `customers`.`status` = '1' AND `customers`.`deleted_at` = '0'");
					while($row=@mysqli_fetch_assoc($get)) {
						$result[]=$row;
					}
					foreach($result as $res) {
						$vals=array($res['firstname']."-".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm']);
						$title=str_replace($val, $vals, $check['title']);
						$content=str_replace($val, $vals, $check['content']);
						if (send_service_sms($res['gsm'],$content)) {
    	      				mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[id]','2','$myids[1]','$content','$time','1')");
    	      			} else {
    	      				mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[id]','2','$myids[1]','$content','$time','0')");
    	      			}
					}
				}
			}
		} elseif ($myids[0]==2) {
			$check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`, `content` FROM `emails` WHERE `status` = '1' AND `type` = '$myids[1]'"));
			if (!empty($check)) {
				if ($myids[1]==8) {
					$get=mysqli_query($con, "SELECT `id`,`title`,`gsm`,`email` FROM `dealers` WHERE `status` = '1' AND `deleted_at` = '0'");
					while($row=@mysqli_fetch_assoc($get)) {
						$result[]=$row;
					}
					foreach ($result as $res) {
						$vals=array('', '', '', $res['title'], $res['email'], $res['gsm']);
						$title=str_replace($val, $vals, $check['title']);
						$content=str_replace($val, $vals, $check['content']);
						if (send_service_mail($title,$content,$res['email'],$res['title'])) {
    	      				mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$res[id]','2','$myids[1]','$content','$time','1')");
    	      			} else {
    	      				mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$res[id]','2','$myids[1]','$content','$time','0')");
    	      			}
					}
				} else {
					$get=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`email` as `email`, `dealers`.`title` as `title`, `dealers`.`gsm` as `dealer_gsm`, `dealers`.`email` as `dealer_email` FROM `customers` INNER JOIN `customers_config` ON `customers_config`.`customer_id` = `customers`.`id` INNER JOIN `dealers` ON `customers`.`dealer_id` = `dealers`.`id` WHERE `customers`.`status` = '1' AND `customers`.`deleted_at` = '0'");
					while($row=@mysqli_fetch_assoc($get)) {
						$result[]=$row;
					}
					foreach($result as $res) {
						$vals=array($res['firstname']."-".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm']);
						$title=str_replace($val, $vals, $check['title']);
						$content=str_replace($val, $vals, $check['content']);
						if (send_service_mail($title,$content,$res['email'],$res['firstname'].' '.$res['lastname'])) {
    	      				mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[id]','2','$myids[1]','$content','$time','1')");
    	      			} else {
    	      				mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[id]','2','$myids[1]','$content','$time','0')");
    	      			}
					}
				}
			}
		} else {
		
		}
	}
?>