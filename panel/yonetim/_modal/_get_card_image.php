<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  ?>
  <div class="modal-header text-center">
    <h4 class="modal-title">Resim Düzenle</h4>
  </div>
  <form role="form" method="post" action="<?=ADMIN_URL?>payment/card" enctype="multipart/form-data">
    <input type="hidden" name="process" value="replace" />
    <input type="hidden" name="process_id" value="<?=$id?>" />
    <div class="modal-body">
      <div class="form-group"><img src="<?=UPLOAD_URL?>cards/<?=$id?>.tmp" style="width:100%" /></div>
      <div class="form-group"><input class="form-control" name="image" type="file"></div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
      <button type="submit" class="btn btn-default">Yükle</button>
    </div>
  </form>
