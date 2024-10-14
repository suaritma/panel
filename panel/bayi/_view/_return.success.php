<div class="row">
  <div class="col-md-6">
    <ul class="list-group">
        <li class="list-group-item">
            <p>Banka: <b><?php if (isset($return['bank_name'])) { echo "$return[bank_name]"; } ?></b></p>
        </li>
        <li class="list-group-item">
            <p>Kart: <b><?php if (isset($return['card_name'])) { echo "$return[card_name]"; } ?></b></p>
        </li>
        <li class="list-group-item">
            <p>İşlem No: <b><?php if (isset($return['transaction_id'])) { echo "$return[transaction_id]"; } ?></b></p>
        </li>
        <li class="list-group-item">
            <p>Para Birimi: <b><?php if (isset($return['currency'])) { echo "$return[currency]"; } ?></b></p>
        </li>
    </ul>
  </div>
  <div class="col-md-6">
    <ul class="list-group">
        <li class="list-group-item">
            <p>Ödenen Miktar: <b><?php if (isset($return['amount'])) { echo "$return[amount]"; } ?></b></p>
        </li>
        <li class="list-group-item">
            <p>Hesaba Geçen: <b><?php if (isset($return['amount_transfered'])) { echo "$return[amount_transfered]"; } ?></b></p>
        </li>
        <li class="list-group-item">
            <p>Komisyon Tutarı: <b><?php if (isset($return['amount_commission'])) { echo "$return[amount_commission]"; } ?></b></p>
        </li>
        <li class="list-group-item">
            <p>Taksit Sayısı: <b><?php if (isset($return['installment'])) { echo "$return[installment]"; } ?></b></p>
        </li>
    </ul>
  </div>
</div>
