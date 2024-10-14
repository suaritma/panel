<div class="col-md-12">
<ol class="breadcrumb">
    <li><a href="<?=DEALER_URL?>">Anasayfa</a></li>
    <li><a href="<?=DEALER_URL?>dealer.php">Firma</a></li>
    <li>Ödemeler</li>
</ol>
</div>

<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead>
    <tr class="text-center info">
      <td>Isim Soyisim</td>
      <td>ID</td>
      <td>Fiyat</td>
      <td>Taksit</td>
      <td>Durum</td>
      <td>Tarih</td>
      <td>İşlemler</td>
    </tr>
  </thead>
  <tfoot>
    <tr class="text-center info">
      <td>Isim Soyisim</td>
      <td>ID</td>
      <td>Fiyat</td>
      <td>Taksit</td>
      <td>Durum</td>
      <td>Tarih</td>
      <td>İşlemler</td>
    </tr>
  </tfoot>
  <tbody>
<?php if (!empty($result_payment_list)) {
    foreach($result_payment_list as $res) { ?>
    <tr class="text-center">
      <td><?=$res['fullname']?></td>
      <td><?=$res['transaction_id']?></td>
      <td><?=$res['amount_transfered']?>&nbsp;<?=$res['currency']?></td>
      <td><?=$res['installment']?></td>
      <td><?php if ($res['completed']==1) { ?><span class="text-success">Tamamlandı</span><?php } else { ?><span class="text-danger">Başarısız</span><?php } ?> <?php if ($res['refunded']==1) { ?><span class="text-warning">(İade Edildi)</span><?php } ?> (<?=$res['completed']?>)</td>
      <td><?=date("d/m/Y H:i:s", $res['created_at'])?></td>
      <td>
        <a href="<?=DEALER_URL?>_modal/get_payment_info.php?id=<?=$res['id']?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#payment_info" data-toggle="tooltip" data-placement="top" title="İncele" role="button" data-original-title="İncele">
          <span class="glyphicon glyphicon-search"></span>
        </a>
      </td>
    </tr>
<?php } } else { ?>
  <tr class="table-row border-bottom">
    <td colspan="7">
      <?=$lang['no_record']?>
    </td>
  </tr>
<?php } ?>
  </tbody>
</table>
</div>
</div>

<div class="modal fade" id="payment_info" tabindex="-1" role="dialog" aria-labelledby="get_payment_info">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>
