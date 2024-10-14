<div class="row margin-b-30">
    <div class="col-md-12">
      <div class="alert alert-default">
        <strong>Ödeme Değişkenleri</strong>
        <hr />
        <div class="row">
          <div class="col-md-6">
            <p>$taksit (Taksit Sayısı)</p>
            <p>$amount (Karttan Çekilecek Tutar)</p>
            <p>$amount_transfered (Hesaba Geçirilecek Tutar)</p>
            <p>$amount_comission (Komisyon Bedeli)</p>
            <p>$fullname (Kart Sahibi İsim Soyisim)</p>
            <p>$card_code (16 Haneli Kart Numarası)</p>
            <p>$month (Son Kullanma Ay)</p>
            <p>$year (Son Kullanma Yıl)</p>
            <p>$cvc (Güvenlik Kodu)</p>
          </div>
          <div class="col-md-6">
            <p>$payment_type (Ödeme Tipi 1: Karttan Çekilecek Tutar, 2: Hesaba Geçecek Tutar)</p>
            <p>$confirmation (Sözleşme Onayı '1' ise Onaylı)</p>
            <p>$email (E-Posta Hesabı)</p>
            <p>$phone (Telefon Numarası)</p>
            <p>$note (Ek Notlar)</p>
            <p>$cust_ok_url (Başarılı Dönüş URLsi)</p>
            <p>$cust_not_url (Başarısız Dönüş Urlsi)</p>
            <p>ip() (Ödeme İşlemini Yapanın IP adresi)</p>
            <p>$time (Anlık Timestamp Tarih Değeri)</p>
          </div>
        </div>
        <hr />
      </div>
        <div class="tabs-container">
            <ul class="nav nav-tabs">
              <?php if (!empty($result_bank)) { $z=0;
                    foreach($result_bank as $res) { ?>
                <li<?php if ($z==0) { ?> class="active"<?php } ?>><a data-toggle="tab" href="#tab-<?=$res['id']?>"<?php if ($z==0) { ?> aria-expanded="true"<?php } else { ?> aria-expanded="false"<?php } ?>><?=$res['name']?></a></li>
              <?php $z++; } } ?>
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#newAdd">+</a></li>
            </ul>
            <div class="tab-content">
              <?php if (!empty($result_bank)) { $x=0;
                    foreach($result_bank as $res) { ?>
                <div id="tab-<?=$res['id']?>" class="tab-pane<?php if ($x==0) { ?> active<?php } ?>">
                    <div class="panel-body">
                      <form role="form" method="POST">
                        <input type="hidden" name="process" value="update" />
                        <input type="hidden" name="id" value="<?=$res['id']?>" />
                          <div class="form-group">
                            <label>Banka Adı</label>
                            <input placeholder="<?=$res['name']?>" name="name" class="form-control" type="text" value="<?=$res['name']?>">
                          </div>
                          <div class="form-group">
                            <label>Kaynak Kodu</label>
                            <textarea name="source" class="form-control" rows="10"><?=$res['source']?></textarea>
                          </div>
                          <div class="form-group">
                            <label>Dönüş Kaynak Kodu (Başarılı)</label>
                            <textarea name="resultok" class="form-control" rows="10"><?=$res['resultok']?></textarea>
                          </div>
                          <div class="form-group">
                            <label>Dönüş Kaynak Kodu (Başarısız)</label>
                            <textarea name="resultnot" class="form-control" rows="10"><?=$res['resultnot']?></textarea>
                          </div>
                          <div class="form-group">
                            <label>iFrame Desteği</label>
                            <select class="form-control" name="iframe"><option value="1" <?php if ($res['iframe']==1) { ?>selected<?php } ?>>Kullan</option><option value="0" <?php if ($res['iframe']==0) { ?>selected<?php } ?>>Kullanma</option></select>
                          </div>
                          <div class="form-group">
                            <label>Durum</label>
                            <select class="form-control" name="status"><option value="1">Aktif</option><option value="0">Pasif</option></select>
                          </div>
                          <div>
                            <button class="btn btn-sm btn-danger pull-left m-t-n-xs" type="button" href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>payment/bank','delete','<?=$res['id']?>','1')">Kalıcı Olarak Sil</button>
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Kaydet</strong></button>
                          </div>
                      </form>
                    </div>
                </div>
              <?php $x++; } } ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newAdd" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title">Yeni Banka Ekle</h4>
      </div>
      <form role="form" method="post">
      <input type="hidden" name="process" value="add" />
      <div class="modal-body">
        <div class="form-group"><input placeholder="Banka Adı" class="form-control" name="name" type="text"></div>
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
