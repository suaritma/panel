<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `dealers`.`title` as `dealer`, `payments_bank`.`name` as `bank`, `payments_card`.`title` as `card`, `payments`.`transaction_id` as `transaction_id`, `payments`.`amount` as `amount`, `payments`.`amount_transfered` as `amount_transfered`, `payments`.`amount_commission` as `amount_commission`, `payments`.`currency` as `currency`, `payments`.`installment` as `installment`, `payments`.`fullname` as `fullname`, `payments`.`card_first_numbers` as `card_first_numbers`, `payments`.`card_last_numbers` as `card_last_numbers`, `payments`.`expire_month` as `expire_month`, `payments`.`expire_year` as `expire_year`, `payments`.`ip` as `ip`, `payments`.`completed` as `completed`, `payments`.`refunded` as `refunded`, `payments`.`created_at` as `created_at` FROM `payments` INNER JOIN `dealers` ON `payments`.`dealer_id` = `dealers`.`id` INNER JOIN `payments_bank` ON `payments`.`bank_id` = `payments_bank`.`id` INNER JOIN `payments_card` ON `payments`.`card_id` = `payments_card`.`id` WHERE `payments`.`id` = '$id' AND `payments`.`status` = '1'"));
  ?>
<div class="modal-header text-center">
  <h4 class="modal-title">Ödeme Detayları</h4>
</div>
<div class="modal-body">
  <div class="panel-body">
      <table class="table table-bordered">
          <tbody>
              <tr>
                  <td colspan="1">Bayi:</td>
                  <td colspan="3"><?=$res['dealer']?></td>
              </tr>
              <tr>
                  <td colspan="1">Banka - Kart:</td>
                  <td colspan="3"><?=$res['bank']?> - <?=$res['card']?></td>
              </tr>
              <tr>
                  <td colspan="1">Referans Kodu:</td>
                  <td colspan="3"><?=$res['transaction_id']?></td>
              </tr>
              <tr>
                  <td colspan="1">Tutar:</td>
                  <td colspan="3"><?=$res['amount']?></td>
              </tr>
              <tr>
                  <td>Aktarılan:</td>
                  <td><?=$res['amount_transfered']?></td>
                  <td>Komisyon:</td>
                  <td><?=$res['amount_commission']?></td>
              </tr>
              <tr>
                  <td>Taksit:</td>
                  <td><?=$res['installment']?></td>
                  <td>Para Birimi:</td>
                  <td><?=$res['currency']?></td>
              </tr>
              <tr>
                  <td colspan="1">İsim:</td>
                  <td colspan="3"><?=$res['fullname']?></td>
              </tr>
              <tr>
                  <td colspan="1">Kart:</td>
                  <td colspan="3"><?=$res['card_first_numbers']?> **** **** <?=$res['card_last_numbers']?></td>
              </tr>
              <tr>
                  <td>Ay:</td>
                  <td><?=$res['expire_month']?></td>
                  <td>Yıl:</td>
                  <td><?=$res['expire_year']?></td>
              </tr>
              <tr>
                  <td colspan="1">Ip:</td>
                  <td colspan="3"><?=$res['ip']?></td>
              </tr>
              <tr>
                  <td>Tamamlanma:</td>
                  <td><?php if ($res['completed']==1) { ?><span class="text-success">Tamamlandı.</span><?php } else { ?><span class="text-danger">Hata Oluştu!</span><?php } ?></td>
                  <td>İade:</td>
                  <td><?php if ($res['refunded']==1) { ?><span class="text-success">İade Edildi.</span><?php } else { ?>-<?php } ?></td>
              </tr>
              <tr>
                  <td colspan="1">Tarih:</td>
                  <td colspan="3"><?=date("d/m/Y H:i:s", $res['created_at'])?></td>
              </tr>
          </tbody>
      </table>
  </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
</div>
