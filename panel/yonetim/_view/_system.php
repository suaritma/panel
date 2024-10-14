<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30">
            <div class="panel-heading">
                <h4 class="panel-title"> Sistem Ayarları</h4>
            </div>
            <div class="panel-body">
                <form role="form" method="POST">
                  <input type="hidden" name="process" value="update" />
                    <div class="form-group">
                      <label>İçerik Listeleme Adedi</label>
                      <input placeholder="<?=$system['pagination']?>" name="pagination" class="form-control" type="number" value="<?=$system['pagination']?>">
                    </div>
                    <div class="form-group">
                      <label>Müşteri Kodu Başlangıcı</label>
                      <input placeholder="<?=$system['customer_code']?>" name="customer_code" class="form-control" type="number" value="<?=$system['customer_code']?>">
                    </div>
                    <div class="form-group">
                      <label>Bakım Modu</label>
                      <div>
                        <label> <input <?php if ($system['maintenance']==1) { ?> checked="" <?php } ?> value="1" name="maintenance" type="radio"> Aktif </label>
                        <label> <input <?php if ($system['maintenance']==0) { ?> checked="" <?php } ?> value="0" name="maintenance" type="radio"> Pasif </label>
                      </div>
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
