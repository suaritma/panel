<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30">
          <div class="panel-heading">
            <h4 class="panel-title"> SMS Servis Ayarları</h4>
            </div>
            <div class="panel-body">
              <form role="form" method="POST">
                <input type="hidden" name="process" value="update" />
                <div class="form-group">
                  <label>Gönderim Adresi</label>
                  <input placeholder="Gönderim Adresi" class="form-control" name="url" type="text" value="<?=$url?>">
                </div>
                <div class="form-group">
                  <label>Mesaj Başlığı</label>
                  <input placeholder="Mesaj Başlığı" class="form-control" name="title" type="text" value="<?=$title?>">
                </div>
                <div class="form-group">
                  <label>Kullanıcı Adı</label>
                  <input placeholder="Kullanıcı Adı" class="form-control" name="username" type="text" value="<?=$username?>">
                </div>
                <div class="form-group">
                  <label>Şifre</label>
                  <input placeholder="Şifre" class="form-control" name="password" type="text" value="<?=$password?>">
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
