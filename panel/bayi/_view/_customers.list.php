<div class="col-md-12 hidden-xs">
  <ul class="list-inline">
  <?php if ($_SESSION['p1']['padd']==1) { ?>
    <li>
      <a href="<?=DEALER_URL?>customers/add" type="button" class="btn btn-primary" role="button">
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
        <form class="form-inline" role="form" method="post" action="<?=DEALER_URL?>customers/list">
            <input type="text" name="search" placeholder=" <?=$lang['nrm_search']?>" class="form-control" />
        </form>
    </li>
  </ul>
</div>

<!-- FILTER -->
<div class="col-md-12 customers-filter">
  <form class="form-inline" role="form" method="post" action="<?=DEALER_URL?>customers/list" name="customer-form">
    <input type="hidden" name="process" value="filter">
    <div class="form-group">
      <select name="cities"  class="form-control customers-form-filter">
<option value="1">Adana</option>
<option value="2">Adıyaman</option>
<option value="3">Afyonkarahisar</option>
<option value="4">Ağrı</option>
<option value="5">Amasya</option>
<option value="6">Ankara</option>
<option value="7">Antalya</option>
<option value="8">Artvin</option>
<option value="9">Aydın</option>
<option value="10">Balıkesir</option>
<option value="11">Bilecik</option>
<option value="12">Bingöl</option>
<option value="13">Bitlis</option>
<option value="14">Bolu</option>
<option value="15">Burdur</option>
<option value="16">Bursa</option>
<option value="17">Çanakkale</option>
<option value="18">Çankırı</option>
<option value="19">Çorum</option>
<option value="20">Denizli</option>
<option value="21">Diyarbakır</option>
<option value="22">Edirne</option>
<option value="23">Elazığ</option>
<option value="24">Erzincan</option>
<option value="25">Erzurum</option>
<option value="26">Eskişehir</option>
<option value="27">Gaziantep</option>
<option value="28">Giresun</option>
<option value="29">Gümüşhane</option>
<option value="30">Hakkari</option>
<option value="31">Hatay</option>
<option value="32">Isparta</option>
<option value="33">İçel</option>
<option value="34">İstanbul</option>
<option value="35">İzmir</option>
<option value="36">Kars</option>
<option value="37">Kastamonu</option>
<option value="38">Kayseri</option>
<option value="39">Kırklareli</option>
<option value="40">Kırşehir</option>
<option value="41">Kocaeli</option>
<option value="42">Konya</option>
<option value="43">Kütahya</option>
<option value="44">Malatya</option>
<option value="45">Manisa</option>
<option value="46">Kahramanmaraş</option>
<option value="47">Mardin</option>
<option value="48">Muğla</option>
<option value="49">Muş</option>
<option value="50">Nevşehir</option>
<option value="51">Niğde</option>
<option value="52">Ordu</option>
<option value="53">Rize</option>
<option value="54">Sakarya</option>
<option value="55">Samsun</option>
<option value="56">Siirt</option>
<option value="57">Sinop</option>
<option value="58">Sivas</option>
<option value="59">Tekirdağ</option>
<option value="60">Tokat</option>
<option value="61">Trabzon</option>
<option value="62">Tunceli</option>
<option value="63">Şanlıurfa</option>
<option value="64">Uşak</option>
<option value="65">Van</option>
<option value="66">Yozgat</option>
<option value="67">Zonguldak</option>
<option value="68">Aksaray</option>
<option value="69">Bayburt</option>
<option value="70">Karaman</option>
<option value="71">Kırıkkale</option>
<option value="72">Batman</option>
<option value="73">Şırnak</option>
<option value="74">Bartın</option>
<option value="75">Ardahan</option>
<option value="76">Iğdır</option>
<option value="77">Yalova</option>
<option value="78">Karabük</option>
<option value="79">Kilis</option>
<option value="80">Osmaniye</option>
<option value="81">Düzce</option>

      </select>
    </div>
    <div class="form-group">
      <select name="towns" id="filter-towns" class="form-control customers-form-filter" disabled style="display:none;"></select>
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
    <a href="<?=DEALER_URL?>customers/add" class="btn btn-primary btn-block" role="button">
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
        <form class="form-inline" role="form" method="post" action="<?=DEALER_URL?>customers/list">
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
