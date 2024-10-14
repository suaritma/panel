<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <div class="panel-heading">
                <h4 class="panel-title">Giriş Logları</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tarih</th>
                            <th>IP</th>
                            <th>Açıklama</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_logs)) {
                            foreach($result_logs as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=date("d/m/Y H:i:s", $res['date'])?></td>
                            <td><a href="http://www.ipsorgu.com/?ip=<?=$res['ip']?>#sorgu" target="_blank"><?=$res['ip']?></a></td>
                            <td><?=$res['description']?></td>
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
