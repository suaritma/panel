<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30">
          <div class="panel-heading">
            <h4 class="panel-title"> E-Posta Servis Ayarları</h4>
            </div>
            <div class="panel-body">
              <form role="form" method="POST">
                <input type="hidden" name="process" value="update" />
                <div class="form-group">
                  <label>Gönderen Adı</label>
                  <input placeholder="Gönderen Adı" class="form-control" name="sender_name" type="text" value="<?=$sender_name?>">
                </div>
                <div class="form-group">
                  <label>Gönderim Adresi</label>
                  <input placeholder="Gönderim Adresi" class="form-control" name="sender_address" type="text" value="<?=$sender_address?>">
                </div>
                <div class="form-group">
                  <label>Gönderim Adresi Şifresi</label>
                  <input placeholder="Gönderim Adresi Şifresi" class="form-control" name="sender_pass" type="text" value="<?=$sender_pass?>">
                </div>
                <div class="form-group">
                  <label>Sunucu Adresi</label>
                  <input placeholder="Sunucu Adresi" class="form-control" name="server_ip" type="text" value="<?=$server_ip?>">
                </div>
                <div class="form-group">
                  <label>Sunucu Portu</label>
                  <input placeholder="Sunucu Portu" class="form-control" name="server_port" type="text" value="<?=$server_port?>">
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
