<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Eleman Yetkileri</h4>
                <div class="panel-actions">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#permission_add"> Yeni Ekle</button>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Yetki Tanımı</th>
                            <th>Yetki Kodu</th>
                            <th>Eklenme Tarihi</th>
                            <th>Güncellenme Tarihi</th>
                            <th>Durumu</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_permission)) {
                            foreach($result_permission as $res) { 
                            $role=mysqli_query($con, "SELECT * FROM `permissions_role` WHERE `permission_id` = '$res[id]'");
                            while($row=@mysqli_fetch_assoc($role)) {
                            	$result_role[] = $row;
                            }
                            ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['title']?></td>
                            <td><?php foreach($result_role as $rol) { echo $rol['type'].$rol['pview'].$rol['padd'].$rol['pedit'].$rol['pdel']; if ($rol['type']!=9) { echo ","; } } ?></td>
                            <td><?=date("d/m/Y", $res['created_at'])?></td>
                            <td><?php if ($res['updated_at']!=0) { echo date("d/m/Y H:i", $res['updated_at']); } else { echo "-"; } ?></td>
                            <td><?php if ($res['status']==1) { ?><span class="text-success">Aktif</span><?php } else { ?><span class="text-warning">Pasif</span><?php } ?></td>
                            <td>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_permission_info.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#permission_info" data-placement="top" title="İncele" data-original-title="İncele"><span class="ti-search"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_permission_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#permission_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>permission/','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                              </div>
                            </td>
                        </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="12">
                          <?=$lang['no_record']?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="permission_add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title">Yetki Ekle</h4>
      </div>
      <form role="form" method="post">
        <input type="hidden" name="process" value="add">
      <div class="modal-body">
        <div class="form-group"><label>Tanım</label><input name="title" placeholder="Yetki Tanımı" class="form-control" type="text"></div>
        <div class="form-group"><label>Müşteriler: </label>
        	<input type="checkbox" name="1_pview" value="1" /> Gör
        	<input type="checkbox" name="1_padd" value="1" /> Ekle
        	<input type="checkbox" name="1_pedit" value="1" /> Düzenle
        	<input type="checkbox" name="1_pdel" value="1" /> Sil
        </div>
        <div class="form-group"><label>Taksitler: </label>
        	<input type="checkbox" name="2_pview" value="1" /> Gör
        	<input type="checkbox" name="2_padd" value="1" /> Ekle
        	<input type="checkbox" name="2_pedit" value="1" /> Düzenle
        	<input type="checkbox" name="2_pdel" value="1" /> Sil
        </div>
        <div class="form-group"><label>Cihazlar: </label>
        	<input type="checkbox" name="3_pview" value="1" /> Gör
        	<input type="checkbox" name="3_padd" value="1" /> Ekle
        	<input type="checkbox" name="3_pedit" value="1" /> Düzenle
        	<input type="checkbox" name="3_pdel" value="1" /> Sil
        </div>
        <div class="form-group"><label>Servisler: </label>
        	<input type="checkbox" name="4_pview" value="1" /> Gör
        	<input type="checkbox" name="4_padd" value="1" /> Ekle
        	<input type="checkbox" name="4_pedit" value="1" /> Düzenle
        	<input type="checkbox" name="4_pdel" value="1" /> Sil
        </div>
        <div class="form-group"><label>Arızalar: </label>
        	<input type="checkbox" name="5_pview" value="1" /> Gör
        	<input type="checkbox" name="5_padd" value="1" /> Ekle
        	<input type="checkbox" name="5_pedit" value="1" /> Düzenle
        	<input type="checkbox" name="5_pdel" value="1" /> Sil
        </div>
        <div class="form-group"><label>Bildirimler: </label>
        	<input type="checkbox" name="6_pview" value="1" /> Gör
        	<!--<input type="checkbox" name="6_padd" value="1" /> Ekle-->
        	<input type="checkbox" name="6_pedit" value="1" /> Düzenle
        	<!--<input type="checkbox" name="6_pdel" value="1" /> Sil-->
        </div>
        <div class="form-group"><label>Elemanlar: </label>
        	<input type="checkbox" name="7_pview" value="1" /> Gör
        	<input type="checkbox" name="7_padd" value="1" /> Ekle
        	<!--<input type="checkbox" name="7_pedit" value="1" /> Düzenle-->
        	<input type="checkbox" name="7_pdel" value="1" /> Sil
        </div>
        <div class="form-group"><label>Resimler: </label>
        	<input type="checkbox" name="8_pview" value="1" /> Gör
        	<input type="checkbox" name="8_padd" value="1" /> Ekle
        	<!--<input type="checkbox" name="8_pedit" value="1" /> Düzenle-->
        	<input type="checkbox" name="8_pdel" value="1" /> Sil
        </div>
        <div class="form-group"><label>Konum: </label>
        	<input type="checkbox" name="9_pview" value="1" /> Gör
        	<input type="checkbox" name="9_padd" value="1" /> Ekle
        	<input type="checkbox" name="9_pedit" value="1" /> Düzenle
        	<input type="checkbox" name="9_pdel" value="1" /> Sil
        </div>
        <div class="form-group"><select name="status" class="form-control m-b"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-default">Ekle</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="permission_info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
<div class="modal fade" id="permission_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
