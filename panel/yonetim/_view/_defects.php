<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <div class="panel-heading">
                <h4 class="panel-title">Arıza Kayıtları</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bayi</th>
                            <th>Müşteri</th>
                            <th>Cihaz</th>
                            <th>Sorun</th>
                            <th>Çözüm</th>
                            <th>Eklenme</th>
                            <th>Güncellenme</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_defects)) {
                            foreach($result_defects as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/dealer','none','<?=$res['dealer_id']?>','0')"><?=$res['title']?></a></td>
                            <td><a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/customer','none','<?=$res['customer_id']?>','0')"><?=$res['firstname']?> <?=$res['lastname']?></a></td>
                            <td><?=$res['name']?></td>
                            <td><?=$res['problem_note']?></td>
                            <td><?=$res['solution_note']?></td>
                            <td><?=date("d/m/Y", $res['created_at'])?></td>
                            <td><?=date("d/m/Y", $res['updated_at'])?></td>
                            <td><?php if ($res['status']==1) { ?><span class="text-success">Çözüldü</span><?php } else { ?><span class="text-danger">Çözülmedi!</span><?php } ?></td>
                            <td>&nbsp;</td>
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
