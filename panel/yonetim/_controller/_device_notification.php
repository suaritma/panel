<?php
for ($i=1; $i<=3; $i++) {
  for ($j=1; $j<=10; $j++) {
    if ((isset($_POST[$i.'_'.$j.'_set'])) && (!empty($_POST[$i.'_'.$j.'_set']))) {
      $process_id=$_POST[$i.'_'.$j.'_set'];
      $title=$_POST[$i.'_'.$j.'_title'];
      $content=$_POST[$i.'_'.$j.'_content'];
      $status=$_POST[$i.'_'.$j.'_status'];
      $check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `devices_notification` WHERE (`id` = '$process_id' AND `notify` = '$i') AND `type` = '$j'"));
      if ($check['total']==0) {
        mysqli_query($con, "INSERT INTO `devices_notification` VALUES ('','$process_id','$i','$j','$title','$content','$time','0','0','$status')");
      } else {
        mysqli_query($con, "UPDATE `devices_notification` SET `title` = '$title', `content` = '$content', `status` = '$status', `updated_at` = '$time' WHERE (`id` = '$process_id' AND `notify` = '$i') AND `type` = '$j'");
      }
    }
  }
}
?>
