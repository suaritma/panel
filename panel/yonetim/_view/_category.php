<div class="row">
  <div class="col-md-12">
    <div class="panel panel-card margin-b-30 ">
      <div class="panel-heading">
        <h4 class="panel-title"><?=$lang['categories']?></h4>
        <div class="panel-actions">
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#category_add"><?=$lang['yeniekle']?></button>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th><?=$lang['baslik']?></th>
              <th><?=$lang['cihazlar']?></th>
              <th><?=$lang['eklenmetarihi']?></th>
              <th>Güncelleme Tarihi</th>
              <th>Durumu</th>
              <th><?=$lang['islemler']?></th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($result_category)) {
                  foreach($result_category as $res) { ?>
              <tr>
                <td><?=$res['id']?></td>
                <td>
                  <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/category','none','<?=$res['id']?>','0')"><?=$res['title']?></a>
                </td>
                <td>
                  <?php if ($res['count']==0) { ?>
                    <?=$res['count']?>
                  <?php } else { ?>
                    <a onclick="goto('<?=ADMIN_URL?>device/','category','<?=$res['id']?>')" href="javascript:void(0)">
                      <?=$res['count']?>
                    </a>
                  <?php } ?>
                </td>
                <td><?=date("d/m/Y H:i", $res['created_at'])?></td>
                <td><?=date("d/m/Y H:i", $res['updated_at'])?></td>
                <td><?php if ($res['status']==1) { ?><span class="text-success">Aktif</span><?php } else { ?><span class="text-warning">Pasif</span><?php } ?></td>
                <td>
                  <div class="icon-container">
                    <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/category','none','<?=$res['id']?>','0')"><span class="ti-search"></span></a>
                  </div>
                  <div class="icon-container">
                    <a href="<?=ADMIN_URL?>_modal/_get_category_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#category_edit" data-placement="top" title="İncele" data-original-title="İncele"><span class="ti-pencil"></span></a>
                  </div>
                  <div class="icon-container">
                    <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>category/','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                  </div>
                </td>
              </tr>
            <?php } } else { ?>
              <tr>
                <td colspan="7">
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
<div class="modal fade" id="category_add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title"><?=$lang['kategoriekle']?></h4>
      </div>
      <form role="form" method="post">
      <input type="hidden" name="process" value="add" />
      <div class="modal-body">
        <div class="form-group"><input placeholder="Kategori Adı" class="form-control" name="title" type="text"></div>
        <div class="form-group"><select class="form-control m-b" name="status"><option value="1"><?=$lang['aktif']?></option><option value="0"><?=$lang['pasif']?></option></select></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-accent" data-dismiss="modal"><?=$lang['kapat']?></button>
        <button type="submit" class="btn btn-default"><?=$lang['ekle']?></button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="category_info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
<div class="modal fade" id="category_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
