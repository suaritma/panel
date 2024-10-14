<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title` FROM `permissions` WHERE `id` = '$id'"));
  $resu=mysqli_query($con, "SELECT * FROM `permissions_role` WHERE `permission_id` = '$id'");
  while($row=@mysqli_fetch_assoc($resu)) {
  	$result_role[$row['type']]['pview'] = $row['pview'];
  	$result_role[$row['type']]['padd'] = $row['padd'];
  	$result_role[$row['type']]['pedit'] = $row['pedit'];
  	$result_role[$row['type']]['pdel'] = $row['pdel'];
  }
  ?>
<div class="modal-header text-center">
  <h4 class="modal-title">Yetki Detayları</h4>
</div>
<div class="modal-body">
  <div class="panel-body">
      <table class="table table-bordered">
          <tbody>
              <tr>
                  <td colspan="5">Yetki Tanımı: <?=$res['title']?></td>
              </tr>
              <tr>
                  <td>Müşteriler:</td>
                  <td><span class="<?php if ($result_role['1']['pview']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Okuma</span></td>
                  <td><span class="<?php if ($result_role['1']['padd']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Ekleme</span></td>
                  <td><span class="<?php if ($result_role['1']['pedit']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Düzenleme</span></td>
                  <td><span class="<?php if ($result_role['1']['pdel']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Silme</span></td>
              </tr>
              <tr>
                  <td>Taksitler:</td>
                  <td><span class="<?php if ($result_role['2']['pview']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Okuma</span></td>
                  <td><span class="<?php if ($result_role['2']['padd']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Ekleme</span></td>
                  <td><span class="<?php if ($result_role['2']['pedit']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Düzenleme</span></td>
                  <td><span class="<?php if ($result_role['2']['pdel']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Silme</span></td>
              </tr>
              <tr>
                  <td>Cihazlar:</td>
                  <td><span class="<?php if ($result_role['3']['pview']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Okuma</span></td>
                  <td><span class="<?php if ($result_role['3']['padd']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Ekleme</span></td>
                  <td><span class="<?php if ($result_role['3']['pedit']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Düzenleme</span></td>
                  <td><span class="<?php if ($result_role['3']['pdel']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Silme</span></td>
              </tr>
              <tr>
                  <td>Servisler:</td>
                  <td><span class="<?php if ($result_role['4']['pview']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Okuma</span></td>
                  <td><span class="<?php if ($result_role['4']['padd']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Ekleme</span></td>
                  <td><span class="<?php if ($result_role['4']['pedit']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Düzenleme</span></td>
                  <td><span class="<?php if ($result_role['4']['pdel']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Silme</span></td>
              </tr>
              <tr>
                  <td>Arızalar:</td>
                  <td><span class="<?php if ($result_role['5']['pview']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Okuma</span></td>
                  <td><span class="<?php if ($result_role['5']['padd']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Ekleme</span></td>
                  <td><span class="<?php if ($result_role['5']['pedit']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Düzenleme</span></td>
                  <td><span class="<?php if ($result_role['5']['pdel']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Silme</span></td>
              </tr>
              <tr>
                  <td>Bildirimler:</td>
                  <td><span class="<?php if ($result_role['6']['pview']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Okuma</span></td>
                  <td> - </td>
                  <td><span class="<?php if ($result_role['6']['pedit']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Düzenleme</span></td>
                  <td> - </td>
              </tr>
              <tr>
                  <td>Elemanlar:</td>
                  <td><span class="<?php if ($result_role['7']['pview']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Okuma</span></td>
                  <td><span class="<?php if ($result_role['7']['padd']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Ekleme</span></td>
                  <td> - </td>
                  <td><span class="<?php if ($result_role['7']['pdel']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Silme</span></td>
              </tr>
              <tr>
                  <td>Resimler:</td>
                  <td><span class="<?php if ($result_role['8']['pview']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Okuma</span></td>
                  <td><span class="<?php if ($result_role['8']['padd']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Ekleme</span></td>
                  <td> - </td>
                  <td><span class="<?php if ($result_role['8']['pdel']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Silme</span></td>
              </tr>
              <tr>
                  <td>Konum:</td>
                  <td><span class="<?php if ($result_role['9']['pview']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Okuma</span></td>
                  <td><span class="<?php if ($result_role['9']['padd']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Ekleme</span></td>
                  <td><span class="<?php if ($result_role['9']['pedit']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Düzenleme</span></td>
                  <td><span class="<?php if ($result_role['9']['pdel']==1) { echo "text-success"; } else { echo "text-danger"; } ?>">Silme</span></td>
              </tr>
          </tbody>
      </table>
  </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
</div>
