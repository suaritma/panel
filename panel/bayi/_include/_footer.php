    </div>
</div>
<br><br><br>
<footer class="footer no-print">
  <div class="container">
    <div class="row">
      <div class="col-md-4 hidden-xs">
        <p class="text-center">
          <img src="<?=DEALER_URL?>_assets/images/alt-logo.png">
        </p>
      </div>
      <div class="col-md-4 hidden-xs">
        <p class="text-center text-muted"><?=@$lang['connection']?>: <span class="text-info"><?=ip()?></span></p>
        <p class="text-center text-muted lead"><?=@$lang['footer_text']?></p>
      </div>
      <div class="col-md-4 hidden-xs">
        <p class="text-center">
          <img src="<?=DEALER_URL?>_assets/images/logo.png">
        </p>
      </div>
      <div class="col-xs-6 visible-xs">
        <p class="text-center">
          <img src="<?=DEALER_URL?>_assets/images/logo.png" width="100px">
        </p>
      </div>
      <div class="col-xs-6 visible-xs">
        <p class="text-center">
          <img src="<?=DEALER_URL?>_assets/images/alt-logo.png" width="100px">
        </p>
      </div>
    </div>
  </div>
</footer>







<script src="<?=DEALER_URL?>_assets/js/jquery-2.2.4.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="<?=DEALER_URL?>_assets/js/jquery.dataTables.min.js"></script>
<!--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->

<script src="<?=DEALER_URL?>_assets/js/moment.min.js"></script>
<script src="<?=DEALER_URL?>_assets/js/bootstrap.min.js"></script>
<script src="<?=DEALER_URL?>_assets/js/bootstrap-multiselect.min.js"></script>
<script src="<?=DEALER_URL?>_assets/js/fullcalendar.min.js"></script>
<script src="<?=DEALER_URL?>_assets/js/tr.js"></script>
<script src="<?=DEALER_URL?>_assets/js/spin.min.js"></script>
<script src="<?=DEALER_URL?>_assets/js/canvasjs.min.js"></script>
<script src="<?=DEALER_URL?>_assets/js/defiant.min.js"></script>
<script src="<?=DEALER_URL?>_assets/packages/autocomplete/jquery.easy-autocomplete.min.js"></script>
<script src="<?=DEALER_URL?>_assets/js/lightbox.js"></script>
<script src="<?=DEALER_URL?>_assets/js/jquery.stickynotif.min.js"></script>
<script src="<?=DEALER_URL?>_assets/js/locationController.js"></script>
<script src="<?=DEALER_URL?>_assets/js/functions.js"></script>







<script type="text/javascript">
function pagination(url, name, id) {
  $('<form action="' + url + '" method="POST"><input type="hidden" name="' + name + '" value="' + id + '"></form>').appendTo('body').submit();
}
function goto(url, name, id, process_id, check) {
  if (check==1) {
    if (window.confirm("Bu işlemi yapmak istediğinize emin misiniz?")) {
      $('<form action="' + url + '" method="POST"><input type="hidden" name="process" value="' + name + '"><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="process_id" value="' + process_id + '"></form>').appendTo('body').submit();
    }
  } else {
    $('<form action="' + url + '" method="POST"><input type="hidden" name="process" value="' + name + '"><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="process_id" value="' + process_id + '"></form>').appendTo('body').submit();
  }
}
</script>
<?php if (isset($inject_footer)) { echo $inject_footer; } ?>

<?php if ((isset($_SESSION['dealer_id'])) && (!empty($_SESSION['dealer_id']))) { ?>
<script>
    $(document).ready(function() {
        <?php if (service_notif_get($_SESSION['dealer_id'])!="OK") { ?>
            $.sticky('<a href="<?=DEALER_URL?>customers/service" title="Gecikmiş Servisler!"><?=service_notif_get($_SESSION['dealer_id'])?></a>', {
                stickyClass: 'warning'
            });
        <?php } ?>
        <?php if (defects_notif_get($_SESSION['dealer_id'])!="OK") { ?>
            $.sticky('<a href="<?=DEALER_URL?>customers/defect" title="Giderilmemiş Arızalar!"><?=defects_notif_get($_SESSION['dealer_id'])?></a>', {
                stickyClass: 'error'
            });
        <?php } ?>
    });
</script>



<?php } ?>

<script>
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>
</html>

<?php 



mysqli_close($con); ?>
