<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Kayıtlı Bayiler</h4>
                <div class="panel-actions">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#dealer_add"> Yeni Ekle</button>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <!--<th>Bayi Kodu</th>-->
                            <th>Bayi Adı</th>
                            <th>Kayıtlı Firma</th>
                            <th>Müşterileri</th>
                            <th>Kullanıcı Adı</th>
                            <th>Telefon</th>
                            <th>E-Posta</th>
                            <th>Şehir</th>
                            <th>Son Giriş</th>
                            <!--<th>Eklenme Tarihi</th>-->
                            <th><center>İşlemler</center></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_dealer)) {
                            foreach($result_dealer as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <!--<td><?=$res['dealer_code']?></td>-->
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
                            <td class="city"><?=$res['city']?></td>
                            <td><?php if ($res['online_at']!=0) { echo date("d/m/Y H:i", $res['online_at']); } else { echo "-"; } ?></td>
                            <!--<td><?=date("d/m/Y", $res['created_at'])?></td>-->
                            <td>
                              <div>
                                <a href="javascript:void(0);" onclick="goto('<?=DEALER_URL?>_external_login/','admin_to_dealer','<?=$res['id']?>','0')"><span class="	fa fa-share-square-o fa-2x"></span></a>
                              
                              
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/dealer','none','<?=$res['id']?>','0')"><span class="fa fa-search fa-2x"></span></a>
                              
                                <a href="<?=ADMIN_URL?>_modal/_get_dealer_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#dealer_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="fa fa-pencil-square-o fa-2x"></span></a>
                             
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>dealer/','delete','<?=$res['id']?>','1')"><span class="fa fa-trash-o fa-2x"></span></a>
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
          <?=$pagi?>
        </div>
    </div>
</div>
<div class="modal fade" id="dealer_add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title">Bayi Ekle</h4>
      </div>
      <form role="form" method="post">
        <input type="hidden" name="process" value="add">
      <div class="modal-body">
        <div class="form-group"><select name="company_id" class="form-control m-b"><option>Firma Seç</option><?php foreach($result_company as $result) { ?><option value="<?=$result['id']?>"><?=$result['name']?></option><?php } ?></select></div>
        <div class="form-group"><input name="dealer_code" placeholder="Bayi Kodu" class="form-control" type="text"></div>
        <div class="form-group"><input name="title" placeholder="Bayi Adı" class="form-control" type="text"></div>
        <div class="form-group"><input name="username" placeholder="Kullanıcı Adı" class="form-control" type="text"></div>
        <div class="form-group"><input name="password" placeholder="Şifre" class="form-control" type="text"></div>
        <div class="form-group"><input name="email" placeholder="E-Posta" class="form-control" type="text"></div>
        <div class="form-group"><input name="gsm" placeholder="Gsm" class="form-control" type="text"></div>
        <div class="form-group"><select name="city" id="city" class="form-control m-b"></select></div>
        <div class="form-group"><select name="town" id="town" class="form-control m-b" disabled></select></div>
        <div class="form-group"><select name="district" id="district" class="form-control m-b" disabled></select></div>
        <div class="form-group"><select name="street" id="street" class="form-control m-b" disabled></select></div>
        <div class="form-group"><textarea name="address" placeholder="Adres" class="form-control" type="text"></textarea></div>
        <div class="form-group"><select name="currency" class="form-control m-b"><option>Para Birimi Seç</option><option value="TRY">TRY</option><option value="USD">USD</option><option value="EUR">EUR</option></select></div>
        <div class="form-group"><select name="language" class="form-control m-b"><option>Dil Seç</option><option value="tr">Türkçe</option><option value="en">English</option><option value="de">Deutsch</option></select></div>
        <div class="form-group"><select name="status" class="form-control m-b"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
        <div class="form-group"><label> <input type="checkbox" name="welcome" value="1"><i></i> Hoşgeldin Mesajı Gönder </label></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-default">Ekle</button>
      </div>
    </form>
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
