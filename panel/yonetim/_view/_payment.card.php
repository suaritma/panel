<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
          <form method="post">
            <input type="hidden" name="process" value="edit" />
            <div class="panel-heading">
                <h4 class="panel-title"> Kartlar ve Taksitler</h4>
                <div class="panel-actions">
                  <button type="submit" class="btn btn-primary">Tümünü Kaydet</button>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newAdd">Yeni Ekle</button>
                </div>
            </div>
            <div class="panel-body">
              <table class="table table-condensed">
                <thead>
                  <tr>
                    <th>#</th>
                    <?php if (!empty($result_card)) { foreach($result_card as $res) { ?>
                      <th>
                        <?php if (!file_exists(UPLOAD_URL."cards/".$res['id'].".tmp")) { ?>
                          <img src="<?=UPLOAD_URL?>cards/<?=$res['id']?>.tmp" style="max-height:48px;max-width:100px" />
                        <?php } else { ?>
                          <?=$res['title']?>
                        <?php } ?>
                      </th>
                    <?php } } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($g=-1; $g<=12; $g++) { ?>
                    <tr>
                      <td><?php if ($g==0) { ?>SIRA<?php } elseif ($g==-1) { ?>BANKA<?php } else { ?><?=$g?><?php } ?></td>
                    <?php if (!empty($result_card)) { foreach($result_card as $res) { ?>
                    <?php if ($g==-1) { ?>
                      <td>
                        <select name="tz[<?=$res['id']?>_bankid]">
                          <?php if (!empty($result_bank)) { foreach($result_bank as $resb) { ?>
                            <option value="<?=$resb['id']?>" <?php if ($resb['id']==$res['bank_id']) { ?>selected<?php } ?>><?=$resb['name']?></option>
                          <?php } } ?>
                        </select>
                      </td>
                    <?php } elseif ($g==0) { ?>
                        <td><input type="text" name="tz[<?=$res['id']?>_position]" placeholder="0" style="width: 100px;" value="<?=$res['position']?>" /></td>
                      <?php } else { ?>
                        <td><input type="text" name="tz[<?=$res['id']?>_<?=$g?>]" placeholder="0.00" style="width: 100px;" value="<?=$res['i_'.$g]?>"<?php if ($res['i_'.$g]>=0) { ?> class="text-success"<?php } else { ?> class="text-danger"<?php } ?> /></td>
                      <?php } ?>
                    <?php } } ?>
                    </tr>
                  <?php } ?>
                    <tr>
                      <td>&nbsp;</td>
                    <?php if (!empty($result_card)) { foreach($result_card as $res) { ?>
                      <td>
                        <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>payment/card','delete','<?=$res['id']?>','1')" class="btn btn-danger">Sil</a>
                        <a href="<?=ADMIN_URL?>_modal/_get_card_image.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#image_replace" data-placement="top" title="Resim Düzenle" data-original-title="Resim Düzenle" class="btn btn-warning">Resim</a>
                      </td>
                    <?php } } ?>
                    </tr>
                </tbody>
              </table>
            </div>
          </form>
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newAdd" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title">Yeni Kart Ekle</h4>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
      <input type="hidden" name="process" value="add" />
      <div class="modal-body">
        <div class="form-group"><select class="form-control m-b" name="bank_id">
          <?php if (!empty($result_bank)) { foreach($result_bank as $res) { ?>
            <option value="<?=$res['id']?>"><?=$res['name']?></option>
          <?php } } ?>
        </select></div>
        <div class="form-group"><input placeholder="Kart Adı" class="form-control" name="title" type="text"></div>
        <div class="form-group"><input class="form-control" name="image" type="file"></div>
        <div class="form-group"><select class="form-control m-b" name="status"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-default">Ekle</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="image_replace" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
