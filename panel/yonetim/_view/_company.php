<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title"><?=$lang['kayitlifirmalar']?></h4>
                <div class="panel-actions">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#company_add"> <?=$lang['yeniekle']?></button>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?=$lang['firmaadi']?></th>
                            <th><?=$lang['kayitlibayi']?></th>
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
                            <td><?php if ($res['online_at']!=0) { echo date("d/m/Y H:i", $res['online_at']); } else { echo "-"; } ?></td>
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
          <?=$pagi?>
        </div>
    </div>
</div>
<div class="modal fade" id="company_add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title">Firma Ekle</h4>
      </div>
      <form role="form" method="post">
      <input type="hidden" name="process" value="add">
      <div class="modal-body">
        <div class="form-group"><input placeholder="Firma Adı" class="form-control" name="name" type="text"></div>
        <div class="form-group"><input placeholder="Kullanıcı Adı" class="form-control" name="username" type="text"></div>
        <div class="form-group"><input placeholder="Şifre" class="form-control" name="password" type="text"></div>
        <div class="form-group"><input placeholder="Telefon" class="form-control" name="phone" type="text"></div>
        <div class="form-group"><input placeholder="E-Posta" class="form-control" name="email" type="text"></div>
        <div class="form-group"><input placeholder="Website" class="form-control" name="website" type="text"></div>
        <div class="form-group"><input placeholder="Vergi Dairesi" class="form-control" name="tax_office" type="text"></div>
        <div class="form-group"><input placeholder="Vergi No" class="form-control" name="tax_number" type="text"></div>
        <div class="form-group"><select name="country" class="form-control m-b">
          <option>Ülke Seç</option>
          <?php foreach($result_country as $result) { ?>
            <option value="<?=$result['code']?>"><?=$result['title']?></option>
          <?php } ?>
        </select></div>
        <div class="form-group"><select name="language" class="form-control m-b">
          <option>Dil Seç</option>
          <option value="tr">Türkçe</option><option value="en">English</option><option value="de">Deutsch</option>
        </select></div>
        <div class="form-group"><select name="status" class="form-control m-b">
          <option value="1">Aktif</option><option value="0">Pasif</option>
        </select></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-default">Ekle</button>
      </div>
    </form>
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
