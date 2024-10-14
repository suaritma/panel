<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`,`status` FROM `permissions` WHERE `id` = '$id'"));
  $resc=mysqli_query($con, "SELECT * FROM `permissions_role` WHERE `permission_id` = '$id'");
  while($row=@mysqli_fetch_assoc($resc)) {
	$result_permission[$row['type']]['pview'] = $row['pview'];
	$result_permission[$row['type']]['padd'] = $row['padd'];
	$result_permission[$row['type']]['pedit'] = $row['pedit'];
	$result_permission[$row['type']]['pdel'] = $row['pdel'];
  }
?>
<div class="modal-header text-center">
        <h4 class="modal-title">Yetki Düzenle</h4>
      </div>
      <form role="form" method="post">
        <input type="hidden" name="process" value="edit">
        <input type="hidden" name="process_id" value="<?=$id?>">
      <div class="modal-body">
        <div class="form-group"><label>Tanım</label><input name="title" placeholder="Yetki Tanımı" class="form-control" type="text" value="<?=$res['title']?>"></div>
        <div class="form-group"><label>Müşteriler: </label>
        	<input type="checkbox" name="1_pview" value="1"<?php if ($result_permission[1]['pview']==1) { ?> checked<?php } ?> /> Gör
        	<input type="checkbox" name="1_padd" value="1"<?php if ($result_permission[1]['padd']==1) { ?> checked<?php } ?> /> Ekle
        	<input type="checkbox" name="1_pedit" value="1"<?php if ($result_permission[1]['pedit']==1) { ?> checked<?php } ?> /> Düzenle
        	<input type="checkbox" name="1_pdel" value="1"<?php if ($result_permission[1]['pdel']==1) { ?> checked<?php } ?> /> Sil
        </div>
        <div class="form-group"><label>Taksitler: </label>
        	<input type="checkbox" name="2_pview" value="1"<?php if ($result_permission[2]['pview']==1) { ?> checked<?php } ?> /> Gör
        	<input type="checkbox" name="2_padd" value="1"<?php if ($result_permission[2]['padd']==1) { ?> checked<?php } ?> /> Ekle
        	<input type="checkbox" name="2_pedit" value="1"<?php if ($result_permission[2]['pedit']==1) { ?> checked<?php } ?> /> Düzenle
        	<input type="checkbox" name="2_pdel" value="1"<?php if ($result_permission[2]['pdel']==1) { ?> checked<?php } ?> /> Sil
        </div>
        <div class="form-group"><label>Cihazlar: </label>
        	<input type="checkbox" name="3_pview" value="1"<?php if ($result_permission[3]['pview']==1) { ?> checked<?php } ?> /> Gör
        	<input type="checkbox" name="3_padd" value="1"<?php if ($result_permission[3]['padd']==1) { ?> checked<?php } ?> /> Ekle
        	<input type="checkbox" name="3_pedit" value="1"<?php if ($result_permission[3]['pedit']==1) { ?> checked<?php } ?> /> Düzenle
        	<input type="checkbox" name="3_pdel" value="1"<?php if ($result_permission[3]['pdel']==1) { ?> checked<?php } ?> /> Sil
        </div>
        <div class="form-group"><label>Servisler: </label>
        	<input type="checkbox" name="4_pview" value="1"<?php if ($result_permission[4]['pview']==1) { ?> checked<?php } ?> /> Gör
        	<input type="checkbox" name="4_padd" value="1"<?php if ($result_permission[4]['padd']==1) { ?> checked<?php } ?> /> Ekle
        	<input type="checkbox" name="4_pedit" value="1"<?php if ($result_permission[4]['pedit']==1) { ?> checked<?php } ?> /> Düzenle
        	<input type="checkbox" name="4_pdel" value="1"<?php if ($result_permission[4]['pdel']==1) { ?> checked<?php } ?> /> Sil
        </div>
        <div class="form-group"><label>Arızalar: </label>
        	<input type="checkbox" name="5_pview" value="1"<?php if ($result_permission[5]['pview']==1) { ?> checked<?php } ?> /> Gör
        	<input type="checkbox" name="5_padd" value="1"<?php if ($result_permission[5]['padd']==1) { ?> checked<?php } ?> /> Ekle
        	<input type="checkbox" name="5_pedit" value="1"<?php if ($result_permission[5]['pedit']==1) { ?> checked<?php } ?> /> Düzenle
        	<input type="checkbox" name="5_pdel" value="1"<?php if ($result_permission[5]['pdel']==1) { ?> checked<?php } ?> /> Sil
        </div>
        <div class="form-group"><label>Bildirimler: </label>
        	<input type="checkbox" name="6_pview" value="1"<?php if ($result_permission[6]['pview']==1) { ?> checked<?php } ?> /> Gör
        	<!--<input type="checkbox" name="6_padd" value="1"<?php if ($result_permission[6]['padd']==1) { ?> checked<?php } ?> /> Ekle-->
        	<input type="checkbox" name="6_pedit" value="1"<?php if ($result_permission[6]['pedit']==1) { ?> checked<?php } ?> /> Düzenle
        	<!--<input type="checkbox" name="6_pdel" value="1"<?php if ($result_permission[6]['pdel']==1) { ?> checked<?php } ?> /> Sil-->
        </div>
        <div class="form-group"><label>Elemanlar: </label>
        	<input type="checkbox" name="7_pview" value="1"<?php if ($result_permission[7]['pview']==1) { ?> checked<?php } ?> /> Gör
        	<input type="checkbox" name="7_padd" value="1"<?php if ($result_permission[7]['padd']==1) { ?> checked<?php } ?> /> Ekle
        	<!--<input type="checkbox" name="7_pedit" value="1"<?php if ($result_permission[7]['pedit']==1) { ?> checked<?php } ?> /> Düzenle-->
        	<input type="checkbox" name="7_pdel" value="1"<?php if ($result_permission[7]['pdel']==1) { ?> checked<?php } ?> /> Sil
        </div>
        <div class="form-group"><label>Resimler: </label>
        	<input type="checkbox" name="8_pview" value="1"<?php if ($result_permission[8]['pview']==1) { ?> checked<?php } ?> /> Gör
        	<input type="checkbox" name="8_padd" value="1"<?php if ($result_permission[8]['padd']==1) { ?> checked<?php } ?> /> Ekle
        	<!--<input type="checkbox" name="8_pedit" value="1"<?php if ($result_permission[8]['pedit']==1) { ?> checked<?php } ?> /> Düzenle-->
        	<input type="checkbox" name="8_pdel" value="1"<?php if ($result_permission[8]['pdel']==1) { ?> checked<?php } ?> /> Sil
        </div>
        <div class="form-group"><label>Konum: </label>
        	<input type="checkbox" name="9_pview" value="1"<?php if ($result_permission[9]['pview']==1) { ?> checked<?php } ?> /> Gör
        	<input type="checkbox" name="9_padd" value="1"<?php if ($result_permission[9]['padd']==1) { ?> checked<?php } ?> /> Ekle
        	<input type="checkbox" name="9_pedit" value="1"<?php if ($result_permission[9]['pedit']==1) { ?> checked<?php } ?> /> Düzenle
        	<input type="checkbox" name="9_pdel" value="1"<?php if ($result_permission[9]['pdel']==1) { ?> checked<?php } ?> /> Sil
        </div>
        <div class="form-group"><select name="status" class="form-control m-b"><option value="1"<?php if ($res['status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if ($res['status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-default">Düzenle</button>
      </div>
    </form>
