<?php
$get=mysqli_query($con, "SELECT `id`,`title` FROM `dealers` WHERE `company_id` = '$_SESSION[company_id]'");
while ($row = @mysqli_fetch_assoc($get)) {
  $result_dealer[] = $row;
}
?>
