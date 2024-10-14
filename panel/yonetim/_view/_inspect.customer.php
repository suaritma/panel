<div class="row">
    <div class="order-view-box col-md-12">
        <h3>Müşteri Detayları</h3>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>ID:</strong></div>
                    <div class="col-sm-8">
                        #<?=$customer['id']?>
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
                    <div class="col-sm-4"><strong>İsim:</strong></div>
                    <div class="col-sm-8">
                        <?=$customer['firstname']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Soyisim:</strong></div>
                    <div class="col-sm-8">
                        <?=$customer['lastname']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>E-Posta:</strong></div>
                    <div class="col-sm-8">
                        <?=$customer['email']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>GSM:</strong></div>
                    <div class="col-sm-8">
                        <?=$customer['gsm']?>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>Doğum Günü:</strong></div>
                    <div class="col-sm-8">
                        <?=date("d/m/Y", $customer['birthdate'])?>
                    </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-4"><strong>Ülke:</strong></div>
                     <div class="col-sm-8">
                         <?=$get_country['title']?>
                     </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-4"><strong>İl:</strong></div>
                     <div class="col-sm-8">
                         <span id="city"><?=$customer['city']?></span>
                     </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-4"><strong>İlçe:</strong></div>
                     <div class="col-sm-8">
                         <span id="town"><?=$customer['town']?></span>
                     </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-4"><strong>Semt:</strong></div>
                     <div class="col-sm-8">
                         <span id="district"><?=$customer['district']?></span>
                     </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-4"><strong>Mahalle:</strong></div>
                     <div class="col-sm-8">
                         <span id="street"><?=$customer['street']?></span>
                     </div>
                </div>
                <div class="form-group">
                     <div class="col-sm-4"><strong>Adres:</strong></div>
                     <div class="col-sm-8">
                         <?=$customer['address']?>
                     </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>Konum:</strong></div>
                    <div class="col-sm-8">
                        <?php if ((!empty($customer['latitude'])) && (!empty($customer['longitude']))) { ?><a href="https://www.google.com/maps/@<?=$customer['latitude']?>,<?=$customer['longitude']?>,18z" target="_new">Konuma Git</a><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Online:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($customer['online_at']!=0) { ?><?=date("d/m/Y H:i:s", $customer['online_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Oluşturulma:</strong></div>
                    <div class="col-sm-8">
                        <?=date("d/m/Y H:i:s", $customer['created_at'])?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Güncellenme:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($customer['updated_at']!=0) { ?><?=date("d/m/Y H:i:s", $customer['updated_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Silinme:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($customer['deleted_at']!=0) { ?><?=date("d/m/Y H:i:s", $customer['deleted_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Durum:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($customer['status']==1) { ?><span class="text-success">Aktif</span><?php } else { ?><span class="text-warning">Pasif</span><?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="order-view-box col-md-12">
        <div class="panel panel-card">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Taksitler</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Notlar</th>
                            <th>Taksit Tutarı</th>
                            <th>Taksit Günü</th>
                            <th>Ödeme</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_installment)) {
                            foreach($result_installment as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['note']?></td>
                            <td><?=$res['price']?></td>
                            <td><?=date("d/m/Y", $res['date'])?></td>
                            <td><span class="<?=ins_dt_chk($res['date'],$res['in_status'])?>"><?=$lang['installment_s_'.$res['in_status']]?></span></td>
                            <td>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_installment_info.php?id=<?=$res['id']?>&user_id=<?=$id?>" data-toggle="modal" data-target="#installment_info" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-search"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_installment_edit.php?id=<?=$res['id']?>&user_id=<?=$id?>" data-toggle="modal" data-target="#installment_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/customer','installment_delete','<?=$id?>','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                              </div>
                            </td>
                        </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="6">
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
    <div class="order-view-box col-md-12">
        <div class="panel panel-card">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Cihazlar</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Marka</th>
                            <th>Kategori</th>
                            <th>Adı</th>
                            <th>Açıklama</th>
                            <th>Ürün Kodu</th>
                            <th>Eklenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_customer_devices)) {
                            foreach($result_customer_devices as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['manufacturer']?></td>
                            <td><?=$res['title']?></td>
                            <td><?=$res['name']?></td>
                            <td><?=$res['description']?></td>
                            <td><?=$res['serial']?></td>
                            <td><?=date("d/m/Y", $res['created_at'])?></td>
                            <td>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_customer_device_info.php?id=<?=$res['id']?>&user_id=<?=$id?>" data-toggle="modal" data-target="#customer_device_info" data-placement="top" title="İncele" data-original-title="İncele"><span class="ti-search"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_customer_device_edit.php?id=<?=$res['id']?>&user_id=<?=$id?>" data-toggle="modal" data-target="#customer_device_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/customer','device_delete','<?=$id?>','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
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
<div class="row">
    <div class="order-view-box col-md-12">
        <div class="panel panel-card">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Servisler</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cihaz Marka/Bilgi</th>
                            <th>Servis</th>
                            <th>Eklenme Tarihi</th>
                            <th>Sonraki Servis</th>
                            <th>Fiyat</th>
                            <th>Açıklama</th>
                            <th>Giriş TDS</th>
                            <th>Çıkış TDS</th>
                            <th>Müşteri bildirildi</th>
                            <th>Servis Yapıldı</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_services)) {
                            foreach($result_services as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['manufacturer']?> / <?=$res['device_name']?></td>
                            <td><?=$res['service_name']?></td>
                            <td class="image-date"><?=strftime('%e %B %Y', $res['date'])?></td>
                            <td class="image-date"><?=strftime('%e %B %Y', $res['nextservice'])?></td>
                            <td><?=$res['price']?>&nbsp;<?=$get_dealer['currency']?></td>
                            <td><?=$res['description']?></td>
                            <td><?=$res['in_tds']?></td>
                            <td><?=$res['out_tds']?></td>
                            <td>Hayır</td>
                            <td><?php if ($res['resolved']==1) { ?>Evet<?php } else { ?>Hayır<?php } ?></td>
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
    <div class="order-view-box col-md-12">
        <div class="panel panel-card">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Arızalar</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Problem</th>
                            <th>Çözüm</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_defects)) {
                            foreach($result_defects as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['problem_note']?></td>
                            <td><?=$res['solution_note']?></td>
                            <td class="image-date"><?=date("d/m/Y", $res['created_at'])?></td>
                            <td><?=$res['status']?></td>
                            <td>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/customer','defect_delete','<?=$id?>','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                              </div>
                            </td>
                        </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="6">
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
    <div class="order-view-box col-md-6">
        <div class="panel panel-card">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Bildirimler (SMS)</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipi</th>
                            <th>Mesaj</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_notifications_sms)) {
                            foreach($result_notifications_sms as $res) { ?>
                        <tr>
                          <td><?=$res['id']?></td>
                          <td><?=$res['title']?></td>
                          <td><?=$res['content']?></td>
                          <td><?=$res['date']?></td>
                          <td><?=$res['status']?></td>
                        </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="5">
                          <?=$lang['no_record']?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="order-view-box col-md-6">
        <div class="panel panel-card">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Bildirimler (E-Posta)</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipi</th>
                            <th>Mesaj</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_notifications_mail)) {
                            foreach($result_notifications_mail as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['title']?></td>
                            <td><?=$res['date']?></td>
                            <td><?=$res['content']?></td>
                            <td><?=$res['status']?></td>
                        </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="5">
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
    <div class="order-view-box col-md-12">
        <div class="panel panel-card">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Elemanlar</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>İsim Soyisim</th>
                            <th>Son Giriş</th>
                            <th>E-Posta</th>
                            <th>GSM</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_customer_employee)) {
                            foreach($result_customer_employee as $res) { ?>
                        <tr>
                          <td><?=$res['id']?></td>
                          <td><?=$res['firstname']?> <?=$res['lastname']?></td>
                          <td><?=date('d/m/Y H:i:s', $res['online_at'])?></td>
                          <td><?=$res['email']?></td>
                          <td><?=$res['gsm']?></td>
                          <td>
                            <div class="icon-container">
                              <a href="<?=ADMIN_URL?>_modal/_get_employee_info.php?id=<?=$res['id']?>&user_id=<?=$id?>" data-toggle="modal" data-target="#employee_info" data-placement="top" title="İncele" data-original-title="İncele"><span class="ti-search"></span></a>
                            </div>
                          </td>
                        </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="6">
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
    <div class="order-view-box col-md-12">
        <div class="panel panel-card">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Resimler</h4>
            </div>
            <div class="panel-body">
                <ul class="list-group col-md-12 images-list">
                  <?php if (!empty($result_images)) {
                    foreach($result_images as $res) { ?>
                    <li class="list-group-item col-md-6">
                      <ul class="list-group text-center">
                        <li class="list-group-item">
                          <a href="<?=UPLOAD_URL?>customers/<?=$res['sfx']?>.tmp" data-lightbox="images" data-title="<?=$res['description']?>">
                            <img src="<?=UPLOAD_URL?>customers/<?=$res['sfx']?>.tmp" alt="<?=$res['description']?>" class="img-responsive center-block img-thumbnail">
                          </a>
                        </li>
                        <li class="list-group-item">
                          <p class=""><b><?=$res['description']?></b></p>
                          <p class="text-muted image-date"><?=date("d/m/Y H:i:s", $res['created_at'])?></p>
                        </li>
                      </ul>
                    </li>
                  <?php } } else { ?>
                    <h3 class="text-center">
                      <b>Resim Bulunamadı</b>
                    </h3>
                  <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="installment_info" tabindex="-1" role="dialog" aria-labelledby="get_installment_info">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>

<div class="modal fade" id="installment_edit" tabindex="-1" role="dialog" aria-labelledby="get_installment_edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>

<div class="modal fade" id="customer_device_info" tabindex="-1" role="dialog" aria-labelledby="get_customer_device_info">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>

<div class="modal fade" id="customer_device_edit" tabindex="-1" role="dialog" aria-labelledby="get_customer_device_edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>

<div class="modal fade" id="employee_info" tabindex="-1" role="dialog" aria-labelledby="get_employee_info">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>
