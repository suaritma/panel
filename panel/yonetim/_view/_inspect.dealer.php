<div class="row">
    <div class="order-view-box col-md-12">
        <h3>Kategori Detayları</h3>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>ID:</strong></div>
                    <div class="col-sm-8">
                        #<?=$result_dealer['id']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Firma:</strong></div>
                    <div class="col-sm-8">
                        <?=$get_company['name']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Bayi Kodu:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_dealer['dealer_code']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Kullanıcı Adı:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_dealer['username']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>E-Posta:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_dealer['email']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Telefon:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_dealer['gsm']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Bayi Adı:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_dealer['title']?>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-4"><strong>İl:</strong></div>
                <div class="col-sm-8" id="city"><?=$result_dealer['city']?></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>İlçe:</strong></div>
                <div class="col-sm-8" id="town"><?=$result_dealer['town']?></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>Semt:</strong></div>
                <div class="col-sm-8" id="district"><?=$result_dealer['district']?></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>Mahalle:</strong></div>
                <div class="col-sm-8" id="street"><?=$result_dealer['street']?></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>Adres:</strong></div>
                <div class="col-sm-8">
                    <?=$result_dealer['address']?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>Para Birimi:</strong></div>
                <div class="col-sm-8">
                    <?=$result_dealer['currency']?>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-4"><strong>Dil:</strong></div>
                <div class="col-sm-8">
                    <?=$get_language['title']?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4"><strong>Son Giriş:</strong></div>
                  <div class="col-sm-8">
                    <?php if ($result_dealer['online_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_dealer['online_at']);?><?php } else { ?>-<?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4"><strong>Oluşturma:</strong></div>
                  <div class="col-sm-8">
                    <?php if ($result_dealer['created_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_dealer['created_at']);?><?php } else { ?>-<?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4"><strong>Güncelleme:</strong></div>
                  <div class="col-sm-8">
                    <?php if ($result_dealer['updated_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_dealer['updated_at']);?><?php } else { ?>-<?php } ?>
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Silinme:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_dealer['deleted_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_dealer['deleted_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Durum:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_dealer['status']==1) { ?><span class="text-success">Aktif</span><?php } else { ?><span class="text-warning">Pasif</span><?php } ?>
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
        <h6 class="panel-title" style="padding: 0px !important;line-height: normal;">Kayıtlı Elamanlar</h6>
      </div>
      <div class="panel-body">
        <table id="basic-datatables" class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Kullanıcı Adı</th>
              <th>İsim Soyisim</th>
              <th>E-Posta</th>
              <th>GSM</th>
              <th>Son Giriş</th>
              <th>Eklenme Tarihi</th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($result_employee)) {
              foreach($result_employee as $res) { ?>
            <tr>
              <td>
                <?=$res['id']?>
              </td>
              <td>
                <?=$res['username']?>
              </td>
              <td>
                <?=$res['firstname']?> <?=$res['lastname']?>
              </td>
              <td>
                <?=$res['email']?>
              </td>
              <td>
                <?=$res['gsm']?>
              </td>
              <td>
                <?=date("d/m/Y H:i", $res['online_at'])?>
              </td>
              <td>
                <?=date("d/m/Y H:i", $res['created_at'])?>
              </td>
              <td>
                <div class="icon-container">
                  <a href="javascript:void(0);" onclick="goto('<?=DEALER_URL?>_external_login/','admin_to_employee','<?=$res['id']?>','0')"><span class="ti-share-alt"></span></a>
                </div>
                <div class="icon-container">
                  <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/employee','none','<?=$res['id']?>','0')"><span class="ti-search"></span></a>
                </div>
                <div class="icon-container">
                  <a href="<?=ADMIN_URL?>_modal/_get_employee_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#employee_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                </div>
                <div class="icon-container">
                  <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>employee/','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                </div>
              </td>
            </tr>
            <?php } } else { ?>
            <tr>
              <td colspan="8">
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
<div class="modal fade" id="employee_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>