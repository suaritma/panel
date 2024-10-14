<div class="row">
    <div class="order-view-box col-md-12">
        <h3>Kategori Detayları</h3>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>ID:</strong></div>
                    <div class="col-sm-8">
                        #<?=$result_category['id']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Başlık:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_category['title']?>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>Oluşturulma:</strong></div>
                    <div class="col-sm-8">
                        <?=date("d/m/Y H:i:s", $result_category['created_at'])?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Güncellenme:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_category['updated_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_category['updated_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>Silinme:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_category['deleted_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_category['deleted_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Durum:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_category['status']==1) { ?><span class="text-success">Aktif</span><?php } else { ?><span class="text-warning">Pasif</span><?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
  <div class="order-view-box col-md-12">
    <div class="panel panel-card margin-b-30 ">
      <div class="panel-heading">
        <h6 class="panel-title" style="padding: 0px !important;line-height: normal;">Kayıtlı Cihazlar</h6>
      </div>
      <div class="panel-body">
        <table id="basic-datatables" class="table table-bordered">
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
                  <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/device','none','<?=$res['id']?>','0')"><span class="ti-search"></span></a>
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
