<?PHP
  $get=mysqli_query($con, "SELECT * FROM `permissions` WHERE `deleted_at` = '0' ORDER BY `id` ASC");
  while ($row = @mysqli_fetch_assoc($get)) {
	$result_permission[] = $row;
  }
  $inject_footer = '
    <script src="'.ADMIN_URL.'_assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/metisMenu.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.nanoscroller.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/waves.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/pace.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/custom.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/ext.js" type="text/javascript"></script>
  ';
?>
