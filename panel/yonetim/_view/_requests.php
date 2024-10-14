<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <div class="panel-heading">
                <h4 class="panel-title">Mesaj İstekleri</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bayi</th>
                            <th>Talep</th>
                            <th>Müşteri</th>
                            <th>Eklenme Tarihi</th>
                            <th>Mesaj</th>
                            <th>Durumu</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_requests)) {
                            foreach($result_requests as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['dealer_title']?></td>
                            <td><?php if ($res['email']==1) { ?><i class="fa fa-envelope"></i><?php } ?><?php if ($res['sms']==1) { ?><i class="fa fa-comment"></i><?php } ?><?php if ($res['notification']==1) { ?><i class="fa fa-bell"></i><?php } ?></td>
                            <td><?=$res['firstname']?> <?=$res['lastname']?></td>
                            <td><?=date("d/m/Y H:i", $res['created_at'])?></td>
                            <td><?=$res['content']?></td>
                            <td><?php if ($res['status']==1) { ?><span class="text-success">Onaylandı</span><?php if ($res['completed']==1) { ?><i class="fa fa-get-pocket text-success"></i><?php } ?><?php } elseif ($res['status']==2) { ?><span class="text-danger">Reddedildi</span><?php } else { ?><span class="text-warning">Beklemede</span><?php } ?></td>
                            <?php if ($res['status']==0) { ?>
                            <td>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>requests/','approve','<?=$res['id']?>','0')"><span class="ti-check-box"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>requests/','reject','<?=$res['id']?>','0')"><span class="ti-close"></span></a>
                              </div>
                            </td>
                            <?php }  else { ?>
                            <td>&nbsp;</td>
                            <?php } ?>
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
