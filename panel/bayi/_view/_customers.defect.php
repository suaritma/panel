<div class="col-md-12">
</div>
<div class="col-md-12">
</div>

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
  		  <?php if ($_SESSION['p1']['pedit']==1) { ?>
          <a onclick="goto('<?=DEALER_URL?>customers/edit','none','<?=$res['id']?>','0','0')" href="javascript:void(0)" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Düzenle" role="button">
             <span class="glyphicon glyphicon-pencil"></span>
          </a>
          <?php } ?>
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
</div>
