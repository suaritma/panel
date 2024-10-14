<div class="row">
<div class="col-md-6">
    <ul class="list-group">
        <li class="list-group-item">
            <p><?=$lang['company_name']?>: <b><?=$company['name']?></b></p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['company_phone']?>: <b><?=$company['phone']?></b></p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['company_email']?>: <b><?=$company['email']?></b></p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['company_website']?>: <b><?=$company['website']?></b></p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['company_tax_office']?>: <b><?=$company['tax_office']?></b></p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['company_tax_number']?>: <b><?=$company['tax_number']?></b></p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['company_online_at']?>: <b id="lastOnline">
                <span class="last-online"><?=date('d/m/Y H:i:s', $company['online_at'])?></span>
            </b></p>
        </li>
    </ul>
</div>

<!-- SERVICE INFO -->
<div class="col-md-6">
    <ul class="list-group">
        <li class="list-group-item">
            <p><?=$lang['dealer_this_month_earn']?>:&nbsp;
                <b><?=$this_month_earn?>&nbsp;<?=$_SESSION['dealer_currency']?></b>
            </p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['dealer_last_month_earn']?>:&nbsp;
                <b><?=$last_month_earn?>&nbsp;<?=$_SESSION['dealer_currency']?></b>
            </p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['dealer_this_month_customer']?>:&nbsp;
                <b><?=$this_month_customer?></b>
            </p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['dealer_last_month_customer']?>:&nbsp;
                <b><?=$last_month_customer?></b>
            </p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['dealer_this_month_service']?>:&nbsp;
                <b><?=$this_month_service?></b>
            </p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['dealer_last_month_service']?>:&nbsp;
                <b><?=$last_month_service?></b>
            </p>
        </li>
        <li class="list-group-item">
            <p><?=$lang['dealer_this_month_not_service']?>:&nbsp;
                <b><?=$next_month_service?></b>
            </p>
        </li>
    </ul>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="" style="background: #158cba; color: #fff;">
                <th class="text-center">#</th>
                <th class="text-center"><?=$lang['user']?></th>
                <th class="text-center"><?=$lang['type']?></th>
                <th class="text-center"><?=$lang['message']?></th>
                <th class="text-center"><?=$lang['status']?></th>
                <th class="text-center"><?=$lang['date']?></th>
            </tr>
        </thead>
        <tbody>
          <?php if (!empty($result_message_list)) {
                foreach($result_message_list as $res) { ?>
            <tr>
                <td><?=$res['id']?></td>
                <td><a onclick="goto('<?=DEALER_URL?>customers/view','none','<?=$res['customer_id']?>','0','0')" href="javascript:void(0)"><?=$res['firstname']?> <?=$res['lastname']?></a></td>
                <td><?=$res['title']?></td>
                <td><small><?=$res['content']?></small></td>
                <td><?=$lang[$i . '_s_' . $res['status']]?></td>
                <td><?=date("d/m/Y H:i:s", $res['date'])?></td>
            </tr>
          <?php } } ?>
        </tbody>
    </table>
</div>
</div>
<div class="col-md-6">
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="" style="background: #158cba; color: #fff;">
                <th class="text-center">#</th>
                <th class="text-center"><?=$lang['user']?></th>
                <th class="text-center"><?=$lang['type']?></th>
                <th class="text-center"><?=$lang['email']?></th>
                <th class="text-center"><?=$lang['date']?></th>
            </tr>
        </thead>
        <tbody>
          <?php if (!empty($result_email_list)) {
                foreach($result_email_list as $res) { ?>
            <tr>
                <td><?=$res['id']?></td>
                <td><a onclick="goto('<?=DEALER_URL?>customers/view','none','<?=$res['customer_id']?>','0','0')" href="javascript:void(0)"><?=$res['firstname']?> <?=$res['lastname']?></a></td>
                <td><?=$res['title']?></td>
                <td><small><?=$res['content']?></small></td>
                <td><?=date("d/m/Y H:i:s", $res['date'])?></td>
            </tr>
          <?php } } ?>
        </tbody>
    </table>
</div>
</div>
</div>
