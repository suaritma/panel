<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $user_id = varsql($_GET['user_id']);
  $get = mysqli_query($con, "SELECT `id`, `count`, `price`, `date`, `payed_at`, `status` FROM `installments_inside` WHERE `installment_id` = '$id'");
  while ($row = @mysqli_fetch_assoc($get)) {
      $result_installment[] = $row;
  } 
  // taksit görme ekranı 
  ?>
  <div class="modal-header info">
    <button type="button" class="close" data-dismiss="modal" aria-label="<?=$common_lang['modal_close']?>">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title text-center text-uppercase" id="get_installment_info">
      <b><?=$common_lang['modal_installment_info']?></b>
    </h4>
  </div>
  <table class="table table-bordered dataTable">
    <thead>
      <tr class="info">
        <th class="text-center"><?=$common_lang['modal_installment_count']?></th>
        <th class="text-center"><?=$common_lang['modal_installment_price']?></th>
        <th class="text-center"><?=$common_lang['modal_installment_date']?></th>
        <th class="text-center"><?=$common_lang['modal_installment_status']?></th>
        <th class="text-center"><?=$common_lang['modal_installment_actions']?></th>
      </tr>
    </thead>
    <tfoot>
      <tr class="info">
        <th class="text-center"><?=$common_lang['modal_installment_count']?></th>
        <th class="text-center"><?=$common_lang['modal_installment_price']?></th>
        <th class="text-center"><?=$common_lang['modal_installment_date']?></th>
        <th class="text-center"><?=$common_lang['modal_installment_status']?></th>
        <th class="text-center"><?=$common_lang['modal_installment_actions']?></th>
      </tr>
    </tfoot>
    <tbody>
      <?php foreach ($result_installment as $res) {
        if ($res['status']==1) {
          $installment_type="installment_deny";
        } else {
          $installment_type="installment_approve";
        } ?>
        <tr>
          <td class="text-center"><?=$res['count']?></td>
          <td class="text-center"><?=$res['price']?></td>
          <td class="text-center"><?=$res['date']?></td>
          <td class="text-center"><?php if ($res['status']==1) { ?><p class="text-success"><?=$common_lang['modal_installment_payed']?></p><p><?=date('d/m/Y', $res['payed_at'])?></p><?php } else { ?><p class="text-warning"><?=$common_lang['modal_installment_unpayed']?></p><?php } ?></td>
          <td class="text-center">
            <form action="<?=DEALER_URL?>customers/view" method="POST">
              <input type="hidden" name="process" value="<?=$installment_type?>" />
              <input type="hidden" name="process_id" value="<?=$res['id']?>" />
              <input type="hidden" name="id" value="<?=$user_id?>" />
              <?php if ($res['status']==1) { ?>
                <input type="submit" class="btn btn-danger btn-block" value="<?=$common_lang['modal_decline']?>" />
              <?php } else { ?>
                <input type="submit" class="btn btn-warning btn-block" value="<?=$common_lang['modal_accept']?>" />
              <?php } ?>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
