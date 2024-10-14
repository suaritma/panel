<?php
	if ((isset($_POST['process'])) && ($_POST['process']=='add')) {
		if ((isset($_POST['city'])) && (!empty($_POST['city']))) {
			$city = varsql($_POST['city']);
		} else {
			$city = varsql($_POST['new_city']);
		}
		if ((isset($_POST['town'])) && (!empty($_POST['town']))) {
			$town = varsql($_POST['town']);
		} else {
			$town = varsql($_POST['new_town']);
		}
		if ((isset($_POST['district'])) && (!empty($_POST['district']))) {
			$district = varsql($_POST['district']);
		} else {
			$district = varsql($_POST['new_district']);
		}
		if ((isset($_POST['street'])) && (!empty($_POST['street']))) {
			$street = varsql($_POST['street']);
		} else {
			$error = "1001";
		}
		if (!isset($error)) {
			if (is_int($city)) {
				$city_id=$city;
			} else {
				mysqli_query($con, "INSERT INTO `pk_il` VALUES ('','$city','0','0')");
				$city_id=mysqli_insert_id($con);
			}
			if (is_int($town)) {
				$town_id=$town;
			} else {
				mysqli_query($con, "INSERT INTO `pk_ilce` VALUES ('','$city_id','$town')");
				$town_id=mysqli_insert_id($con);
			}
			if (is_int($district)) {
				$district_id=$district;
			} else {
				mysqli_query($con, "INSERT INTO `pk_semt` VALUES ('','$town_id','$district')");
				$district_id=mysqli_insert_id($con);
			}
			mysqli_query($con, "INSERT INTO `pk_mahalle` VALUES ('','$district_id','$street')");
			$street_id=mysqli_insert_id($con);
			mysqli_query($con, "INSERT INTO `pk_postakodu` VALUES ('','$street_id','00000')");
			$error = "2001";
		}
	}
	if ((isset($_POST['process'])) && ($_POST['process']=='postalcode')) {
		if ((isset($_POST['street'])) && (!empty($_POST['street']))) {
			$street = varsql($_POST['street']);
		} else {
			$error = "1001";
		}
		if ((isset($_POST['postalcode'])) && (!empty($_POST['postalcode']))) {
			$postalcode = varsql($_POST['postalcode']);
		} else {
			$error = "1002";
		}
		if (!isset($error)) {
			$update=mysqli_query($con, "UPDATE `pk_postakodu` SET `kod` = '$postalcode' WHERE `mahalle_id` = '$street'");
			if ($update) {
				$error = "2001";
			} else {
				$error = "1003";
			}
		}
	}
	if ((isset($_POST['process'])) && ($_POST['process']=='update')) {
	// İL JSON CREATE
		$pk_il=mysqli_query($con, "SELECT `id`,`name` FROM `pk_il` ORDER BY `id` ASC");
		while($row=@mysqli_fetch_assoc($pk_il)) {
    		$pk_il_set[]=$row;
    	}
    	if (!empty($pk_il_set)) {
    		$fp = fopen('_json/pk_il.json', 'w');
			fwrite($fp, json_encode($pk_il_set));
			fclose($fp);
    		$fp = fopen('../bayi/_json/pk_il.json', 'w');
			fwrite($fp, json_encode($pk_il_set));
			fclose($fp);
    	}
	// İLÇE JSON CREATE
		$pk_ilce=mysqli_query($con, "SELECT `id`,`il_id`,`name` FROM `pk_ilce` ORDER BY `id` ASC");
		while($row=@mysqli_fetch_assoc($pk_ilce)) {
    		$pk_ilce_set[]=$row;
    	}
    	if (!empty($pk_ilce_set)) {
    		$fp = fopen('_json/pk_ilce.json', 'w');
			fwrite($fp, json_encode($pk_ilce_set));
			fclose($fp);
    		$fp = fopen('../bayi/_json/pk_ilce.json', 'w');
			fwrite($fp, json_encode($pk_ilce_set));
			fclose($fp);
		}
	// SEMT JSON CREATE
		$pk_semt=mysqli_query($con, "SELECT `id`,`ilce_id`,`name` FROM `pk_semt` ORDER BY `id` ASC");
		while($row=@mysqli_fetch_assoc($pk_semt)) {
    		$pk_semt_set[]=$row;
    	}
    	if (!empty($pk_semt_set)) {
    		$fp = fopen('_json/pk_semt.json', 'w');
			fwrite($fp, json_encode($pk_semt_set));
			fclose($fp);
    		$fp = fopen('../bayi/_json/pk_semt.json', 'w');
			fwrite($fp, json_encode($pk_semt_set));
			fclose($fp);
		}
	// MAHALLE JSON CREATE
		$pk_mahalle=mysqli_query($con, "SELECT `id`,`semt_id`,`name` FROM `pk_mahalle` ORDER BY `id` ASC");
		while($row=@mysqli_fetch_assoc($pk_mahalle)) {
    		$pk_mahalle_set[]=$row;
    	}
    	if (!empty($pk_mahalle_set)) {
    		$fp = fopen('_json/pk_mahalle.json', 'w');
			fwrite($fp, json_encode($pk_mahalle_set));
			fclose($fp);
    		$fp = fopen('../bayi/_json/pk_mahalle.json', 'w');
			fwrite($fp, json_encode($pk_mahalle_set));
			fclose($fp);
		}
	// POSTAKODU JSON CREATE
		$pk_postakodu=mysqli_query($con, "SELECT `id`,`mahalle_id`,`kod` FROM `pk_postakodu` ORDER BY `id` ASC");
		while($row=@mysqli_fetch_assoc($pk_postakodu)) {
    		$pk_postakodu_set[]=$row;
    	}
    	if (!empty($pk_postakodu_set)) {
    		$fp = fopen('_json/pk_postakodu.json', 'w');
			fwrite($fp, json_encode($pk_postakodu_set));
			fclose($fp);
    		$fp = fopen('../bayi/_json/pk_postakodu.json', 'w');
			fwrite($fp, json_encode($pk_postakodu_set));
			fclose($fp);
		}
	// MASTER LOCATION JSON CREATE
		$pk=mysqli_query($con, "SELECT CONCAT(`pk_il`.`id`, '-', `pk_ilce`.`id`, '-', `pk_semt`.`id`, '-', `pk_mahalle`.`id`) AS `id`, CONCAT(`pk_il`.`name`, '-', `pk_ilce`.`name`, '-', `pk_semt`.`name`, '-', `pk_mahalle`.`name`) AS `name` FROM `pk_mahalle` INNER JOIN `pk_semt` ON `pk_semt`.`id`=`pk_mahalle`.`semt_id` INNER JOIN `pk_ilce` ON `pk_ilce`.`id`=`pk_semt`.`ilce_id` INNER JOIN `pk_il` ON `pk_il`.`id`=`pk_ilce`.`il_id` ORDER BY `pk_il`.`id` ASC");
		while($row=@mysqli_fetch_assoc($pk)) {
    		$pk_set[]=$row;
    	}
    	if (!empty($pk_set)) {
    		$fp = fopen('_json/pk_all_min.json', 'w');
			fwrite($fp, json_encode($pk_set));
			fclose($fp);
    		$fp = fopen('../bayi/_json/pk_all_min.json', 'w');
			fwrite($fp, json_encode($pk_set));
			fclose($fp);
		}
	}
?>