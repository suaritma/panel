<?php if (isset($no_map)) { ?>
	<div class="col-md-12">
		<p>Harita bilgileriniz girilmemiş! Lütfen bizimle iletişime geçiniz...</p>
	</div>
<?php } else { ?>
	<iframe src="<?=DEALER_URL?>_modal/get_map_inside.php" style="width:100%;height:60vh" frameborder="0"></iframe>
<?php } ?>