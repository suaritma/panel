<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $result_employee = @mysqli_fetch_assoc(mysqli_query($con, "SELECT `username`, `firstname`, `lastname`, `email`, `gsm`, `address`, `status` FROM `employee` WHERE `id` = '$id' AND `dealer_id` = '$_SESSION[dealer_id]'"));
  $auto_access = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `employee_auto_access` WHERE `employee_id` = '$id'"));
  $permissions = mysqli_query($con, "SELECT `id`,`title` FROM `permissions` WHERE `status` = '1' ORDER BY `id` ASC");
  while($row=@mysqli_fetch_assoc($permissions)) {
      $result_permissions[] = $row;
  }
?>
  <div class="modal-header info">
    <button type="button" class="close" data-dismiss="modal" aria-label="<?=$common_lang['modal_close']?>">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title text-center text-uppercase" id="get_employee_edit">
      <b><?=$common_lang['modal_employee_edit']?></b>
    </h4>
  </div>
  <form action="<?=DEALER_URL?>dealer/employee" class="form-horizontal" method="post">
    <input type="hidden" name="process" value="employee_edit" />
    <input type="hidden" name="id" value="<?=$id?>" />
    <div class="modal-body">
      <div class="form-group">
        <div class="col-md-10 col-md-offset-1">
          <input type="text" name="username" placeholder="<?=$common_lang['modal_employee_username']?>" class="form-control" value="<?=$result_employee['username']?>" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <input type="password" name="password" placeholder="<?=$common_lang['modal_employee_password']?>" class="form-control" value="" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <input type="password" name="repassword" placeholder="<?=$common_lang['modal_employee_repassword']?>" class="form-control" value="" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <input type="text" name="firstname" placeholder="<?=$common_lang['modal_employee_firstname']?>" class="form-control" value="<?=$result_employee['firstname']?>" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <input type="text" name="lastname" placeholder="<?=$common_lang['modal_employee_lastname']?>" class="form-control" value="<?=$result_employee['lastname']?>" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <input type="text" name="email" placeholder="<?=$common_lang['modal_employee_email']?>" class="form-control" value="<?=$result_employee['email']?>" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <input type="text" name="gsm" placeholder="<?=$common_lang['modal_employee_gsm']?>" class="form-control" value="<?=$result_employee['gsm']?>" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <textarea name="address" placeholder="<?=$common_lang['modal_employee_address']?>" class="form-control"><?=$result_employee['address']?></textarea>
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <select class="form-control" name="permission">
                <?php foreach($result_permissions as $res) { ?>
                    <option value="<?=$res['id']?>"><?=$res['title']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <select class="form-control" name="status">
            <option value="1"<?php if ($auto_access['total']==1) { ?> selected<?php } ?>>Otomatik Sorumlu Yapma</option>
            <option value="0"<?php if ($auto_access['total']==0) { ?> selected<?php } ?>>Otomatik Sorumlu Yap</option>
          </select>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <select class="form-control" name="status">
            <option value="1"<?php if ($result_employee['status']==1) { ?> selected<?php } ?>><?=$common_lang['modal_active']?></option>
            <option value="0"<?php if ($result_employee['status']==0) { ?> selected<?php } ?>><?=$common_lang['modal_passive']?></option>
          </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><?=$common_lang['modal_close']?></button>
      <button type="submit" class="btn btn-primary"><?=$common_lang['modal_edit']?></button>
    </div>
  </form>
