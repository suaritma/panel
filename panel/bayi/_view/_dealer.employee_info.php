<div class="row">
<div class="col-md-6">
  <ul class="list-group">
    <li class="list-group-item">
      <p><?=$lang['username']?>: <b><?=$res['username']?></b></p>
    </li>
    <li class="list-group-item">
      <p><?=$lang['fullname']?>: <b><?=$res['firstname']?> <?=$res['lastname']?></b></p>
    </li>
    <li class="list-group-item">
      <p><?=$lang['company_name']?>: <b><?=$res['company_name']?></b></p>
    </li>
    <li class="list-group-item">
      <p><?=$lang['gsm']?>: <b><?=$res['gsm']?></b></p>
    </li>
    <li class="list-group-item">
      <p><?=$lang['email']?>: <b><?=$res['email']?></b></p>
    </li>
    <li class="list-group-item">
      <p>
        <?=$lang['employee_missions']?>: <b>
            <span><span class="toTurk text-capitalize"><?=$mission['title']?></span></span>
          </b>
      </p>
    </li>
    <li class="list-group-item">
      <p><?=$lang['employee_address']?>: <b><?=$res['address']?></b></p>
    </li>
    <li class="list-group-item">
      <p><?=$lang['employee_online_at']?>: <b><?=date("d/m/Y H:i:s", $res['online_at'])?></b></p>
    </li>
    <li class="list-group-item">
      <p><?=$lang['employee_updated_at']?>: <b><?=date("d/m/Y H:i:s", $res['updated_at'])?></b></p>
    </li>
    <li class="list-group-item">
      <p><?=$lang['status']?>: <b><?=$lang[$i . '_s_' . $res['status']]?></b></p>
    </li>
    <li class="list-group-item">
      <p><a href="javascript:void(0)" onclick="goto('<?=DEALER_URL?>dealer/employee_info','toall','<?=$res['id']?>','0','0')" class="btn btn-success">Tüm Müşterilere Tanımla</a> &nbsp; <a href="javascript:void(0)" onclick="goto('<?=DEALER_URL?>dealer/employee_info','tonot','<?=$res['id']?>','0','0')" class="btn btn-danger">Tüm Tanımlamalarını Kaldır</a></p>
    </li>
  </ul>
</div>
<div class="col-md-6">
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="" style="background: #158cba; color: #fff;">
              <th class="text-center"><?=$lang['date']?></th>
              <th class="text-center"><?=$lang['user']?></th>
              <th class="text-center"><?=$lang['type']?></th>
              <th class="text-center"><?=$lang['star']?></th>
              <th class="text-center"><?=$lang['note']?></th>
            </tr>
        </thead>
        <tbody>
          <?php if (!empty($result_employee_jobs)) {
                foreach($result_employee_jobs as $res) { ?>
            <tr>
                <td class="text-center"><?=date("d/m/Y", $res['date'])?></td>
                <td class="text-center"><a onclick="goto('<?=DEALER_URL?>customers/view','none','<?=$res['customer_id']?>','0','0')" href="javascript:void(0)"><?=$res['firstname']?> <?=$res['lastname']?></a></td>
                <td class="text-center"><?=$res['name']?></td>
                <td class="text-center"><?=starfunc($res['stars'])?></td>
                <td class="text-center"><small><?=$res['note']?></small></td>
            </tr>
          <?php } } ?>
        </tbody>
    </table>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
  <table class="table table-bordered dataTable">
    <thead>
      <tr class="info">
        <th class="text-center">#</th>
        <th class="text-center"><?=$lang['fullname']?></th>
        <th class="text-center"><?=$lang['gsm2']?></th>
        <th class="text-center"><?=$lang['city2']?></th>
        <th class="text-center"><?=$lang['last_service']?></th>
        <th class="text-center"><?=$lang['next_service']?></th>
        <th class="text-center"><?=$lang['last_action']?></th>
        <th><?=$lang['actions']?></th>
      </tr>
    </thead>
    <tfoot>
      <tr class="info">
        <th class="text-center">#</th>
        <th class="text-center"><?=$lang['fullname']?></th>
        <th class="text-center"><?=$lang['gsm2']?></th>
        <th class="text-center"><?=$lang['city2']?></th>
        <th class="text-center"><?=$lang['last_service']?></th>
        <th class="text-center"><?=$lang['next_service']?></th>
        <th class="text-center"><?=$lang['last_action']?></th>
        <th><?=$lang['actions']?></th>
      </tr>
    </tfoot>
    <tbody>
      <?php if (!empty($result_list)) {
            foreach($result_list as $res) { ?>
      <tr class="table-row border-bottom">
        <td class="text-center">
          <?=$res['id']?>
        </td>
        <td class="text-center">
          <a onclick="goto('<?=DEALER_URL?>customers/view','none','<?=$res['id']?>','0','0')" href="javascript:void(0)">
            <?=$res['firstname']?>
              <?=$res['lastname']?>
          </a>
        </td>
        <td class="text-center">
          <p>
            <?=$res['gsm']?>
          </p>
        </td>
        <td class="text-center custcities" data-visible="false">
          <?=$res['city']?>
        </td>
        <td class="text-center" data-visible="false">
          <span id="lastService">
                        <?=prevservice($res['id'])?>
                    </span>
        </td>
        <td class="text-center getting-late-service ">
          <span id="nextService">
                        <?=nextservice($res['id'])?>
                    </span>
          <span id="gettingLateService" class="hidden late-service-value">

                    </span>
        </td>
        <td class="text-center">
          <?=lastservicetype($res['id'])?>
        </td>
        <td class="text-center" id="customers-button" data-visible="false">
          <a onclick="goto('<?=DEALER_URL?>customers/view','none','<?=$res['id']?>','0','0')" href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="İncele" role="button">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
          <a onclick="goto('<?=DEALER_URL?>customers/edit','none','<?=$res['id']?>','0','0')" href="javascript:void(0)" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Düzenle" role="button">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
        </td>
      </tr>
      <?php } } else { ?>
      <tr class="table-row border-bottom">
        <td colspan="8">
          <?=$lang['no_record']?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?=$pagi?>
</div>
</div>
