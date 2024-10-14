<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `companies` WHERE `id` = '$id'"));
  $country=mysqli_query($con, "SELECT `title`,`code` FROM `countries` WHERE `status` = '1'");
  while($result = @mysqli_fetch_assoc($country)) {
    $result_country[] = $result;
  }
?>
  <div class="modal-header text-center">
    <h4 class="modal-title">Firma Düzenle</h4>
  </div>
  <form role="form" method="post">
    <input type="hidden" name="process" value="edit" />
    <input type="hidden" name="process_id" value="<?=$id?>" />
    <div class="modal-body">
      <div class="form-group"><input placeholder="Firma Adı" class="form-control" name="name" type="text" value="<?=$res['name']?>"></div>
      <div class="form-group"><input placeholder="Kullanıcı Adı" class="form-control" name="username" type="text" value="<?=$res['username']?>"></div>
      <div class="form-group"><input placeholder="Şifre" class="form-control" name="password" type="text"></div>
      <div class="form-group"><input placeholder="Telefon" class="form-control" name="phone" type="text" value="<?=$res['phone']?>"></div>
      <div class="form-group"><input placeholder="E-Posta" class="form-control" name="email" type="text" value="<?=$res['email']?>"></div>
      <div class="form-group"><input placeholder="Website" class="form-control" name="website" type="text" value="<?=$res['website']?>"></div>
      <div class="form-group"><input placeholder="Vergi Dairesi" class="form-control" name="tax_office" type="text" value="<?=$res['tax_office']?>"></div>
      <div class="form-group"><input placeholder="Vergi No" class="form-control" name="tax_number" type="text" value="<?=$res['tax_number']?>"></div>
      <div class="form-group"><select name="country" class="form-control m-b">
        <?php foreach($result_country as $result) { ?>
          <option value="<?=$result['code']?>"<?php if ($res['country']==$result['code']) { ?> selected<?php } ?>><?=$result['title']?></option>
        <?php } ?>
      </select></div>
      <div class="form-group"><select name="language" class="form-control m-b">
        <option value="tr"<?php if ($res['language']=="tr") { ?> selected<?php } ?>>Türkçe</option>
        <option value="en"<?php if ($res['language']=="en") { ?> selected<?php } ?>>English</option>
        <option value="de"<?php if ($res['language']=="de") { ?> selected<?php } ?>>Deutsch</option>
      </select></div>
      <div class="form-group"><select name="status" class="form-control m-b">
        <option value="1"<?php if ($res['status']==1) { ?> selected<?php } ?>>Aktif</option>
        <option value="0"<?php if ($res['status']==0) { ?> selected<?php } ?>>Pasif</option>
      </select></div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
      <button type="submit" class="btn btn-default">Düzenle</button>
    </div>
  </form>
