<?php
	$get_location=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `dealers_location`.`latitude` as `latitude`,`dealers_location`.`longitude` as `longitude`, `dealers`.`title` as `title` FROM `dealers_location` INNER JOIN `dealers` ON `dealers`.`id`=`dealers_location`.`dealer_id` WHERE `dealers_location`.`dealer_id` = '$_SESSION[dealer_id]'"));
	if ((empty($get_location['latitude'])) || (empty($get_location['longitude']))) { $no_map=1; }
?>