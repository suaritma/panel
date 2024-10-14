<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $user_id = varsql($_GET['user_id']);
  $res = @mysqli_fetch_assoc(mysqli_query($con, "SELECT `problem_note` FROM `defects` WHERE `id` = '$id' AND `customer_id` = '$user_id'"));

  //Müşteri arıza çözüldü notu ve arızayı çözümleme penceresi 
?>
  <div class="modal-header info">
    <button type="button" class="close" data-dismiss="modal" aria-label="<?=$common_lang['modal_close']?>">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title text-center text-uppercase" id="get_defect_settlement">
      <b><?=$common_lang['modal_defect_settlement']?></b>
    </h4>
  </div>
  <form action="<?=DEALER_URL?>customers/view#defects_list" class="form-horizontal" method="post">
    <input type="hidden" name="id" value="<?=$user_id?>" />
    <input type="hidden" name="process" value="defect_settlement" />
    <input type="hidden" name="process_id" value="<?=$id?>" />
    <div class="modal-body">
    <div class="form-group">
      <label class="col-md-3 control-label" for="problem_note">
        <span><?=$common_lang['modal_defect_problem']?></span>
      </label>
      <div class="col-md-9">
        <div class="input-group" style="width:100%">
          <textarea class="form-control" name="problem_note" disabled><?=$res['problem_note']?></textarea>
        </div>
      </div>
    </div>
      <div class="form-group">
        <label class="col-md-3 control-label" for="solution_note">
          <span><?=$common_lang['modal_defect_solution']?></span>
        </label>
        <div class="col-md-9">
          <div class="input-group" style="width:100%">
            <textarea class="form-control" name="solution_note"></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><?=$common_lang['modal_close']?></button>
      <button type="submit" class="btn btn-primary"><?=$common_lang['modal_submit']?></button>
    </div>
  </form>
