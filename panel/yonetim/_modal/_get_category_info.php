<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`,`status` FROM `devices_category` WHERE `id` = '$id'"));
  ?>
  <div class="modal-header text-center">
    <h4 class="modal-title">Kategori Düzenle</h4>
  </div>
  <form role="form" method="post">
    <input type="hidden" name="process" value="edit" />
    <input type="hidden" name="process_id" value="<?=$id?>" />
    <div class="modal-body">
      <div class="form-group"><input placeholder="<?=$res['title']?>" class="form-control" name="title" type="text" value="<?=$res['title']?>"></div>
      <div class="form-group">
        <select class="form-control m-b" name="status">
          <option value="1"<?php if ($res['status']==1) { ?> selected<?php } ?>>Aktif</option>
          <option value="0"<?php if ($res['status']==0) { ?> selected<?php } ?>>Pasif</option>
        </select>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
      <button type="submit" class="btn btn-default">Düzenle</button>
    </div>
  </form>
