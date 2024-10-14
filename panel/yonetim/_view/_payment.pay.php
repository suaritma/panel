<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Ödeme Listesi</h4>
                <div class="panel-actions" style="right:0px">
                    <form method="post">
                        <div class="col-md-2"><input type="text" name="price_lowest" placeholder="Min. Tutar" class="form-control" /></div>
                        <div class="col-md-2"><input type="text" name="price_highest" placeholder="Max. Tutar" class="form-control" /></div>
                        <div class="col-md-2"><input type="date" name="date_lowest" class="form-control" /></div>
                        <div class="col-md-2"><input type="date" name="date_highest" class="form-control" /></div>
                        <div class="col-md-2"><select name="order" class="form-control">
                            <option value="">Farketmez</option>
                            <option value="value_desc">Büyükten Küçüğe Tutar</option>
                            <option value="value_asc">Küçükten Büyüğe Tutar</option>
                            <option value="date_desc">Büyükten Küçüğe Tarih</option>
                            <option value="date_asc">Küçükten Büyüğe Tarih</option>
                        </select></div>
                        <input type="submit" class="btn btn-default" value="Filtrele" />
                    </form>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bayi</th>
                            <th>İsim Soyisim</th>
                            <th>Ödeme Kodu</th>
                            <th>Ö. T. (Toplam)</th>
                            <th>Ö. T. (Aktarılan)</th>
                            <th>Ö. T. (Komisyon)</th>
                            <th>Taksit Sayısı</th>
                            <th>İşlem Tarihi</th>
                            <th>Durumu</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_payments)) {
                        foreach($result_payments as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/dealer','none','<?=$res['dealer_id']?>','0')"><?=$res['title']?></a></td>
                            <td><?=$res['fullname']?></td>
                            <td><?=$res['transaction_id']?></td>
                            <td><?=$res['amount']?></td>
                            <td><?=$res['amount_transfered']?></td>
                            <td><?=$res['amount_commission']?></td>
                            <td><?=$res['installment']?></td>
                            <td><?=date("d/m/Y", $res['created_at'])?></td>
                            <td><?php if ($res['completed']==1) { ?><span class="text-success">Tamamlandı</span><?php } else { ?><span class="text-danger">Hata Oluştu!</span><?php } ?><?php if ($res['refunded']==1) { ?><span class="text-warning">(İade Edildi)</span><?php } ?></td>
                            <td>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_payment_info.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#payment_info" data-placement="top" title="İncele" data-original-title="İncele">
                                  <span class="ti-search"></span>
                                </a>
                              </div>
                            </td>
                        </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="10">
                          <?=$lang['no_record']?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
            <?=$pagi?>
        </div>
    </div>
</div>
<div class="modal fade" id="payment_info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
