<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `dealers` WHERE `id` = '$id'"));
  $company=mysqli_query($con, "SELECT `id`,`name` FROM `companies` WHERE `deleted_at` = '0' AND `status` = '1' ORDER BY `id` ASC");
  while ($row = @mysqli_fetch_assoc($company)) {
    $result_company[] = $row;
  }
?>
  <div class="modal-header text-center">
    <h4 class="modal-title">Bayi Düzenle</h4>
  </div>
  <form role="form" method="post">
  <input type="hidden" name="process" value="edit">
  <input type="hidden" name="process_id" value="<?=$id?>">
  <div class="modal-body">
    <div class="form-group"><select name="company_id" class="form-control m-b">
	<?php foreach($result_company as $result) { ?>
	<option value="<?=$result['id']?>"<?php if ($result['id']==$res['company_id']) { ?> selected<?php } ?>><?=$result['name']?></option>
	<?php } ?>
	</select></div>
    <div class="form-group"><input name="dealer_code" placeholder="Bayi Kodu" class="form-control" type="text" value="<?=$res['dealer_code']?>"></div>
    <div class="form-group"><input name="title" placeholder="Bayi Adı" class="form-control" type="text" value="<?=$res['title']?>"></div>
    <div class="form-group"><input name="username" placeholder="Kullanıcı Adı" class="form-control" type="text" value="<?=$res['username']?>"></div>
    <div class="form-group"><input name="password" placeholder="Şifre" class="form-control" type="text"></div>
    <div class="form-group"><input name="email" placeholder="E-Posta" class="form-control" type="text" value="<?=$res['email']?>"></div>
    <div class="form-group"><input name="gsm" placeholder="Gsm" class="form-control" type="text" value="<?=$res['gsm']?>"></div>
    <div class="form-group"><select name="city" id="cityext" class="form-control m-b"></select></div>
    <div class="form-group"><select name="town" id="townext" class="form-control m-b"></select></div>
    <div class="form-group"><select name="district" id="districtext" class="form-control m-b"></select></div>
    <div class="form-group"><select name="street" id="streetext" class="form-control m-b"></select></div>
    <div class="form-group"><textarea name="address" placeholder="Adres" class="form-control" type="text"  ><?=$res['address']?></textarea></div>
    <div class="form-group"><select name="currency" class="form-control m-b">
      <option value="TRY"<?php if ($res['currency']=="TRY") { ?> selected<?php } ?>>TRY</option>
      <option value="USD"<?php if ($res['currency']=="USD") { ?> selected<?php } ?>>USD</option>
      <option value="EUR"<?php if ($res['currency']=="EUR") { ?> selected<?php } ?>>EUR</option>
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
    <button type="button" onClick="window.location.reload()" class="btn btn-accent" data-dismiss="modal">Kapat</button>
    <button type="submit" class="btn btn-default">Ekle</button>
  </div>
  </form>
  <script type="text/javascript"> getaddresstoform(<?=$res['city']?>,<?=$res['town']?>,<?=$res['district']?>,<?=$res['street']?>,'ext'); </script>
