<div class="col-md-12"></div>
<div class="customer-page-icons hidden-xs no-print">
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active text-center">
      <a href="#user_info" aria-controls="user_info" role="tab" data-toggle="tab" title="Müşteri Bilgileri">
        <img src="<?=DEALER_URL?>_assets/images/man.png">
        <p class="text-center"><b><?=$lang['customer_menu_1']?></b></p>
      </a>
    </li>
    <li role="presentation" class="text-center">
      <a href="#devices_list" aria-controls="devices_list" role="tab" data-toggle="tab" title="Cihaz Ekle">
        <img src="<?=DEALER_URL?>_assets/images/device.png">
        <p class="text-center"><b><?=$lang['customer_menu_2']?></b></p>
      </a>
    </li>
    <li role="presentation" class="text-center">
      <a href="#services_list" aria-controls="services_list" role="tab" data-toggle="tab" title="Servis Ekle">
        <img src="<?=DEALER_URL?>_assets/images/settings.png">
        <p class="text-center"><b><?=$lang['customer_menu_3']?></b></p>
      </a>
    </li>
    <li role="presentation" class="text-center">
      <a href="#defects_list" aria-controls="defects_list" role="tab" data-toggle="tab" title="Arıza Ekle">
        <img src="<?=DEALER_URL?>_assets/images/exclamation.png">
        <p class="text-center"><b><?=$lang['customer_menu_4']?></b></p>
      </a>
    </li>
    <li role="presentation" class="text-center">
      <a href="#customer_notifications" aria-controls="customer_notifications" role="tab" data-toggle="tab" title="Bildirim Ayarları">
        <img src="<?=DEALER_URL?>_assets/images/school-bell.png">
        <p class="text-center"><b><?=$lang['customer_menu_5']?></b></p>
      </a>
    </li>
    <li role="presentation" class="text-center">
      <a href="#employee_service" aria-controls="employee_service" role="tab" data-toggle="tab" title="Sorumlu Eleman">
        <img src="<?=DEALER_URL?>_assets/images/worker.png">
        <p class="text-center"><b><?=$lang['customer_menu_6']?></b></p>
      </a>
    </li>
    <li role="presentation" class="text-center">
      <a href="#images_list" aria-controls="images_list" role="tab" data-toggle="tab" title="Resim Ekle">
        <img src="<?=DEALER_URL?>_assets/images/landscape.png">
        <p class="text-center"><b><?=$lang['customer_menu_7']?></b></p>
      </a>
    </li>
    <li role="presentation" class="text-center">
      <a href="#location" aria-controls="location" role="tab" data-toggle="tab" title="Konum">
        <img src="<?=DEALER_URL?>_assets/images/map.png">
        <p class="text-center"><b><?=$lang['customer_menu_8']?></b></p>
      </a>
    </li>
    <?php if (!isset($_SESSION['employee_id'])) { ?>
    <li role="presentation" class="text-center">
      <a href="#message_customer" aria-controls="message_customer" role="tab" data-toggle="tab" title="Mesaj Gönder">
        <img src="<?=DEALER_URL?>_assets/images/letter.png">
        <p class="text-center"><b><?=$lang['customer_menu_9']?></b></p>
      </a>
    </li>
  <?php } ?>
  </ul>
</div>
<ul class="list-inline xs-icons visible-xs no-print" role="tablist">
  <li class="text-center active" role="presentation">
    <a href="#user_info" aria-controls="user_info" role="tab" data-toggle="tab">
      <img src="<?=DEALER_URL?>_assets/images/man.png">
      <p><?=$lang['customer_menu_1m']?></p>
    </a>
  </li>
  <li class="text-center" role="presentation">
    <a href="#devices_list" aria-controls="devices_list" role="tab" data-toggle="tab">
      <img src="<?=DEALER_URL?>_assets/images/device.png">
      <p><?=$lang['customer_menu_2m']?></p>
    </a>
  </li>
  <li class="text-center" role="presentation">
    <a href="#services_list" aria-controls="services_list" role="tab" data-toggle="tab">
      <img src="<?=DEALER_URL?>_assets/images/settings.png">
      <p><?=$lang['customer_menu_3m']?></p>
    </a>
  </li>
  <li class="text-center" role="presentation">
    <a href="#defects_list" aria-controls="defects_list" role="tab" data-toggle="tab">
      <img src="<?=DEALER_URL?>_assets/images/exclamation.png">
      <p><?=$lang['customer_menu_4m']?></p>
    </a>
  </li>
  <li class="text-center" role="presentation">
    <a href="#customer_notifications" aria-controls="customer_notifications" role="tab" data-toggle="tab">
      <img src="<?=DEALER_URL?>_assets/images/school-bell.png">
      <p><?=$lang['customer_menu_5m']?></p>
    </a>
  </li>
  <li class="text-center" role="presentation">
    <a href="#employee_service" aria-controls="employee_service" role="tab" data-toggle="tab">
      <img src="<?=DEALER_URL?>_assets/images/worker.png">
      <p><?=$lang['customer_menu_6m']?></p>
    </a>
  </li>
  <li class="text-center" role="presentation">
    <a href="#images_list" aria-controls="images_list" role="tab" data-toggle="tab">
      <img src="<?=DEALER_URL?>_assets/images/landscape.png">
      <p><?=$lang['customer_menu_7m']?></p>
    </a>
  </li>
  <li class="text-center" role="presentation">
    <a href="#location" aria-controls="location" role="tab" data-toggle="tab">
      <img src="<?=DEALER_URL?>_assets/images/map.png">
      <p><?=$lang['customer_menu_8m']?></p>
    </a>
  </li>
  <li class="text-center" role="presentation">
    <a href="#message_customer" aria-controls="message_customer" role="tab" data-toggle="tab">
      <img src="<?=DEALER_URL?>_assets/images/letter.png">
      <p><?=$lang['customer_menu_9m']?></p>
    </a>
  </li>
</ul>
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active fade in" id="user_info">
    <div class="col-md-12 user-information">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title">
            <i class="fa fa-user"></i>&nbsp;
            <span><?=$lang['customer_code']?>:</span>
            <span><?=$cf['customer_code']+$id?></span>
          </h2>
        </div>
        <div class="panel-body hidden-xs print-only">
          <ul class="list-group col-md-6">
            <li class="list-group-item hidden">
              <span id="customer_id"><?=$customer['id']?></span>
            </li>
            <li class="list-group-item">
              <strong><?=$lang['view_name']?></strong>:&nbsp;
              <span><?=$customer['firstname']?> <?=$customer['lastname']?></span>
            </li>
            <li class="list-group-item">
              <strong><?=$lang['view_gsm']?></strong>:&nbsp;
              <span><?=$customer['gsm']?></span>
            </li>
            <li class="list-group-item">
              <strong><?=$lang['view_mail']?></strong>:&nbsp;
              <span><?=$customer['email']?></span>
            </li>
            <li class="list-group-item">
              <strong><?=$lang['view_company']?></strong>:&nbsp;
              <span>Türkiye merkez</span>
            </li>
            <li class="list-group-item">
              <strong><?=$lang['view_birthdate']?></strong>:&nbsp;
              <span class="text-date"><?=date("d/m/Y", $customer['birthdate'])?></span>
            </li>
          </ul>

          <ul class="list-group col-md-6">
            <li class="list-group-item">
              <strong><?=$lang['view_last']?></strong>:
              <span class="text-date">&nbsp;<?=prevservice($id)?> (<?=lastservicetype($id)?>)</span>
            </li>
            <li class="list-group-item">
              <strong><?=$lang['view_next']?></strong>:
              <span class="text-date">&nbsp;<?=nextservice($id)?> (<?=nextservicetype($id)?>)</span>
            </li>

            <li class="list-group-item">
              <strong><?=$lang['view_address']?></strong>:&nbsp;
              <span id="get_customer_address"><?=$customer['city']?>-<?=$customer['town']?>-<?=$customer['district']?>-<?=$customer['street']?></span>
              <span>, <?=$customer['address']?></span>
            </li>
            <li class="list-group-item">
              <strong><?=$lang['view_product']?>:</strong>
              <span><?=$customer_devices_count['total']?></span>
            </li>
            <li class="list-group-item">
              <strong><?=$lang['view_date']?>:</strong>&nbsp;
              <span class="text-date"><?=date("d/m/Y", $customer['created_at'])?></span>
            </li>
          </ul>
        </div>

        <!--MOBILE VIEW-->
        <ul class="list-group visible-xs no-print">
          <li class="list-group-item">
            <strong><?=$lang['view_name']?></strong>:&nbsp;
            <span><?=$customer['firstname']?> <?=$customer['lastname']?></span>
          </li>

          <li class="list-group-item">
            <strong><?=$lang['view_gsm']?></strong>:&nbsp;
            <span><?=$customer['gsm']?></span>
            <span>&nbsp;-&nbsp;</span>
            <span><?=$customer['email']?></span>
          </li>

          <li class="list-group-item">
            <strong><?=$lang['view_next']?></strong>:&nbsp;
            <span class="text-date"><?=nextservice($id)?> (<?=nextservicetype($id)?>)</span>
          </li>

          <li class="list-group-item">
            <strong><?=$lang['view_address']?></strong>:&nbsp;
            <span id="get_customer_address_mobile"><?=$customer['city']?>-<?=$customer['town']?>-<?=$customer['district']?>-<?=$customer['street']?></span>
            <span>, <?=$customer['address']?></span>
          </li>
        </ul>
      </div>

      <!-- BUTTONS -->
      <div class="col-md-12 hidden-xs no-print">
        <ul class="list-inline">
  		<?php if ($_SESSION['p1']['pedit']==1) { ?>
          <li>
            <a onclick="goto('<?=DEALER_URL?>customers/edit','none','<?=$id?>','0','0')" href="javascript:void(0)" type="button" class="btn btn-warning" role="button">
                    <span><?=$lang['edit']?></span>&nbsp;
                    <i class="fa fa-pencil"></i>
                </a>
          </li>
          <?php } ?>
  		 <?php if ($_SESSION['p1']['pdel']==1) { ?>
          <li>
            <form action="<?=DEALER_URL?>customers/list" method="post" role="form" class="no-print">
              <input type="hidden" name="process" value="delete">
              <input type="hidden" name="id" value="<?=$id?>">
              <button class="btn btn-danger" role="button" type="submit">
                            <span><?=$lang['delete']?></span>&nbsp;
                            <i class="fa fa-trash-o"></i>
                        </button>
            </form>
          </li>
          <?php } ?>
          <li>
            <a class="btn btn-default no-print" href="javascript:window.print()">
                    <span><?=$lang['print']?></span>&nbsp;
                    <i class="fa fa-print"></i>
                </a>
          </li>
        </ul>
      </div>
      <div class="col-md-12 visible-xs btn-over-table no-print">
        <a onclick="goto('<?=DEALER_URL?>customers/edit','none','<?=$id?>','0','0')" href="javascript:void(0)" type="button" class="btn btn-warning btn-block" role="button">
            <span><?=$lang['edit']?></span>
            <span class="glyphicon glyphicon-pencil"></span>
        </a>
      </div>
      <div class="col-md-12 visible-xs btn-over-table no-print">
        <form action="<?=DEALER_URL?>customers/list" method="post" role="form">
          <input type="hidden" name="process" value="delete">
          <input type="hidden" name="id" value="<?=$id?>">
          <button class="btn btn-danger btn-block" role="button" type="submit">
            <span><?=$lang['delete']?></span>&nbsp;
            <i class="fa fa-trash-o"></i>
          </button>
        </form>
      </div>
    </div>

    <div class="col-md-3">
      <button type="submit" class="btn btn-primary btn-block">
    <span>Online İletkenlik Şebeke Suyu</span>
</button>
    </div>
    <div class="col-md-3">
      <button type="submit" class="btn btn-primary btn-block">
    <span>Online İletkenlik Temiz Suyu</span>
</button>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary btn-block">
    <span>Arıtma  %</span>
</button>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-success btn-block">
    <span>Online İşlem Merkezi</span>
</button>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-danger btn-block">
    <span>Cihazı Kapat</span>
</button>
    </div>

<?php if ($_SESSION['p2']['pview']==1) { ?>
    <div class="col-md-12" style="padding-top:15px">

      <div class="table-responsive">
        <table class="table table-bordered table-hover sortableTable">

          <thead>

            <tr class="info">

              <td>#</td>

              <td>Notlar</td>

              <td>Taksit Tutarı</td>

              <td>Taksit Günü</td>

              <td>Ödeme</td>

              <td>İşlemler</td>

            </tr>

          </thead>

          <tbody class="text-center">
            <?php if (!empty($result_installments)) { foreach ($result_installments as $res) { ?>
            <tr>
              <td>
                <span>
                  <p><strong><?=$res['id']?></strong></p>
                </span>
              </td>
              <td>
                <span>
                  <p><strong><?=$res['note']?></strong></p>
                </span>
              </td>
              <td>
                <span>
                  <p><strong><?=$res['price']?></strong></p>
                </span>
              </td>
              <td>
                <span>
                  <p><strong><?=date("d/m/Y", $res['date'])?></strong></p>
                </span>
              </td>
              <td>
                <span>
                  <p class="<?=ins_dt_chk($res['date'],$res['in_status'])?>"><strong><?=$lang['installment_s_'.$res['in_status']]?></strong></p>
                </span>
              </td>
              <td class="center">
                <a href="<?=DEALER_URL?>_modal/get_installment_info.php?id=<?=$res['id']?>&user_id=<?=$id?>" class="btn btn-primary btn-sm get_installment_info" data-toggle="modal" data-target="#installment_info" data-toggle="tooltip" data-placement="top" title="İncele" role="button" data-original-title="İncele">
                  <span class="glyphicon glyphicon-search"></span>
                </a>
  				<?php if ($_SESSION['p2']['pedit']==1) { ?>
                <a href="<?=DEALER_URL?>_modal/get_installment_edit.php?id=<?=$res['id']?>&user_id=<?=$id?>" class="btn btn-warning btn-sm get_installment_edit" data-toggle="modal" data-target="#installment_edit" data-toggle="tooltip" data-placement="top" title="Düzenle" role="button" data-original-title="Düzenle">
                  <span class="glyphicon glyphicon-wrench"></span>
                </a>
                <?php } ?>
                <?php if ($_SESSION['p2']['pdel']==1) { ?>
                <a onclick="goto('<?=DEALER_URL?>customers/view','installment_delete','<?=$id?>','<?=$res['id']?>','1')" href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" role="button" data-original-title="Sil">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
                <?php } ?>
              </td>
            </tr>
            <?php } } else { ?>
            <tr class="table-row border-bottom text-left">
              <td colspan="6">
                <?=$lang['no_record']?>
              </td>
            </tr>
            <?php } ?>
          </tbody>

          <tfoot>

            <tr class="info">

              <td>#</td>

              <td>Notlar</td>

              <td>Taksit Tutarı</td>

              <td>Taksit Günü</td>

              <td>Ödeme</td>

              <td>İşlemler</td>

            </tr>

          </tfoot>

        </table>
      </div>

    </div>
  <?php } ?>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="devices_list">
    <?php if ($_SESSION['p3']['padd']==1) { ?>
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title"><span class="fa fa-tablet"></span>&emsp; Cihaz Ekle</h2>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="post" action="<?=DEALER_URL?>customers/view#devices_list">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="process" value="device_add">
            <div class="form-group">
              <label class="col-md-3 control-label" for="device">
                <span>Cihaz Seç</span>
              </label>
              <div class="col-md-9">
                <select name="device_id" id="device" class="form-control" required>
                    <option value="" data-price="">Cihaz Seçiniz</option>
                  <?php foreach ($result_devices as $res) { ?>
                    <option value="<?=$res['id']?>" data-price="<?=$res['price']?>"><?=$res['title']?> -> <?=$res['manufacturer']?> -> <?=$res['name']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="cihaz_bedeli">
                <span>Cihaz Fiyatı</span>
              </label>
              <div class="col-md-9">
                <div class="input-group">
                  <input type="text" class="form-control" name="cihaz_bedeli" id="cihaz_bedeli">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="urun_serino">
                <span>Seri Numara</span>
              </label>
              <div class="col-md-9">
                <div class="input-group">
                  <input type="number" class="form-control" placeholder="Seri Numara" name="urun_serino" min="0" id="urun_serino">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="cihaz_adresi">
                <span>Cihaz Adresi</span>
              </label>
              <div class="col-md-9">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Cihaz Adresi" name="cihaz_adresi" min="0" id="cihaz_adresi">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="created_at" class="col-md-3 control-label">Tarih</label>
              <div class="col-md-9">
                <input type="date" name="created_at" value="2018-05-05" max="2018-05-05" class="form-control" id="created_at">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="description">
                <span>Detay</span>
              </label>
              <div class="col-md-9">
                <textarea name="description" id="description" cols="30" rows="2" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-9 col-md-offset-3">
                <input type="submit" class="btn btn-primary hidden-xs" value="Ürün Ekle">
                <input type="submit" class="btn btn-primary btn-block visible-xs" value="Ürün Ekle">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if ($_SESSION['p2']['padd']==1) { ?>
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title">-<span class="fa fa-tablet"></span>&emsp; Taksit Ekle </h2>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="post" action="<?=DEALER_URL?>customers/view#devices_list">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="process" value="installment">
            <div class="form-group">
              <label class="col-md-5 control-label" for="toplam_bedeli">
                <span>Fiyat</span>
              </label>
              <div class="col-md-5">
                <div class="input-group">
                  <input type="text" class="form-control" name="price" min="0" id="toplam_bedeli">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-5 control-label" for="pesinat">
                <span>Peşinat</span>
              </label>
              <div class="col-md-5">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Pesinat" name="advance" min="0" id="pesinat">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-5 control-label" for="taksit_sayisi">
                <span>Taksit sayısı</span>
              </label>
              <div class="col-md-5">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Taksit Sayısı" name="installment_count" min="0" id="taksit_sayisi">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-5 control-label" for="taksit_tutari">
                <span>Taksit Tutarı</span>
              </label>
              <div class="col-md-5">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Taksit Tutarı" name="installment_price" min="0" id="taksit_tutari" readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="taksit_baslangic" class="col-md-5 control-label">Taksit Baslangıç</label>
              <div class="col-md-5">
                <input type="date" name="date" value="2018-05-05" class="form-control" id="taksit_baslangic">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-5 control-label" for="not">
                <span>Notlar</span>
              </label>
              <div class="col-md-5">
                <textarea name="note" id="not" cols="30" rows="2" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 control-label">
                <button type="submit" class="btn btn-primary">Taksit Ekle</button>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  <?php } ?>
  <?php if ($_SESSION['p3']['pview']==1) { ?>
    <div class="col-md-12">
      <table class="table table-responsive table-bordered">
        <thead>
          <tr class="info">
            <td class="text-center">Marka</td>
            <td class="text-center">Ürün kategorisi</td>
            <td class="text-center">Ürün adı, açıklaması</td>
            <td class="text-center">Ürün kodu</td>
            <td class="text-center">Eklenme tarihi</td>
            <td class="text-center">İşlemler</td>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($result_customer_devices)) { foreach ($result_customer_devices as $res) { ?>
          <tr>
            <td>
              <span class="text-uppercase">
                <p><strong><?=$res['manufacturer']?></strong></p>
              </span>
            </td>
            <td>
              <span class="text-uppercase">
                <p><strong><?=$res['title']?></strong></p>
              </span>
            </td>
            <td>
              <span class="text-uppercase">
                <p><strong><?=$res['name']?></strong></p>
              </span>
            </td>
            <td>
              <span class="text-uppercase">
                <p><strong><?=$res['serial']?></strong></p>
              </span>
            </td>
            <td>
              <span class="text-date"><?=date("d/m/Y H:i:s", $res['created_at'])?></span>
            </td>
            <td>
              <a href="<?=DEALER_URL?>_modal/get_device_info.php?id=<?=$res['id']?>&user_id=<?=$id?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#device_info" data-toggle="tooltip" data-placement="top" title="İncele" role="button" data-original-title="İncele">
                <span class="glyphicon glyphicon-search"></span>
              </a>
  			  <?php if ($_SESSION['p3']['pedit']==1) { ?>
              <a href="<?=DEALER_URL?>_modal/get_device_edit.php?id=<?=$res['id']?>&user_id=<?=$id?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#device_edit" data-toggle="tooltip" data-placement="top" title="Düzenle" role="button" data-original-title="Düzenle">
                <span class="glyphicon glyphicon-wrench"></span>
              </a>
              <?php } ?>
  			  <?php if ($_SESSION['p3']['pdel']==1) { ?>
              <a onclick="goto('<?=DEALER_URL?>customers/view','device_delete','<?=$id?>','<?=$res['id']?>','1')" href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" role="button" data-original-title="Sil">
                <span class="glyphicon glyphicon-trash"></span>
              </a>
              <?php } ?>
            </td>
          </tr>
          <?php } } else { ?>
          <tr class="table-row border-bottom text-left">
            <td colspan="6">
              <?=$lang['no_record']?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } ?>
  <?php if ($_SESSION['p2']['pview']==1) { ?>
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover sortableTable">
          <thead>
            <tr class="info">
              <td>#</td>
              <td>Notlar</td>
              <td>Taksit Tutarı</td>
              <td>Taksit Günü</td>
              <td>Ödeme</td>
              <td>İşlemler</td>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php if (!empty($result_installments)) { foreach ($result_installments as $res) { ?>
            <tr>
              <td>
                <span><p><strong><?=$res['id']?></strong></p></span>
              </td>
              <td>
                <span><p><strong><?=$res['note']?></strong></p></span>
              </td>
              <td>
                <span><p><strong><?=$res['price']?></strong></p></span>
              </td>
              <td>
                <span>
                  <p><strong><?=date("d/m/Y", $res['date'])?></strong></p>
                </span>
              </td>
              <td>
                <span>
                  <p class="<?=ins_dt_chk($res['date'],$res['in_status'])?>"><strong><?=$lang['installment_s_'.$res['in_status']]?></strong></p>
                </span>
              </td>
              <td class="center">
                <a href="<?=DEALER_URL?>_modal/get_installment_info.php?id=<?=$res['id']?>&user_id=<?=$id?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#installment_info" data-toggle="tooltip" data-placement="top" title="İncele" role="button" data-original-title="İncele">
                  <span class="glyphicon glyphicon-search"></span>
                </a>
  			  	<?php if ($_SESSION['p2']['pedit']==1) { ?>
                <a href="<?=DEALER_URL?>_modal/get_installment_edit.php?id=<?=$res['id']?>&user_id=<?=$id?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#installment_edit" data-toggle="tooltip" data-placement="top" title="Düzenle" role="button" data-original-title="Düzenle">
                  <span class="glyphicon glyphicon-wrench"></span>
                </a>
                <?php } ?>
  			  	<?php if ($_SESSION['p2']['pdel']==1) { ?>
                <a onclick="goto('<?=DEALER_URL?>customers/view','installment_delete','<?=$id?>','<?=$res['id']?>','1')" href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" role="button" data-original-title="Sil">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
                <?php } ?>
              </td>
            </tr>
            <?php } } else { ?>
            <tr class="table-row border-bottom">
              <td colspan="6">
                <?=$lang['no_record']?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr class="info">
              <td>#</td>
              <td>Notlar</td>
              <td>Taksit Tutarı</td>
              <td>Taksit Günü</td>
              <td>Ödeme</td>
              <td>İşlemler</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  <?php } ?>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="defects_list">
  <?php if ($_SESSION['p5']['padd']==1) { ?>
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title"><i class="fa fa-exclamation-circle"></i>&emsp;Arıza Ekle</h2>
        </div>
        <div class="panel-body">
          <form action="<?=DEALER_URL?>customers/view#defects_list" class="form-horizontal" role="form" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="process" value="defect">
            <div class="form-group">
              <label class="control-label col-md-3" for="date">Arıza Tarihi</label>
              <div class="col-md-9">
                <input type="date" name="date" id="date" value="<?=date("Y-m-d", $time)?>" max="<?=date("Y-m-d", $time)?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="device"><span>Cihaz Seç</span></label>
              <div class="col-md-9">
                <select name="device_id" id="device" class="form-control" required>
                  <?php foreach ($result_customer_devices as $res) { ?>
                    <option value="<?=$res['id']?>"><?=$res['title']?> -> <?=$res['manufacturer']?> -> <?=$res['name']?> (<?=$res['serial']?>)</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" for="description">
                Arıza Notu
              </label>
              <div class="col-md-9">
                <textarea name="description" id="description" cols="30" rows="2" class="form-control"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-9 col-md-offset-3">
                <input type="submit" class="btn btn-primary hidden-xs" value="Arıza Ekle">
                <input type="submit" class="btn btn-primary btn-block visible-xs" value="Arıza Ekle">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if ($_SESSION['p5']['pview']==1) { ?>
    <div class="col-md-6">
      <table class="table table-bordered table-responsive table-hover table-striped sortableTable hidden-xs">
        <thead>
          <tr class="info">
            <td class="text-center">Problem</td>
            <td class="text-center">Çözüm</td>
            <td class="text-center">Tarih</td>
            <td class="text-center">Durum</td>
            <td></td>
          </tr>
        </thead>
          <tfoot>
            <tr class="info">
              <td class="text-center">Problem</td>
              <td class="text-center">Çözüm</td>
              <td class="text-center">Tarih</td>
              <td class="text-center">Durum</td>
              <td></td>
            </tr>
          </tfoot>
        <tbody>
          <?php if (!empty($result_defects)) { foreach($result_defects as $res) { ?>
            <tr>
              <td class="text-center"><?=$res['problem_note']?></td>
              <td class="text-center"><?=$res['solution_note']?></td>
              <td class="text-center"><?=date("d/m/Y", $res['created_at'])?></td>
              <td class="text-center <?=def_st_chk($res['status'])?>"><?=$lang['defects_s_' . $res['status']]?></td>
              <td>
                <?php if ($res['status']=='0') { ?>
  			  	  <?php if ($_SESSION['p5']['pedit']==1) { ?>
                  <a href="<?=DEALER_URL?>_modal/get_defect_settlement.php?id=<?=$res['id']?>&user_id=<?=$id?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#defect_settlement" data-toggle="tooltip" data-placement="top" title="Çözümle" role="button" data-original-title="Çözümle">
                    <span class="glyphicon glyphicon-check"></span>
                  </a>
                  <?php } ?>
                <?php } else { ?>
  			  	  <?php if ($_SESSION['p5']['pdel']==1) { ?>
                  <a onclick="goto('<?=DEALER_URL?>customers/view#defects_list','defect_delete','<?=$id?>','<?=$res['id']?>','1')" href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" role="button" data-original-title="Sil">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                  <?php } ?>
                <?php } ?>
              </td>
            </tr>
          <?php } } else { ?>
            <tr class="table-row border-bottom">
              <td colspan="4">
                <?=$lang['no_record']?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
<?php } ?>
    <!-- MOBILE VIEW -->
    <div class="col-md-12 visible-xs">
      <table class="table col-md-12 table-responsive table-bordered table-striped">
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="services_list">
    <div class="col-md-12" id="service_all" style="display:none">

    </div>
    <?php if ($_SESSION['p4']['padd']==1) { ?>
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title">
            <i class="fa fa-plus-circle"></i>&emsp;
            <span>Servis Ekle</span>
        </h2>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="<?=DEALER_URL?>customers/view#services_list">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="process" value="service_add">
            <div class="form-group">
              <label class="col-md-3 control-label" for="device">
                <span>Cihaz Seç</span>
              </label>
              <div class="col-md-9">
                <select name="customer_device_id" class="form-control" required>
                  <?php foreach ($result_customer_devices as $res) { ?>
                    <option value="<?=$res['id']?>"><?=$res['title']?> -> <?=$res['manufacturer']?> -> <?=$res['name']?> (<?=$res['serial']?>)</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">
                Servis Tarihi
              </label>
              <div class="col-md-9">
                <input type="date" class="form-control" name="date" value="<?=date("Y-m-d", $time)?>" max="<?=date("Y-m-d", $time)?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">
                Servis Notu
              </label>
              <div class="col-md-9">
                <textarea name="description" cols="30" rows="2" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">
                İşlem
              </label>
              <div class="col-md-9">
                <select name="service_id" required class="form-control">
                  <?php foreach ($result_service as $res) { ?>
                    <option value="<?=$res['id']?>"><?=$res['name']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="price" class="control-label col-md-3">
                Fiyat
              </label>
              <div class="col-md-9">
                <div class="input-group">
                  <input type="number" class="form-control" placeholder="Fiyat" name="price" required min="0">
                  <span class="input-group-addon"><?=$_SESSION['dealer_currency']?></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="tds" class="control-label col-md-3 col-md-offset-0 col-xs-12 col-xs-offset-0">
                TDS
              </label>
              <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Giriş Suyu TDS" name="in_tds">
              </div>
              <div class="col-xs-12 visible-xs tds-divider"></div>
              <div class="col-md-4 col-md-offset-1">
                <input type="text" class="form-control" placeholder="Çıkış Suyu TDS" name="out_tds">
              </div>
            </div>
            <div class="form-group">
              <label for="image" class="control-label col-md-3">Resim ekle</label>
              <div class="col-md-9">
                <input type="file" name="image" accept="image/*">
                <p class="help-block">En fazla 4MB!</p>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-9 col-md-offset-3">
                <input type="submit" class="btn btn-primary hidden-xs" value="Servis Ekle">
                <input type="submit" class="btn btn-primary btn-block visible-xs" value="Servis Ekle">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
    <div class="col-md-6">
      <!-- SERVISLER LISTELERI -->
      <ul class="list-group">
      <?php if ($_SESSION['p4']['pview']==1) { ?>
        <li class="list-group-item">
          <a href="#" class="btn btn-info btn-block" id="get_service_all" title="İncele" role="button">
            Hepsini Gör
          </a>
        </li>
      <?php } ?>
      <?php if ($_SESSION['p4']['pedit']==1) { ?>
        <form class="form-horizontal" role="form" method="POST" action="<?=DEALER_URL?>customers/view#services_list">
        <input type="hidden" name="id" value="<?=$id?>" />
        <input type="hidden" name="process" value="service_shift" />
          <li class="list-group-item">
            <select id="device_for_service" class="form-control" name="process_id" required>
              <?php foreach ($result_customer_devices as $res) { ?>
                <option value="<?=$res['id']?>"><?=$res['title']?> -> <?=$res['manufacturer']?> -> <?=$res['name']?> (<?=$res['serial']?>)</option>
              <?php } ?>
            </select>
          </li>
          <li class="list-group-item">
            <div class="form-group">
              <div class="col-md-6">
                <select id="set_per_1" name="period" class="form-control" required>
                  <option value="7">7 gün</option>
                  <option value="15">15 gün</option>
                  <option value="30">30 gün</option>
                  <option value="45">45 gün</option>
                  <option value="90">3 ay</option>
                  <option value="180">6 ay</option>
                  <option value="270">9 ay</option>
                  <option value="365">1 yıl</option>
                </select>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" id="period_checkbox">
                  </span>
                  <input id="set_per_2" type="number" name="periodc" class="form-control" disabled max="1000" required placeholder="Gün">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <input type="text" name="description" class="form-control" placeholder="Servis Notu">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-block">
                  <span>Sonraki Servisi Güncelle</span>&nbsp;
                  <i class="fa fa-refresh"></i>
                </button>
              </div>
            </div>
          </li>
        </form>
      <?php } ?>
      <?php if ($_SESSION['p4']['pview']==1) { ?>
        <div id="device_for_service_inside">

        </div>
      <?php } ?>
      </ul>
    </div>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="customer_notifications">
    <!-- MUSTERI BILDIRIM AYARLARI -->
    <?php if ($_SESSION['p6']['pedit']==1) { ?>
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title">
            <i class="fa fa-bell"></i>
            Müşteri Bildirim Ayarları
        </h2>
        </div>
        <div class="panel-body">
          <form action="<?=DEALER_URL?>customers/view#customer_notifications" class="form-horizontal" role="form" method="post">
            <input type="hidden" name="id" value="<?=$id?>" />
            <input type="hidden" name="process" value="notifications" />

            <!-- SERVICE PERIOD -->
            <div class="form-group">
              <label for="period" class="control-label col-md-4">Servis Periyodu</label>
              <div class="col-md-8">
                <label class="radio-inline"><input type="radio" name="service" value="1"<?php if ($notifications['service']==1) { echo " checked"; } ?>>Açık</label>
                <label class="radio-inline"><input type="radio" name="service" value="0"<?php if ($notifications['service']==0) { echo " checked"; } ?>>Kapalı</label>
              </div>
              <br class="visible-xs">
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <select name="period" class="form-control">
                      <option value="30"<?php if ($notifications['period']==30) { echo " selected"; } ?>>30 gün</option>
                      <option value="45"<?php if ($notifications['period']==45) { echo " selected"; } ?>>45 gün</option>
                      <option value="90"<?php if ($notifications['period']==90) { echo " selected"; } ?>>3 ay</option>
                      <option value="180"<?php if ($notifications['period']==180) { echo " selected"; } ?>>6 ay</option>
                      <option value="270"<?php if ($notifications['period']==270) { echo " selected"; } ?>>9 ay</option>
                      <option value="365"<?php if ($notifications['period']==365) { echo " selected"; } ?>>1 yıl</option>
                    </select>
                </div>
            </div>
            <!-- BIRTHDAY -->
            <div class="form-group">
              <label class="control-label col-md-4" for="birthday">Doğum Günü</label>
              <div class="col-md-8">
                <label class="radio-inline"><input type="radio" name="birthday" value="1"<?php if ($notifications['birthday']==1) { echo " checked"; } ?>>Açık</label>
                <label class="radio-inline"><input type="radio" name="birthday" value="0"<?php if ($notifications['birthday']==0) { echo " checked"; } ?>>Kapalı</label>
              </div>
            </div>
            <!-- HOLIDAY -->
            <div class="form-group">
              <label class="control-label col-md-4" for="holiday">Bayram Özel Gün</label>
              <div class="col-md-8">
                <label class="radio-inline"><input type="radio" name="special" value="1"<?php if ($notifications['special']==1) { echo " checked"; } ?>>Açık</label>
                <label class="radio-inline"><input type="radio" name="special" value="0"<?php if ($notifications['special']==0) { echo " checked"; } ?>>Kapalı</label>
              </div>
            </div>

            <!-- GREETING -->
            <div class="form-group">
              <label class="control-label col-md-4" for="greeting">Teşekkür</label>
              <div class="col-md-8">
                <label class="radio-inline"><input type="radio" name="thanks" value="1"<?php if ($notifications['thanks']==1) { echo " checked"; } ?>>Açık</label>
                <label class="radio-inline"><input type="radio" name="thanks" value="0"<?php if ($notifications['thanks']==0) { echo " checked"; } ?>>Kapalı</label>
              </div>
            </div>

            <!-- CAMPAIGN -->
            <div class="form-group">
              <label class="control-label col-md-4" for="campaign">Kampanya</label>
              <div class="col-md-8">
                <label class="radio-inline"><input type="radio" name="campaign" value="1"<?php if ($notifications['campaign']==1) { echo " checked"; } ?>>Açık</label>
                <label class="radio-inline"><input type="radio" name="campaign" value="0"<?php if ($notifications['campaign']==0) { echo " checked"; } ?>>Kapalı</label>
              </div>
            </div>
            <!-- Message & Email Notifications -->
            <div class="form-group">
              <label class="control-label col-md-4" for="notification_type">Bildirim Şekli</label>
              <div class="col-md-8">
                <label class="checkbox-inline">
                  <input type="checkbox" name="email" value="1"<?php if ($notifications['email']==1) { echo " checked"; } ?>>
                  E-posta
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="message" value="1"<?php if ($notifications['sms']==1) { echo " checked"; } ?>>
                  Kısa Mesaj (SMS)
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="notification" value="1"<?php if ($notifications['notification']==1) { echo " checked"; } ?>>
                  Mobil Bildirim
                </label>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <input type="submit" class="btn btn-primary hidden-xs update-notification" value="Güncelle">
                <input type="submit" class="btn btn-primary btn-block visible-xs update-notification" value="Güncelle">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if ($_SESSION['p6']['pview']==1) { ?>
    <div class="col-md-6">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr style="background: #158cba; color: #fff;">
              <th class="text-center">#</th>
              <th class="text-center">Tipi</th>
              <th class="text-center">Mesaj</th>
              <th class="text-center">Durum</th>
              <th class="text-center">Tarih</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($result_notifications_sms)) {
              foreach($result_notifications_sms as $res) { ?>
              <tr>
                <td><?=$res['id']?></td>
                <td><?=get_mess_type($res['message_id'], $res['type_id'])?></td>
                <td><?=$res['content']?></td>
                <td><?php if ($res['status']==1) { ?><span class="text-success">Gönderildi</span><?php } else { ?><span class="text-danger">Gönderilemedi</span><?php } ?></td>
                <td><?=date("d/m/Y H:i", $res['date'])?></td>
              </tr>
            <?php } } else { ?>
            <tr class="table-row border-bottom">
              <td colspan="5">
                <?=$lang['no_record']?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr style="background: #158cba; color: #fff;">
              <th>#</th>
              <th>Email tipi</th>
              <th>Email</th>
              <th>Tarih</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($result_notifications_mail)) {
              foreach($result_notifications_mail as $res) { ?>
            <tr>
                <td><?=$res['id']?></td>
                <td><?=get_mess_type($res['email_id'], $res['type_id'])?></td>
                <td><?=$res['content']?></td>
                <td><?=date("d/m/Y H:i", $res['date'])?></td>
          </tr>
          <?php } } else { ?>
            <tr class="table-row border-bottom">
              <td colspan="4">
                <?=$lang['no_record']?>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php } ?>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="employee_service">
    <!-- ELEMANLARA SERVIS EKLEME -->
    <?php if ($_SESSION['p7']['padd']==1) { ?>
    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title">
            <i class="fa fa-building-o"></i>&emsp;
            Sorumlu Elemana Ekle
          </h2>
        </div>
        <?php if (!empty($result_employee)) { ?>
        <div class="panel-body">
          <form action="<?=DEALER_URL?>customers/view#employee_service" method="post" class="form-horizontal">
            <input name="id" value="<?=$id?>" type="hidden">
            <input name="process" value="employee_attach" type="hidden">
            <div class="form-group">
              <div class="col-md-12">
                <select name="process_id" class="form-control">
                  <?php foreach($result_employee as $res) { ?>
                    <option value="<?=$res['id']?>"><?=$res['firstname']?> <?=$res['lastname']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <input value="Sorumlu Ekle" class="btn btn-primary btn-block" type="submit">
              </div>
            </div>
          </form>
        </div>
      <?php } else { ?>
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-12">
              <h3 class="text-center">Eleman ekleyin!</h3>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
            <a href='<?=DEALER_URL?>dealer/employee' class="btn btn-primary btn-block">Firma Eleman Sayfası</a>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  <?php } ?>
  <?php if ($_SESSION['p7']['pview']==1) { ?>
    <div class="col-md-8">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title">
            <i class="fa fa-building-o"></i>&emsp;
            Sorumlu Elemanlar
          </h2>
        </div>
        <table class="table table-bordered table-responsive table-hover table-striped sortableTable hidden-xs">
          <thead>
            <tr class="info">
              <td class="text-center">#</td>
              <td class="text-center">İsim Soyisim</td>
              <td class="text-center">Son Giriş Tarihi</td>
              <td class="text-center">E-Posta</td>
              <td class="text-center">GSM</td>
              <td class="text-center">İşlemler</td>
            </tr>
          </thead>
          <tfoot>
            <tr class="info">
              <td class="text-center">#</td>
              <td class="text-center">İsim Soyisim</td>
              <td class="text-center">Son Giriş Tarihi</td>
              <td class="text-center">E-Posta</td>
              <td class="text-center">GSM</td>
              <td class="text-center">İşlemler</td>
            </tr>
          </tfoot>
          <tbody>
            <?php if (!empty($result_customer_employee)) {
              foreach($result_customer_employee as $res) { ?>
              <tr>
                <td class="text-center"><?=$res['id']?></td>
                <td class="text-center"><?=$res['firstname']?> <?=$res['lastname']?></td>
                <td class="text-center"><?=date('d/m/Y H:i:s', $res['online_at'])?></td>
                <td class="text-center"><?=$res['email']?></td>
                <td class="text-center"><?=$res['gsm']?></td>
                <td class="text-center">
                  <a href="<?=DEALER_URL?>_modal/get_employee_info.php?id=<?=$res['id']?>&user_id=<?=$id?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#employee_info" data-toggle="tooltip" data-placement="top" title="İncele" role="button" data-original-title="İncele">
                    <span class="glyphicon glyphicon-search"></span>
                  </a>
  				<?php if ($_SESSION['p7']['pdel']==1) { ?>
                  <a onclick="goto('<?=DEALER_URL?>customers/view#employee_service','employee_delete','<?=$id?>','<?=$res['id']?>','1')" href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" role="button" data-original-title="Sil">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                <?php } ?>
                </td>
              </tr>
            <?php } } else { ?>
              <tr class="table-row border-bottom">
                <td colspan="6">
                  <?=$lang['no_record']?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php } ?>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="images_list">
  <?php if ($_SESSION['p8']['padd']==1) { ?>
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title">
            <i class="fa fa-camera"></i>&emsp;
            Resim Yükle
          </h2>
        </div>
        <div class="panel-body">
          <form action="<?=DEALER_URL?>customers/view#images_list" enctype="multipart/form-data" class="form-horizontal" role="form" method="post">
          <input type="hidden" name="id" value="<?=$id?>" />
          <input type="hidden" name="process" value="image_upload" />
            <div class="form-group">
              <label class="col-md-3 control-label">
                Resim Seç
              </label>
              <div class="col-md-9">
                <input type="file" name="image" required accept="image/*">
                <p class="help-block">En fazla 4MB!</p>
              </div>
            </div>
            <div class="form-group">
              <label for="image-detail" class="col-md-3 control-label">
                Detay
              </label>
              <div class="col-md-9">
                <input type="text" name="description" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary hidden-xs">
                  <span>Yükle</span>&nbsp;
                  <span class="glyphicon glyphicon-upload"></span>
                </button>
                <button type="submit" class="btn btn-primary btn-block visible-xs">
                  <span>Yükle</span>&nbsp;
                  <span class="glyphicon glyphicon-upload"></span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if ($_SESSION['p8']['pview']==1) { ?>
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title">
            <i class="fa fa-picture-o"></i>&emsp;
            Resimler
          </h2>
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
                  <?php if ($_SESSION['p8']['pdel']==1) { ?>
                  <li class="list-group-item">
                    <form action="<?=DEALER_URL?>customers/view#images_list" method="post" role="form">
                      <input type="hidden" name="process_id" value="<?=$res['id']?>">
                      <input type="hidden" name="id" value="<?=$id?>">
                      <input type="hidden" name="process" value="image_delete">
                      <button type="submit" class="btn btn-danger btn-block" data-toggle="tooltip" data-placement="top" title="" role="button" data-original-title="Sil">
                        <span>Sil</span>&nbsp;
                        <span class="glyphicon glyphicon-trash"></span>
                      </button>
                    </form>
                  </li>
                <?php } ?>
                </ul>
              </li>
            <?php } } else { ?>
              <h3 class="text-center text-capitalize">
                <b>Resim Bulunamadı</b>
              </h3>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="location">
    <!-- RESIMLER -->
    <div class="col-md-12">
      <p class="help-block">Güncelleme butonuna tıklayarak müşterinin konumunu bulunduğunuz konum olarak kaydedebilirsiniz ve Google Maps'den görebilirsiniz!</p>
      <?php if ($_SESSION['p9']['pedit']==1) { ?>
      <button class="btn btn-primary hidden-xs storeLocation">
        <span>Konumu Otomatik Güncelle</span>&nbsp;
        <i class="fa fa-refresh fa-lg"></i>
      </button>
      <?php } ?>
      <?php if ($_SESSION['p9']['pedit']==1) { ?>
      <button class="btn btn-warning hidden-xs" type="button" data-toggle="modal" data-target="#newLocation">&nbsp;Konumu elle güncelle
        <i class="fa fa-pencil"></i>
      </button>
      <?php } ?>
      <?php if ($_SESSION['p9']['pdel']==1) { ?>
      <button onclick="goto('<?=DEALER_URL?>customers/view#location','location_remove','<?=$id?>','0','1')" href="javascript:void(0)" class="btn btn-danger hidden-xs"  <?php if (($customer['latitude']==0) || ($customer['longitude']==0)) { ?>disabled="true"<?php } ?>>
    <span>Konumu Sil</span>&nbsp;
    <i class="fa fa-lg fa-trash"></i>
</button>
<?php } ?>
<?php if ($_SESSION['p9']['pview']==1) { ?>
      <a href="https://maps.google.com/maps?q=<?=$customer['latitude']?>,<?=$customer['longitude']?>&hl=tr-tr&t=m&z=18" class="btn btn-success hidden-xs google-button" <?php if (($customer['latitude']==0) || ($customer['longitude']==0)) { ?>disabled="true"<?php } ?> target="_blank">
    <span>Git</span>&nbsp;
    <i class="fa fa-map-marker fa-lg"></i>
</a>
<?php } ?>
      <ul class="list-group visible-xs">
        <?php if ($_SESSION['p9']['pedit']==1) { ?>
        <li class="list-group-item">
          <button class="btn btn-primary btn-block storeLocation">
            <span>Konumu Güncelle</span>&nbsp;
            <i class="fa fa-refresh fa-lg"></i>
        </button>
        </li>
      <?php } ?>
      <?php if ($_SESSION['p9']['pedit']==1) { ?>
        <li class="list-group-item">
          <button class="btn btn-warning btn-block" type="button" data-toggle="modal" data-target="#newLocation">&nbsp;
            Elle güncelle
            <i class="fa fa-pencil"></i>
        </button>
        </li>
      <?php } ?>
      <?php if ($_SESSION['p9']['pdel']==1) { ?>
        <li class="list-group-item">
          <button onclick="goto('<?=DEALER_URL?>customers/view#location','none','<?=$id?>','0','1')" href="javascript:void(0)" class="btn btn-danger btn-block"  <?php if (($customer['latitude']==0) || ($customer['longitude']==0)) { ?>disabled="true"<?php } ?>>
            <span>Konumu Sil</span>&nbsp;
            <i class="fa fa-lg fa-trash"></i>
        </button>
        </li>
      <?php } ?>
      <?php if ($_SESSION['p9']['pview']==1) { ?>
        <li class="list-group-item">
          <a href="https://www.google.com/maps/@<?=$customer['latitude']?>,<?=$customer['longitude']?>,16z" class="btn btn-success btn-block google-button"  <?php if (($customer['latitude']==0) || ($customer['longitude']==0)) { ?>disabled="true"<?php } ?> target="_blank">
            <span>Git</span>&nbsp;
            <i class="fa fa-map-marker fa-lg"></i>
        </a>
        </li>
      <?php } ?>
      </ul>
    </div>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="message_customer">
    <?php if (!isset($_SESSION['employee_id'])) { ?>
    <div class="col-md-12">
      <div class="alert alert-warning" role="alert">
        <p class="text-center">
          <strong>Müşteri Değişkenleri</strong>
          <span>&nbsp;( [isim], [eposta], [gsm] )&nbsp;</span>
          <strong>Bayi Değişkenleri</strong>
          <span>&nbsp;( [bayi_isim], [bayi_firma], [bayi_eposta], [bayi_gsm] )</span>
        </p>
      </div>
    </div>

    <div class="col-md-6 col-md-offset-3">
      <h2>Mesaj Gönder&emsp;
        <small><span id="message-count">0</span>/155 karakter</small>
      </h2>
      <form action="<?=DEALER_URL?>customers/view#message_customer" method="post" class="form-horizontal" role="form">
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="hidden" name="process" value="message">
        <div class="form-group">
          <div class="col-md-4">
            <input type="checkbox" name="type" value="email" /> E-Posta
          </div>
          <div class="col-md-4">
            <input type="checkbox" name="type" value="sms" /> Kısa Mesaj
          </div>
          <div class="col-md-4">
            <input type="checkbox" name="type" value="notification" /> Mobil Bildirim
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" class="form-control" minlength="5" maxlength="155" required cols="30" rows="3"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" role="button" value="Gönder">
        </div>
      </form>
    </div>
  <?php } ?>
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

<div class="modal fade" id="device_info" tabindex="-1" role="dialog" aria-labelledby="get_device_info">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>

<div class="modal fade" id="device_edit" tabindex="-1" role="dialog" aria-labelledby="get_device_edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>

<div class="modal fade" id="defect_settlement" tabindex="-1" role="dialog" aria-labelledby="get_defect_settlement">
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

<div class="modal fade" id="newLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                  &times;
              </span>
      </button>
        <h4 class="modal-title text-center text-uppercase" id="myModalLabel">
          <b>Elle Güncelle</b>
      </h4>
      </div>
      <form action="<?=DEALER_URL?>customers/view#location" id="newLocationForm" class="form-horizontal" method="post" name="newLocation" role="form">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?=$id?>">
          <input type="hidden" name="process" value="location_add">
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="text" name="coordinates" class="form-control" placeholder="39.975373,32.736466">
              <p class="help-block">Konum sayıları arasında virgülle yazılır. Örnek: 32.432453, 45.456324</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Kaydet</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </form>
    </div>
  </div>
</div>
<input type="hidden" id="customer_id" value="<?=$id?>">
