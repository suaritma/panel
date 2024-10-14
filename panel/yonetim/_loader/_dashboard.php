<?php
  $stats_daily=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `total_customer`, `total_device`, `total_dealer` FROM `stats_daily` ORDER BY `id` DESC LIMIT 1"));
  $payments=mysqli_query($con, "SELECT `payments`.`transaction_id` as `transaction_id`, `dealers`.`title` as `title`, `payments`.`amount` as `amount`, `payments`.`installment` as `installment`, `payments`.`created_at` as `created_at`, `payments`.`completed` as `completed`, `payments`.`refunded` as `refunded` FROM `payments` INNER JOIN `dealers` ON `dealers`.`id` = `payments`.`dealer_id` ORDER BY `payments`.`id` DESC LIMIT 10");
  while ($row = @mysqli_fetch_assoc($payments)) {
    $result_payment[] = $row;
  }
  $cityfil=0;
  $townfil=0;
  $semtfil=0;
  if ((isset($_POST['cities'])) && (isset($_POST['towns'])) && (isset($_POST['streets']))) {
    $city=varsql($_POST['cities']);
    $town=varsql($_POST['towns']);
    $street=varsql($_POST['streets']);
    $c="?cities=".$city."&towns=".$town."&street[]=".join(',', $street);
    $cityfil=$city;
    $townfil=$town;
    $semtfil='['.join(',', $street).']';
  } elseif ((isset($_POST['cities'])) && (isset($_POST['towns']))) {
    $city=varsql($_POST['cities']);
    $town=varsql($_POST['towns']);
    $c="?cities=".$city."&towns=".$town;
    $cityfil=$city;
    $townfil=$town;
  } elseif (isset($_POST['cities'])) {
    $city=varsql($_POST['cities']);
    $c="?cities=".$city;
    $cityfil=$city;
  } else {
    $c="";
  }
  $inject_header = '
  	<style>
.fc-basic-view .fc-body .fc-row {
    max-height: 80px !important;
}
  	</style>
  ';
  $inject_footer = '
    <script src="'.ADMIN_URL.'_assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/bootstrap/js/bootstrap-multiselect.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/metisMenu.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.nanoscroller.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery-jvectormap-2.0.1.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/flot/jquery.flot.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/flot/jquery.flot.resize.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/flot/jquery.flot.pie.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/flot/curved-line-chart.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/chartjs/Chart.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/pace.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/waves.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/morris_chart/raphael-2.1.0.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/morris_chart/morris.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.sparkline.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery-jvectormap-data-turkey-tr-en.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/custom.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/chartjs/Chart.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/moment.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/c3/d3.v3.min.js" charset="utf-8"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.simpleWeather.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/fullcalendar.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/tr.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/c3/c3.min.js"></script>
    <script type="text/javascript"> var filtercity = '.$cityfil.'; var filtertown = '.$townfil.'; var filtersemt = '.$semtfil.'; </script>
    <script src="'.ADMIN_URL.'_assets/js/ext.js" type="text/javascript"></script>
    <script type="text/javascript"> getlocationfilter(); </script>
    <script src="'.ADMIN_URL.'_json/get_index_stat.php"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        if (filtercity!=0) {
            $("#filter-cities").trigger("change");
        }
        if (filtertown!=0) {
            $("#filter-towns").trigger("change");
        }
          $("#main-calendar").fullCalendar({
            header: {
              right: "prev,today,next",
              center: "title",
              left: "month,basicWeek,basicDay"
            },
            navLinks: false,
            editable: false,
            eventLimit: 2,
            events: "'.ADMIN_URL.'_json/get_calendar_info.php'.$c.'",
            eventRender: function (event, element) {
              element.attr("href", "javascript:void(0);");
              element.click(function() {
                let inside = $("#fullCalModalBody");
                inside.removeData();
                inside.load("../_json/get_customer_info.php?id=" + event.data_id);
                $("#fullCalModal").modal("show");
              });
            }
          });
          $.getJSON("../_json/get_devices_for_map.json", function(data){
            var val = "devices";
            var statesValues = jvm.values.apply({}, jvm.values(data.states));
            $("#world-map").vectorMap({
              map: "turkey_1_mill_en",
              series: {
                regions: [{
                  scale: ["#DEEBF7", "#08519C"],
                  attribute: "fill",
                  values: data.states[val],
                  min: jvm.min(statesValues),
                  max: jvm.max(statesValues)
                }]
              },
              onRegionTipShow: function(event, label, code){
                label.html(
                  "<b>"+label.html()+"</b></br>"+
                  "<b>Müşteriler: </b>"+data.states["customers"][code]+"</br>"+
                  "<b>Cihazlar: </b>"+data.states[val][code]
                );
              }
            });
          });
      });
    </script>
  ';
  //<script type="text/javascript"> $(document).ready(function() { getlocationfilter(); }); </script>
?>
