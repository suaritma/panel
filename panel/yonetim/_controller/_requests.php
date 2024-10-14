<?php
	if ((isset($_POST['process'])) && ($_POST['process']=="approve")) {
		$process_id=varsql($_POST['process_id']);
		$approve=mysqli_query($con, "UPDATE `message_requests` SET `status` = '1' WHERE `id` = '$process_id'");
		if ($approve) {
			$error = "2001";
		} else {
			$error = "1001";
		}
		
	}
	if ((isset($_POST['process'])) && ($_POST['process']=="reject")) {
		$process_id=varsql($_POST['process_id']);
		$reject=mysqli_query($con, "UPDATE `message_requests` SET `status` = '2' WHERE `id` = '$process_id'");
		if ($reject) {
			$error = "2002";
		} else {
			$error = "1002";
		}
	}
?>