<?php
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
  $inject_footer = '
<script type="text/javascript"> var filtercity = '.$cityfil.'; var filtertown = '.$townfil.'; var filtersemt = '.$semtfil.'; </script>
<script type="text/javascript">
  $(document).ready(function() { 
    getlocationfilter();
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
      events: "'.DEALER_URL.'_json/get_calendar_info.php'.$c.'",
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
  }); 
</script>';
?>