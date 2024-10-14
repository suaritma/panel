<div class="col-md-6">
    <div class="panel panel-card margin-b-30">
        <div class="panel-heading">
            <h4 class="panel-title">Yeni Konum Ekleme</h4>
        </div>
        <div class="panel-body">
            <form method="post" class="form-horizontal">
            <input type="hidden" name="process" value="add" />
            <div class="form-group">
            	<label class="col-sm-2 control-label">İl</label>
				<div class="col-sm-10">
					<select id="city" class="form-control" name="city"></select>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                    <div class="input-group"><span class="input-group-addon"> <input type="checkbox" id="open_city"> </span> <input type="text" class="form-control" id="new_city" name="new_city" placeholder="Yeni İl" disabled></div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">İlçe</label>
				<div class="col-sm-10">
					<select id="town" class="form-control" name="town" disabled></select>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                    <div class="input-group"><span class="input-group-addon"> <input type="checkbox" id="open_town"> </span> <input type="text" class="form-control" id="new_town" name="new_town" placeholder="Yeni İlçe" disabled></div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">Semt</label>
				<div class="col-sm-10">
					<select id="district" class="form-control" name="district" disabled></select>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-10">
                    <div class="input-group"><span class="input-group-addon"> <input type="checkbox" id="open_district"> </span> <input type="text" class="form-control" id="new_district" name="new_district" placeholder="Yeni Semt" disabled></div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">Mahalle</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="street" placeholder="Yeni Mahalle"></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Kaydet</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-card margin-b-30">
        <div class="panel-heading">
            <h4 class="panel-title">Posta Kodu Güncelle</h4>
        </div>
        <div class="panel-body">
            <form method="post" class="form-horizontal">
            <input type="hidden" name="process" value="postalcode" />
            <div class="form-group">
            	<label class="col-sm-2 control-label">İl</label>
				<div class="col-sm-10">
					<select id="cityz" class="form-control" name="city"></select>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">İlçe</label>
				<div class="col-sm-10">
					<select id="townz" class="form-control" name="town" disabled></select>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">Semt</label>
				<div class="col-sm-10">
					<select id="districtz" class="form-control" name="district" disabled></select>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">Mahalle</label>
				<div class="col-sm-10">
					<select id="streetz" class="form-control" name="street" disabled></select>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
            	<label class="col-sm-2 control-label">Postakodu</label>
                <div class="col-sm-10"><input type="text" class="form-control" id="postalcodez" name="postalcode" placeholder="Yeni Postakodu" disabled></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Kaydet</button>
                </div>
            </div>
            </form>
            <div class="hr-line-dashed"></div>
            <form method="post" class="form-horizontal">
            <input type="hidden" name="process" value="update" />
            <div class="form-group">
            	<p>Konum bilgilerinde yapılan değişiklikler sisteme direk entegre edilmez! Entegrasyon işlemi için aşağıdaki "JSON KAYNAĞINI GÜNCELLE" butonuna basınız!</p>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">JSON KAYNAĞINI GÜNCELLE</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>