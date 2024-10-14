<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Silinmiş Bayiler</h4>
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
                          <th>Eklenme Tarihi</th>
                          <th>Silinme Tarihi</th>
                          <th>İşlemler</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($result_deleted)) {
                          foreach($result_deleted as $res) { ?>
                      <tr>
                          <td><?=$res['id']?></td>
                          <td><?=$res['dealer_code']?></td>
                          <td>
                            <a onclick="goto('<?=ADMIN_URL?>dealer/','company_id','<?=$res['id']?>')" href="javascript:void(0)">
                              <?=$res['title']?>
                            </a>
                          </td>
                          <td>
                            <a onclick="goto('<?=ADMIN_URL?>dealer/','company_id','<?=$res['id']?>')" href="javascript:void(0)">
                              <?=$res['company_name']?>
                            </a>
                          </td>
                          <td><?=$res['count']?></td>
                          <td><?=$res['username']?></td>
                          <td><?=$res['gsm']?></td>
                          <td><?=$res['email']?></td>
                          <td><?=$res['city']?></td>
                          <td><?=date("d/m/Y", $res['created_at'])?></td>
                          <td><?=date("d/m/Y", $res['deleted_at'])?></td>
                          <td>
                            <div class="icon-container">
                              <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>trash/dealer','reload','<?=$res['id']?>','0')"><span class="ti-reload"></span></a>
                            </div>
                            <div class="icon-container">
                              <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>trash/dealer','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
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
