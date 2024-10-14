<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30">
            <div class="panel-heading">
                <h4 class="panel-title">Şifre Değiştir</h4>
            </div>
            <div class="panel-body">
                <form role="form" method="POST">
                  <input type="hidden" name="process" value="change" />
                    <div class="form-group">
                      <label>Mevcut Şifre</label>
                      <input placeholder="Mevcut Şifre" name="password" class="form-control" type="password">
                    </div>
                    <div class="form-group">
                      <label>Yeni Şifre</label>
                      <input placeholder="Yeni Şifre" name="newpassword" class="form-control" type="password">
                    </div>
                    <div class="form-group">
                      <label>Yeni Şifre (Tekrar)</label>
                      <input placeholder="Yeni Şifre (Tekrar)" name="renewpassword" class="form-control" type="password">
                    </div>
                    <div>
                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                          <strong>Değiştir</strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
