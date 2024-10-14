<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30">
          <div class="panel-heading">
            <h4 class="panel-title"> Bildirim Servis Ayarları</h4>
            </div>
            <div class="panel-body">
              <form role="form" method="POST">
                <input type="hidden" name="process" value="update" />
                <div class="form-group">
                  <label>API KEY</label>
                  <input placeholder="Api Anahtarı" class="form-control" name="apikey" type="text" value="<?=$getkey?>">
                </div>
                <div class="form-group">
                  <label>API URL</label>
                  <input placeholder="Api Adresi" class="form-control" name="apiuri" type="text" value="<?=$geturi?>">
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
