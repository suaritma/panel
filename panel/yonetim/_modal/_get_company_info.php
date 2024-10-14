<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `companies` WHERE `id` = '$id'"));
  ?>
  <div class="modal-header text-center">
    <h4 class="modal-title">Firma Bilgileri</h4>
  </div>
