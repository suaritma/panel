<div class="col-md-12">
					<ol class="breadcrumb">
						<li><a href="<?=DEALER_URL?>"><?=$lang['homepage']?></a></li>
						<li><?=$lang['loginpage']?></li>
					</ol>
				</div>
				<div class="col-md-12">
					<div class="col-md-12"></div>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-primary">
						<div class="panel-heading"><?=$lang['user_login']?></div>
						<div class="panel-body">
							<form class="form-horizontal" role="form" method="POST">
								<input type="hidden" name="process" value="login" />
								<div class="form-group">
									<label for="username" class="col-md-4 control-label"><span><?=$lang['username']?></span></label>
									<div class="col-md-8">
										<input id="username" type="text" class="form-control" name="username" placeholder="<?=$lang['username']?>" autofocus required>
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-md-4 control-label"><?=$lang['password']?></label>
									<div class="col-md-8">
										<input id="password" type="password" class="form-control" name="password" placeholder="<?=$lang['password']?>" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-8 col-md-offset-4">
										<button type="submit" class="btn btn-primary btn-block"><?=$lang['login']?></button>
									</div>
								</div>
							</form>
							<span><a href="<?=DEALER_URL?>remember/">Şifremi Unuttum</a></span>
						</div>
					</div>
				</div>
