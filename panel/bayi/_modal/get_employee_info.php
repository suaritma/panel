<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $user_id = varsql($_GET['user_id']);
  $get = mysqli_query($con, "SELECT `id`,`service_id`,`date`,`star`,`note` FROM `employee_jobs` WHERE `employee_id` = '$id' AND `customer_id` = '$user_id'");
  while ($row = @mysqli_fetch_assoc($get)) {
      $result_employee[] = $row;
  }
  // personel müşteri işlemleri geçmişi 
  ?>
  
  <div class="modal-header info">
    <button type="button" class="close" data-dismiss="modal" aria-label="<?=$common_lang['modal_close']?>">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title text-center text-uppercase" id="get_employee_info">
      <b><?=$common_lang['modal_employee_info']?></b>
    </h4>
  </div>
  <table class="table table-bordered dataTable">
    <thead>
      <tr class="info">
        <th class="text-center">#</th>
        <th class="text-center"><?=$common_lang['modal_date']?></th>
        <th class="text-center"><?=$common_lang['modal_score']?></th>
        <th class="text-center"><?=$common_lang['modal_description']?></th>
      </tr>
    </thead>
    <tfoot>
      <tr class="info">
        <th class="text-center">#</th>
        <th class="text-center"><?=$common_lang['modal_date']?></th>
        <th class="text-center"><?=$common_lang['modal_score']?></th>
        <th class="text-center"><?=$common_lang['modal_description']?></th>
      </tr>
    </tfoot>
    <tbody>
      <?php if (isset($result_employee)) {
        foreach ($result_employee as $res) { ?>
        <tr>
          <td><?=$res['id']?></td>
          <td><?=date("d/m/Y", $res['date'])?></td>
          <td><?=starfunc($res['star'])?></td>
          <td><?=$res['note']?></td>
        </tr>
      <?php } } else { ?>
        <tr>
          <td colspan="4"><?=$common_lang['modal_no_record']?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
