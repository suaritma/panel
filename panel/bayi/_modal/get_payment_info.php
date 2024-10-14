<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $result_payment = @mysqli_fetch_assoc(mysqli_query($con, "SELECT `payments`.`completed` as `completed`, `payments`.`refunded` as `refunded`, `payments`.`transaction_id` as `transaction_id`, `payments_bank`.`name` as `name`, `payments_card`.`title` as `title`, `payments`.`amount` as `amount`, `payments`.`amount_transfered` as `amount_transfered`, `payments`.`amount_commission` as `amount_commission`, `payments`.`currency` as `currency`, `payments`.`installment` as `installment`, `payments`.`created_at` as `created_at` FROM `payments` INNER JOIN `payments_bank` ON `payments_bank`.`id` = `payments`.`bank_id` INNER JOIN `payments_card` ON `payments_card`.`id`=`payments`.`card_id` WHERE `payments`.`id` = '$id' LIMIT 1"));
echo mysqli_error($con);
?>
  <div class="modal-header info">
    <button type="button" class="close" data-dismiss="modal" aria-label="<?=$common_lang['modal_close']?>">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title text-center text-uppercase" id="get_payment_info">
      <b><?=$common_lang['modal_payment_info']?></b>
    </h4>
  </div>
  <table class="table table-bordered dataTable">
    <tbody>
      <tr>
        <th colspan="2"><?=$common_lang['modal_payment_id']?>:</th>
        <td colspan="2"><?=$result_payment['transaction_id']?></td>
      </tr>
        <tr>
          <th colspan="2"><?=$common_lang['modal_payment_bank']?>:</th>
          <td colspan="2"><?=$result_payment['name']?> > <?=$result_payment['title']?></td>
        </tr>
      <tr>
        <th colspan="2"><?=$common_lang['modal_payment_price']?>:</th>
        <td colspan="2"><?=$result_payment['amount']?> <?=$result_payment['currency']?></td>
      </tr>
      <tr>
        <th><?=$common_lang['modal_payment_comission']?>:</tdh>
        <td><?=$result_payment['amount_commission']?> <?=$result_payment['currency']?></td>
        <th><?=$common_lang['modal_payment_transfered']?>:</th>
        <td><?=$result_payment['amount_transfered']?> <?=$result_payment['currency']?></td>
      </tr>
      <tr>
        <th colspan="2"><?=$common_lang['modal_installment_count']?>:</th>
        <td colspan="2"><?php if ($result_payment['installment']>1) { ?><?=$result_payment['installment']?> <?=$common_lang['modal_payment_insted']?><?php } else { ?><?=$common_lang['modal_payment_inst']?><?php } ?></td>
      </tr>
      <tr>
        <th colspan="2"><?=$common_lang['modal_payment_date']?>:</th>
        <td colspan="2"><?=date("d/m/Y H:i:s", $result_payment['created_at'])?></td>
      </tr>
      <tr>
        <th colspan="2"><?=$common_lang['modal_payment_status']?>:</th>
        <td colspan="2"><?php if ($result_payment['completed']==1) { ?><span class="text-success"><?=$common_lang['modal_payment_status1']?></span><?php } else { ?><span class="text-danger"><?=$common_lang['modal_payment_status2']?></span><?php } ?> <?php if ($result_payment['refunded']==1) { ?><span class="text-warning"><?=$common_lang['modal_payment_status3']?></span><?php } ?></td>
      </tr>
    </tbody>
  </table>
