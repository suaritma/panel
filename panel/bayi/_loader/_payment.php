<?php
  $cf_pay=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `payments_config` WHERE `id` = '1'"));
  for ($t=1; $t<=12; $t++) { $c[$t]=0; }
  $payments=mysqli_query($con, "SELECT `payments_card`.`id` as `id`, `payments_card`.`bank_id` as `bank_id`, `payments_card`.`title` as `title`, `payments_card`.`position` as `position`, `payments_card`.`i_1` as `i_1`, `payments_card`.`i_2` as `i_2`, `payments_card`.`i_3` as `i_3`, `payments_card`.`i_4` as `i_4`, `payments_card`.`i_5` as `i_5`, `payments_card`.`i_6` as `i_6`, `payments_card`.`i_7` as `i_7`, `payments_card`.`i_8` as `i_8`, `payments_card`.`i_9` as `i_9`, `payments_card`.`i_10` as `i_10`, `payments_card`.`i_11` as `i_11`, `payments_card`.`i_12` as `i_12`, `payments_card`.`status` as `status`, `payments_bank`.`iframe` as `iframe` FROM `payments_card` INNER JOIN `payments_bank` ON `payments_bank`.`id` = `payments_card`.`bank_id` WHERE `payments_card`.`status` = '1' ORDER BY `payments_card`.`position` ASC");
  while($row=@mysqli_fetch_assoc($payments)) {
    if ($cf_pay['method2']!=0) {
        $get_bank_info=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `iframe` FROM `payments_bank` WHERE `id` = '$cf_pay[method2]'"));
        $row['ext_iframe'] = $get_bank_info['iframe'];
    } else {
        $row['ext_iframe'] = $row['iframe'];
    }
    for ($t=1; $t<=12; $t++) {
      if ($row['i_'.$t]>=0) { $c[$t]=1; }
    }
    $result_payment[] = $row;
  }
  $info=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `email`, `gsm` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
?>
