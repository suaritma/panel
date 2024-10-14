<div class="col-md-12">
	<ol class="breadcrumb">
		<li><a href="<?=DEALER_URL?>"><?=$lang['homepage']?></a></li>
		<li><?=$lang['resetpage']?></li>
	</ol>
</div>
<div class="col-md-12">
	<div class="col-md-12"></div>
</div>
<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
		<div class="panel-heading"><?=$lang['user_reset']?></div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST">
				<input type="hidden" name="process" value="reset" />
				<input type="hidden" name="auth_key" value="<?=@$_GET['auth_key']?>" />
				<div class="form-group" id="epostagir">
					<label for="password" class="col-md-5 control-label"><span><?=$lang['password']?></span></label>
					<div class="col-md-7">
						<input type="password" class="form-control" name="password" placeholder="Yeni Şifreniz">
					</div>
				</div>
				<div class="form-group" id="gsmnogir">
					<label for="repassword" class="col-md-5 control-label"><span><?=$lang['repassword']?></span></label>
					<div class="col-md-7">
						<input type="password" class="form-control" name="repassword" placeholder="Yeni Şifreniz (Tekrar)">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-4">
						<button type="submit" class="btn btn-primary btn-block"><?=$lang['reset']?></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
