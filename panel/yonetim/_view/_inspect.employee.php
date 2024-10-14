<div class="row">
    <div class="order-view-box col-md-12">
        <h3>Eleman Detayları</h3>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>ID:</strong></div>
                    <div class="col-sm-8">
                        #<?=$result_employee['id']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Firma:</strong></div>
                    <div class="col-sm-8">
                        <?=$get_company['name']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Bayi:</strong></div>
                    <div class="col-sm-8">
                        <?=$get_dealer['title']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Kullanıcı Adı:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_employee['username']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>E-Posta:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_employee['email']?>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-4"><strong>İsim:</strong></div>
                <div class="col-sm-8"><?=$result_employee['firstname']?></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>Soyisim:</strong></div>
                <div class="col-sm-8"><?=$result_employee['lastname']?></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>Telefon:</strong></div>
                <div class="col-sm-8">
                    <?=$result_employee['gsm']?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>Adres:</strong></div>
                <div class="col-sm-8"><?=$result_employee['address']?></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>Semt:</strong></div>
                <div class="col-sm-8" id="district"><?=$get_permission['title']?></div>
            </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                  <div class="col-sm-4"><strong>Son Giriş:</strong></div>
                  <div class="col-sm-8">
                    <?php if ($result_employee['online_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_employee['online_at']);?><?php } else { ?>-<?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4"><strong>Oluşturma:</strong></div>
                  <div class="col-sm-8">
                    <?php if ($result_employee['created_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_employee['created_at']);?><?php } else { ?>-<?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4"><strong>Güncelleme:</strong></div>
                  <div class="col-sm-8">
                    <?php if ($result_employee['updated_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_employee['updated_at']);?><?php } else { ?>-<?php } ?>
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Silinme:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_employee['deleted_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_employee['deleted_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Durum:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_employee['status']==1) { ?><span class="text-success">Aktif</span><?php } else { ?><span class="text-warning">Pasif</span><?php } ?>
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
        <h6 class="panel-title" style="padding: 0px !important;line-height: normal;">Sorumlu Olduğu Müşteriler</h6>
      </div>
      <div class="panel-body">
        <table id="basic-datatables" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ad Soyad</th>
                    <th>E-Posta</th>
                    <th>Gsm</th>
                    <th>İl</th>
                    <th>İlçe</th>
                    <th>Eklenme Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
              <?php if (!empty($result_customer)) {
                    foreach($result_customer as $res) { ?>
                <tr>
                    <td><?=$res['id']?></td>
                    <td><a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/customer','none','<?=$res['id']?>','0')"><?=$res['firstname']?> <?=$res['lastname']?></a></td>
                    <td><?=$res['email']?></td>
                    <td><?=$res['gsm']?></td>
                    <td class="city"><?=$res['city']?></td>
                    <td class="town"><?=$res['town']?></td>
                    <td><?=date("d/m/Y", $res['created_at'])?></td>
                    <td>
                      <div class="icon-container">
                        <a href="javascript:void(0);" onclick="goto('<?=DEALER_URL?>_external_login/','admin_to_customer','<?=$res['id']?>','0')"><span class="ti-share-alt"></span></a>
                      </div>
                      <div class="icon-container">
                        <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/customer','none','<?=$res['id']?>','0')"><span class="ti-search"></span></a>
                      </div>
                      <div class="icon-container">
                        <a href="<?=ADMIN_URL?>_modal/_get_customer_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#customer_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                      </div>
                      <div class="icon-container">
                        <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>customer/','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                      </div>
                    </td>
                </tr>
              <?php } } else { ?>
              <tr>
                <td colspan="12">
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
<div class="modal fade" id="customer_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>