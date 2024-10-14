<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Silinmiş Cihaz Kategorileri</h4>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Başlık</th>
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
                          <td>
                            <a onclick="goto('<?=ADMIN_URL?>customers/view','<?=$res['id']?>')" href="javascript:void(0)">
                              <?=$res['title']?>
                            </a>
                          </td>
                          <td><?=date("d/m/Y H:i:s", $res['created_at'])?></td>
                          <td><?=date("d/m/Y H:i:s", $res['deleted_at'])?></td>
                          <td>
                            <div class="icon-container">
                              <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>trash/category','reload','<?=$res['id']?>','0')"><span class="ti-reload"></span></a>
                            </div>
                            <div class="icon-container">
                              <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>trash/category','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                            </div>
                          </td>
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
          <?=$pagi?>
        </div>
    </div>
</div>
