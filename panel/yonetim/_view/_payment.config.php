<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30">
            <div class="panel-heading">
                <h4 class="panel-title"> Ödeme Ayarları</h4>
            </div>
            <div class="panel-body">
                <form role="form" method="POST">
                  <input type="hidden" name="process" value="update" />
                    <div class="form-group">
                      <label>Minimum Tutar</label>
                      <input placeholder="<?=$payments_config['min']?>" name="min" class="form-control" type="number" value="<?=$payments_config['min']?>">
                    </div>
                    <div class="form-group">
                      <label>Maksimum Tutar</label>
                      <input placeholder="<?=$payments_config['max']?>" name="max" class="form-control" type="number" value="<?=$payments_config['max']?>">
                    </div>
                    <div class="form-group">
                      <label>Ödeme Sayfası Bakım Modu</label>
                      <div>
                        <label> <input <?php if ($payments_config['maintenance']==1) { ?> checked="" <?php } ?> value="1" name="maintenance" type="radio"> Aktif </label>
                        <label> <input <?php if ($payments_config['maintenance']==0) { ?> checked="" <?php } ?> value="0" name="maintenance" type="radio"> Pasif </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Varsayılan Ödeme Yolu</label>
                      <select class="form-control m-b" name="method1">
                        <?php if (!empty($result_bank)) { foreach($result_bank as $res) { ?>
                          <option value="<?=$res['id']?>"<?php if ($payments_config['method1']==$res['id']) { ?> selected<?php } ?>><?=$res['name']?></option>
                        <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tek Çekim Ödeme Yolu</label>
                      <select class="form-control m-b" name="method2">
                        <option value="0">Otomatik</option>
                        <?php if (!empty($result_bank)) { foreach($result_bank as $res) { ?>
                          <option value="<?=$res['id']?>"<?php if ($payments_config['method2']==$res['id']) { ?> selected<?php } ?>><?=$res['name']?></option>
                        <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Başarılı Ödeme Bildirim Maili</label>
                      <input placeholder="<?=$payments_config['email']?>" name="email" class="form-control" type="text" value="<?=$payments_config['email']?>">
                    </div>
                    <div class="form-group">
                      <label>Başarılı Ödeme Bildirim Numarası</label>
                      <input placeholder="<?=$payments_config['phone']?>" name="phone" class="form-control" type="text" value="<?=$payments_config['phone']?>">
                    </div>
                    <div>
                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                          <strong>Kaydet</strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
