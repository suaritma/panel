<div class="row">
  <div class="col-md-12">
    <div class="panel panel-card margin-b-30">
      <div class="panel-heading">
        <h4 class="panel-title">Kategoriler</h4>
      </div>
      <div class="panel-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Başlık</th>
              <th>Cihazlar</th>
              <th>Eklenme Tarihi</th>
              <th>Güncelleme Tarihi</th>
              <th>Durumu</th>
              <th>İşlemler</th>
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
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-card margin-b-30">
      <div class="panel-heading">
        <h4 class="panel-title">Kayıtlı Cihazlar</h4>
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
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30">
            <div class="panel-heading">
                <h4 class="panel-title">Kayıtlı Firmalar</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Firma Adı</th>
                            <th>Kayıtlı Bayi</th>
                            <th>Kullanıcı Adı</th>
                            <th>Telefon</th>
                            <th>E-Posta</th>
                            <th>Website</th>
                            <th>Son Giriş</th>
                            <th>Eklenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_company)) {
                            foreach($result_company as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td>
                              <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/company','none','<?=$res['id']?>','0')"><?=$res['name']?></a>
                            </td>
                            <td>
                              <a onclick="goto('<?=ADMIN_URL?>dealer/','company','<?=$res['id']?>')" href="javascript:void(0)">
                                <?=$res['count']?>
                              </a>
                            </td>
                            <td><?=$res['username']?></td>
                            <td><?=$res['phone']?></td>
                            <td><?=$res['email']?></td>
                            <td><?=$res['website']?></td>
                            <td><?=date("d/m/Y", $res['online_at'])?></td>
                            <td><?=date("d/m/Y", $res['created_at'])?></td>
                            <td>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=DEALER_URL?>_external_login/','admin_to_company','<?=$res['id']?>','0')"><span class="ti-share-alt"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/company','none','<?=$res['id']?>','0')"><span class="ti-search"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_company_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#company_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>company/','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                              </div>
                            </td>
                        </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="10">
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
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <div class="panel-heading">
                <h4 class="panel-title">Kayıtlı Bayiler</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bayi Kodu</th>
                            <th>Bayi Adı</th>
                            <th>Kayıtlı Firma</th>
                            <th>Müşterileri</th>
                            <th>Kullanıcı Adı</th>
                            <th>Telefon</th>
                            <th>E-Posta</th>
                            <th>Şehir</th>
                            <th>Son Giriş</th>
                            <th>Eklenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_dealer)) {
                            foreach($result_dealer as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['dealer_code']?></td>
                            <td>
                              <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/dealer','none','<?=$res['id']?>','0')"><?=$res['title']?></a>
                            </td>
                            <td>
                              <a onclick="goto('<?=ADMIN_URL?>dealer/','company_id','<?=$res['id']?>')" href="javascript:void(0)">
                                <?=$res['company_name']?>
                              </a>
                            </td>
                            <td>
                              <a onclick="goto('<?=ADMIN_URL?>customer/','dealer_id','<?=$res['id']?>')" href="javascript:void(0)">
                                <?=$res['count']?>
                              </a>
                            </td>
                            <td><?=$res['username']?></td>
                            <td><?=$res['gsm']?></td>
                            <td><?=$res['email']?></td>
                            <td><?=$res['city']?></td>
                            <td><?=date("d/m/Y", $res['online_at'])?></td>
                            <td><?=date("d/m/Y", $res['created_at'])?></td>
                            <td>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=DEALER_URL?>_external_login/','admin_to_dealer','<?=$res['id']?>','0')"><span class="ti-share-alt"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/dealer','none','<?=$res['id']?>','0')"><span class="ti-search"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_dealer_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#dealer_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>dealer/','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
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
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Kayıtlı Müşteriler</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Firma/Bayi</th>
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
                            <td><?=$res['company_name']?> / <?=$res['dealer_title']?></td>
                            <td><a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/customer','none','<?=$res['id']?>','0')"><?=$res['firstname']?> <?=$res['lastname']?></a></td>
                            <td><?=$res['email']?></td>
                            <td><?=$res['gsm']?></td>
                            <td><?=$res['city']?></td>
                            <td><?=$res['town']?></td>
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
<div class="modal fade" id="dealer_info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
<div class="modal fade" id="dealer_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
<div class="modal fade" id="company_info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
<div class="modal fade" id="company_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

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
