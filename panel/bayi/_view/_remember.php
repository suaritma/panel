<div class="col-md-12">
	<ol class="breadcrumb">
		<li><a href="<?=DEALER_URL?>"><?=$lang['homepage']?></a></li>
		<li><?=$lang['rememberpage']?></li>
	</ol>
</div>
<div class="col-md-12">
	<div class="col-md-12"></div>
</div>
<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
		<div class="panel-heading"><?=$lang['user_remember']?></div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST">
				<input type="hidden" name="process" value="remember" />
				<div class="col-md-12" style="margin-bottom: 15px;">
				    <button type="button" class="btn btn-primary col-md-6" id="epostagir_btn">E-Posta Gir</button>
				    <button type="button" class="btn btn-light col-md-6" id="gsmnogir_btn">GSM No Gir</button>
				</div>
				<div class="form-group" id="epostagir">
					<label for="email" class="col-md-5 control-label"><span><?=$lang['email']?></span></label>
					<div class="col-md-7">
						<input id="email" type="text" class="form-control" name="email" placeholder="<?=$lang['email']?>">
					</div>
				</div>
				<div class="form-group" id="gsmnogir" style="display:none">
					<label for="gsm" class="col-md-5 control-label"><span><?=$lang['gsm']?></span></label>
					<div class="col-md-7">
						<input id="gsm" type="text" class="form-control" name="gsm" placeholder="<?=$lang['gsm']?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-4">
						<button type="submit" class="btn btn-primary btn-block"><?=$lang['remember']?></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
    
</script>
