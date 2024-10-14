<!-- BUTTONS -->
<div class="col-md-12 hidden-xs">
  <ul class="list-inline">
    <li>
      <a href="javascript:void()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#employee_add">
                <span><?=$lang['employee_add']?></span>&nbsp;
                <span class="glyphicon glyphicon-plus-sign"></span>
            </a>
    </li>
  </ul>
</div>
<div class="col-md-12 visible-xs btn-over-table">
  <a href="javascript:void()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#employee_add">
        <span><?=$lang['employee_add']?></span>&nbsp;
        <span class="glyphicon glyphicon-plus-sign"></span>
    </a>
</div>

<div class="col-md-12 hidden-xs">
  <table class="table table-responsive table-bordered table-hover sortableTable">
    <thead class="hidden-xs">
      <tr class="info">
        <th class="">#</th>
        <th class="">
          <?=$lang['fullname']?>
        </th>
        <th class="">
          <?=$lang['email']?>
        </th>
        <th class="">
          <?=$lang['gsm']?>
        </th>
        <th class="hidden-xs">
          <?=$lang['record_date']?>
        </th>
        <th class="">
          <?=$lang['last_login']?>
        </th>
        <th class="">
          <?=$lang['status']?>
        </th>
        <th class="">
          <?=$lang['actions']?>
        </th>
      </tr>
    </thead>
    <tfoot class="hidden-xs">
      <tr class="info">
        <th class="">#</th>
        <th class="">
          <?=$lang['fullname']?>
        </th>
        <th class="">
          <?=$lang['email']?>
        </th>
        <th class="">
          <?=$lang['gsm']?>
        </th>
        <th class="hidden-xs">
          <?=$lang['record_date']?>
        </th>
        <th class="">
          <?=$lang['last_login']?>
        </th>
        <th class="">
          <?=$lang['status']?>
        </th>
        <th class="">
          <?=$lang['actions']?>
        </th>
      </tr>
    </tfoot>

    <tbody>
      <?php if (!empty($result_employee_list)) {
    foreach ($result_employee_list as $res) {
        ?>
      <tr class="">
        <td class="text-center hidden-xs">
          <?=$res['id']?>
        </td>
        <td class="text-center">
          <a onclick="goto('<?=DEALER_URL?>dealer/employee_info','none','<?=$res['id']?>','0')" href="javascript:void(0)">
            <?=$res['firstname']?>
              <?=$res['lastname']?>
          </a>
        </td>
        <td class="text-center hidden-xs">
          <?=$res['email']?>
        </td>
        <td class="text-center hidden-xs">
          <?=$res['gsm']?>
        </td>
        <td class="text-center hidden-xs">
          <?=date("d/m/Y H:i:s", $res['created_at'])?>
        </td>
        <td class="text-center hidden-xs last-online">
          <?=date("d/m/Y H:i:s", $res['online_at'])?>
        </td>
        <td class="text-center hidden-xs">
          <?=$lang[$i . '_s_' . $res['status']]?>
        </td>
        <td class="text-center table-buttons">
          <?php if (!isset($_SESSION['employee_id'])) { ?>
          <a onclick="goto('<?=DEALER_URL?>_external_login/','dealer_to_employee','0','<?=$res['id']?>')" href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" data-placement="top" role="button">
          	<span class="glyphicon glyphicon-share"></span>
          </a>
          <?php } ?>
          <a onclick="goto('<?=DEALER_URL?>dealer/employee_info','none','<?=$res['id']?>','0')" href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="<?=$lang['scan']?>" role="button">
            <span class="glyphicon glyphicon-search"></span>
          </a>
          <a href="<?=DEALER_URL?>_modal/get_employee_edit.php?id=<?=$res['id']?>" type="button" class="btn btn-warning" data-toggle="modal" data-target="#employee_edit" title="<?=$lang['edit']?>">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>
        </td>
      </tr>
      <?php
    }
} else {
    ?>
        <tr>
          <td colspan="8">
            <?=$lang['no_record']?>
          </td>
        </tr>
        <?php
} ?>
    </tbody>
  </table>
</div>

<table class="table table-responsive table-bordered table-hover col-md-12 visible-xs">
  <thead class="hidden-xs">
    <tr class="info">
      <th class="">#</th>
      <th class="">
        <?=$lang['fullname']?>
      </th>
      <th class="">
        <?=$lang['email']?>
      </th>
      <th class="">
        <?=$lang['gsm']?>
      </th>
      <th class="hidden-xs">
        <?=$lang['record_date']?>
      </th>
      <th class="">
        <?=$lang['last_login']?>
      </th>
      <th class="">
        <?=$lang['status']?>
      </th>
      <th class="">
        <?=$lang['actions']?>
      </th>
    </tr>
  </thead>
  <tfoot class="hidden-xs">
    <tr class="info">
      <th class="">#</th>
      <th class="">
        <?=$lang['fullname']?>
      </th>
      <th class="">
        <?=$lang['email']?>
      </th>
      <th class="">
        <?=$lang['gsm']?>
      </th>
      <th class="hidden-xs">
        <?=$lang['record_date']?>
      </th>
      <th class="">
        <?=$lang['last_login']?>
      </th>
      <th class="">
        <?=$lang['status']?>
      </th>
      <th class="">
        <?=$lang['actions']?>
      </th>
    </tr>
  </tfoot>

  <tbody>
    <?php if (!empty($result_employee_list)) {
        foreach ($result_employee_list as $res) {
            ?>
    <tr class="">
      <td class="text-center hidden-xs">
        <?=$res['id']?>
      </td>
      <td class="text-center">
        <a onclick="goto('<?=DEALER_URL?>dealer/employee_info','none','<?=$res['id']?>','0')" href="javascript:void(0)">
          <?=$res['firstname']?>
            <?=$res['lastname']?>
        </a>
      </td>
      <td class="text-center hidden-xs">
        <?=$res['email']?>
      </td>
      <td class="text-center hidden-xs">
        <?=$res['gsm']?>
      </td>
      <td class="text-center hidden-xs">
        <?=date("d/m/Y H:i:s", $res['created_at'])?>
      </td>
      <td class="text-center hidden-xs last-online">
        <?=date("d/m/Y H:i:s", $res['online_at'])?>
      </td>
      <td class="text-center hidden-xs">
        <?=$lang[$i . '_s_' . $res['status']]?>
      </td>
      <td class="text-center table-buttons">
        <a onclick="goto('<?=DEALER_URL?>dealer/employee_info','none','<?=$res['id']?>','0')" href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="<?=$lang['scan']?>" role="button">
          <span class="glyphicon glyphicon-search"></span>
        </a>
        <a href="<?=DEALER_URL?>_modal/get_employee_edit.php?id=<?=$res['id']?>" type="button" class="btn btn-warning" data-toggle="modal" data-target="#employee_edit" title="<?=$lang['edit']?>">
          <span class="glyphicon glyphicon-pencil"></span>
        </a>
      </td>
    </tr>
    <?php
        }
    } else {
        ?>
      <tr>
        <td colspan="8">
          <?=$lang['no_record']?>
        </td>
      </tr>
      <?php
    } ?>
  </tbody>
</table>

<div class="modal fade" id="employee_add" tabindex="-1" role="dialog" aria-labelledby="get_employee_add">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
        	<span aria-hidden="true">&times;</span>
      	</button>
        <h4 class="modal-title text-center text-uppercase" id="get_employee_add">
          <b>Eleman Ekle</b>
      	</h4>
      </div>
      <form class="form-horizontal" method="post" role="form">
        <div class="modal-body">
          <input type="hidden" name="process" value="employee">
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="text" name="password" class="form-control" placeholder="Şifre">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="text" name="repassword" class="form-control" placeholder="Şifre (Tekrar)">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="text" name="firstname" class="form-control" placeholder="İsim">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="text" name="lastname" class="form-control" placeholder="Soyisim">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="text" name="email" class="form-control" placeholder="E-Posta">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <input type="text" name="gsm" class="form-control" placeholder="GSM">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <textarea type="text" name="address" class="form-control">Adres...</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <select name="permission" class="form-control">
              	<?php foreach ($result_permission as $permission) { ?>
              		<option value="<?=$permission['id']?>"><?=$permission['title']?></option>
              	<?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <select name="auto_access" class="form-control">
              	<option value="0" selected>Otomatik Sorumlu Yapma</option>
              	<option value="1">Otomatik Sorumlu Yap</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Ekle</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="employee_edit" tabindex="-1" role="dialog" aria-labelledby="get_employee_edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>
