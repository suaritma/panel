<div class="col-md-12 hidden-xs">
  <ul class="list-inline">
  <?php if ($_SESSION['p1']['padd']==1) { ?>
    <li>
      <a href="<?=DEALER_URL?>cihazserlist/add" type="button" class="btn btn-primary" role="button">
        <span><?=$lang['customer_add']?></span>&nbsp;
        <span class="glyphicon glyphicon-plus-sign"></span>
      </a>
    </li>
    <?php } ?>
    <li>
      <button id="toggle-filter" class="btn btn-default">
        <?=$lang['customer_fil']?>&nbsp;
        <i class="fa fa-filter"></i>
      </button>
    </li>
    <li>
        <form class="form-inline" role="form" method="post" action="<?=DEALER_URL?>cihazserlist/list">
            <input type="text" name="search" placeholder=" <?=$lang['nrm_search']?>" class="form-control" />
        </form>
    </li>
  </ul>
</div>

<!-- FILTER -->
<div class="col-md-12 cihazserlist-filter">
  <form class="form-inline" role="form" method="post" action="<?=DEALER_URL?>cihazserlist/list" name="customer-form">
    <input type="hidden" name="process" value="filter">
    <div class="form-group">
      <select name="cities" id="filter-cities" class="form-control cihazserlist-form-filter"></select>
    </div>
    <div class="form-group">
      <select name="towns" id="filter-towns" class="form-control cihazserlist-form-filter" disabled></select>
    </div>
    <div class="form-group">
      <select id="option-droup-demo" name="streets[]" class="form-control" multiple="multiple" style="display:none;"></select>
    </div>

    <div class="form-group">
      <input type="date" name="after" id="after" class="form-control">
    </div>

    <div class="form-group">
      <label class="control-label" for="before"><b>Arası</b></label>
      <input type="date" name="before" id="before" class="form-control">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary hidden-xs" data-toggle="tooltip" data-placement="top" title="<?=$lang['customer_filt']?>">
                <?=$lang['customer_filt']?>&nbsp;
                <i class="fa fa-filter"></i>
            </button>
      <button type="submit" class="btn btn-primary btn-block visible-xs">
                <span><?=$lang['customer_filt']?></span>&nbsp;
                <i class="fa fa-filter"></i>
            </button>
    </div>
  </form>
</div>

<!-- VISIBLE ON A PHONE -->
<ul class="list-group visible-xs">
  <?php if ($_SESSION['p1']['padd']==1) { ?>
  <li class="list-group-item">
    <a href="<?=DEALER_URL?>cihazserlist/add" class="btn btn-primary btn-block" role="button">
            <span><?=$lang['customer_add']?></span>&nbsp;
            <span class="glyphicon glyphicon-plus-sign"></span>
        </a>
  </li>
  <?php } ?>
  <li class="list-group-item">
    <button id="toggle-filter" class="btn btn-default btn-block">
            <?=$lang['customer_fil']?>&nbsp;
            <i class="fa fa-filter"></i>
        </button>
  </li>
  <li class="list-group-item">
        <form class="form-inline" role="form" method="post" action="<?=DEALER_URL?>cihazserlist/list">
            <input type="text" name="search" placeholder="Ara" class="form-control" />
        </form>
  </li>
</ul>

<div class="col-md-12">
</div>
<div class="col-md-12">
</div>

<div class="col-md-12">
  <table class="table table-bordered dataTable">
    <thead>
      <tr class="info">
        <th class="text-center">#</th>
        <th class="text-center" onclick="sortId.value='firstname';cityFormId.submit()"><?=$lang['fullname']?></th>
        <th class="text-center" onclick="sortId.value='gsm';cityFormId.submit()"><?=$lang['gsm2']?></th>
        <th class="text-center" onclick="sortId.value='city';cityFormId.submit()"><form id="cityFormId" name="cityForm" action="list" method="post" >
          
        <input type="text" id="sortId" hidden=true name="sort1" value="city" />
        <?=$lang['city2']?> <form></th>
        <th class="text-center" onclick="sortId.value='last_service';cityFormId.submit()"><?=$lang['last_service']?></th>
        <th class="text-center" onclick="sortId.value='next_service';cityFormId.submit()"><?=$lang['next_service']?></th>
        <th class="text-center" onclick="sortId.value='last_action';cityFormId.submit()"><?=$lang['last_action']?></th>
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
  <?php if (!empty($result_list)) { ?>
    <?=$pagi?>

    <?php }  ?>
       
 
</div>