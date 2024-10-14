<div class="row">
  <div class="col-md-12">
    <div class="panel panel-card margin-b-30 ">
      <div class="panel-heading">
        <h4 class="panel-title">Kayıtlı Cihazlar</h4>
        <div class="panel-actions">
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#device_add"> Yeni Ekle</button>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Resim</th>
              <th>Cihaz Adı</th>
              <th>Kategori</th>
              <th>Marka</th>
              <th>Fiyat</th>
              <th>Seri</th>
              <th>Stok</th>
              <th>Desi</th>
              <th>Eklenme Tarihi</th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($result_device)) {
              foreach($result_device as $res) { ?>
            <tr>
              <td style="vertical-align: middle;">
                <?=$res['id']?>
              </td>
              <td style="vertical-align: middle;">
                <img src="<?=UPLOAD_URL?>devices/<?=$res['id']?>.tmp" style="height:56px" />
              </td>
              <td style="vertical-align: middle;">
                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/device','none','<?=$res['id']?>','0')"><?=$res['name']?></a>
              </td>
              <td style="vertical-align: middle;">
                <a onclick="goto('<?=ADMIN_URL?>device/','category','<?=$res['category_id']?>')" href="javascript:void(0)">
                  <?=$res['category_title']?>
                </a>
              </td>
              <td style="vertical-align: middle;">
                <a onclick="goto('<?=ADMIN_URL?>device/','manufacturer','<?=$res['manufacturer']?>')" href="javascript:void(0)">
                  <?=$res['manufacturer']?>
                </a>
              </td>
              <td style="vertical-align: middle;">
                <?=$res['price']?>
              </td>
              <td style="vertical-align: middle;">
                <?=$res['code']?>
              </td>
              <td style="vertical-align: middle;">
                <?=$res['stack']?>
              </td>
              <td style="vertical-align: middle;">
                <?=$res['weight']?>
              </td>
              <td style="vertical-align: middle;">
                <?=date("d/m/Y", $res['created_at'])?>
              </td>
              <td style="vertical-align: middle;">
                <div class="icon-container">
                  <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/device','none','<?=$res['id']?>','0')"><span class="ti-search"></span>İncele</a>
                </div>
                <div class="icon-container">
                  <a href="<?=ADMIN_URL?>_modal/_get_device_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#device_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                </div>
                <div class="icon-container">
                  <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>device_notification/','','<?=$res['id']?>','0')"><span class="ti-email"></span></a>
                </div>
                <div class="icon-container">
                  <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>device/','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                </div>
              </td>
            </tr>
            <?php } } else { ?>
            <tr>
              <td colspan="11">
                <?=$lang['no_record']?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <?=$pagi?>
    </div>
  </div>
</div>
<div class="modal fade" id="device_add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title">Cihaz Ekle</h4>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
      <input type="hidden" name="process" value="add" />
      <div class="modal-body">
          <div class="form-group"><select class="form-control m-b" name="category" id="category"></select></div>
          <div class="form-group"><input placeholder="Cihaz Adı" class="form-control" name="name" type="text"></div>
          <div class="form-group"><input placeholder="Marka" class="form-control" name="manufacturer" type="text"></div>
          <div class="form-group"><input placeholder="Fiyat" class="form-control" name="price" type="text"></div>
          <div class="form-group"><input placeholder="Seri" class="form-control" name="code" type="text"></div>
          <div class="form-group"><input placeholder="Stok" class="form-control" name="stack" type="number"></div>
          <div class="form-group"><input placeholder="Desi" class="form-control" name="weight" type="number"></div>
          <div class="form-group"><input placeholder="Cihaz Resmi" class="form-control" name="image" type="file"></div>
          <div class="form-group"><textarea placeholder="Açıklama" class="form-control" name="description"></textarea></div>
          <div class="form-group"><select class="form-control m-b" name="status"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-default">Ekle</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="device_info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
<div class="modal fade" id="device_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
