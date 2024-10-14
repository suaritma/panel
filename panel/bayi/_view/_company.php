<div class="col-md-12">
	<ol class="breadcrumb">
		<li><a href="<?=DEALER_URL?>">Ana Sayfa</a></li>
		<li>Bayi Seçici</li>
	</ol>
</div>
<div class="col-md-12">
	<div class="col-md-12"></div>
</div>
<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
		<div class="panel-heading"><?=$_SESSION['company_name']?></div>
		<div class="panel-body">
			<form class="form-horizontal" method="POST" action="<?=DEALER_URL?>_external_login.php">
				<input type="hidden" name="process" value="company_to_dealer" />
				<div class="form-group">
					<label for="password" class="col-md-12">Kullanmak İstediğiniz Bayi Hesabını Seçiniz:</label>
					<div class="col-md-12">
            <select name="process_id" class="form-control">
              <?php if (!empty($result_dealer)) {
                foreach ($result_dealer as $res) { ?>
                  <option value="<?=$res['id']?>"><?=$res['title']?></option>
                <?php } } else { ?>
                  <option>Tanımlı Bayi Bulunamadı!</option>
                <?php } ?>
            </select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Git</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
