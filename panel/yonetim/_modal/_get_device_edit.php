<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `devices` WHERE `id` = '$id'"));
  $get = mysqli_query($con, "SELECT `id`,`title` FROM `devices_category` WHERE (`status` = '1' AND `deleted_at` = '0') OR `id` = '$res[category_id]'");
  while ($row = @mysqli_fetch_assoc($get)) {
    $result_category[] = $row;
  }
  ?>
  <div class="modal-header text-center">
    <h4 class="modal-title">Cihaz Düzenle</h4>
  </div>
  <form role="form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="process" value="edit" />
    <input type="hidden" name="process_id" value="<?=$id?>" />
    <div class="modal-body">
      <div class="modal-body">
          <div class="form-group">
            <select class="form-control m-b" name="category" id="category">
              <?php foreach($result_category as $result) { ?>
                <option value="<?=$result['id']?>"<?php if ($result['id']==$res['category_id']) { ?> selected<?php } ?>><?=$result['title']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group"><input placeholder="Ürün Adı" class="form-control" name="name" type="text" value="<?=$res['name']?>"></div>
          <div class="form-group"><input placeholder="Marka" class="form-control" name="manufacturer" type="text" value="<?=$res['manufacturer']?>"></div>
          <div class="form-group"><input placeholder="Fiyat" class="form-control" name="price" type="text" value="<?=$res['price']?>"></div>
          <div class="form-group"><input placeholder="Seri" class="form-control" name="code" type="text" value="<?=$res['code']?>"></div>
          <div class="form-group"><input placeholder="Stok" class="form-control" name="stack" type="number" value="<?=$res['stack']?>"></div>
          <div class="form-group"><input placeholder="Desi" class="form-control" name="weight" type="number" value="<?=$res['weight']?>"></div>
          <div class="form-group"><input placeholder="Cihaz Resmi" class="form-control" name="image" type="file"></div>
          <div class="form-group"><textarea placeholder="Açıklama" class="form-control" name="description"><?=$res['description']?></textarea></div>
          <div class="form-group"><select class="form-control m-b" name="status"><option value="1"<?php if ($res['status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if ($res['status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
      <button type="submit" class="btn btn-default">Düzenle</button>
    </div>
  </form>
