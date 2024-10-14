<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	include('../../db.php');
	include('../_include/_session.php');
	include('../_include/_function.php');
	$get_location=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `dealers_location`.`latitude` as `latitude`,`dealers_location`.`longitude` as `longitude`, `dealers`.`title` as `title` FROM `dealers_location` INNER JOIN `dealers` ON `dealers`.`id`=`dealers_location`.`dealer_id` WHERE `dealers_location`.`dealer_id` = '$_SESSION[dealer_id]'"));
	$customers=mysqli_query($con, "SELECT `firstname`, `lastname`, `latitude`, `longitude` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]'");
	while ($row=@mysqli_fetch_assoc($customers)) {
		$result_customers[] = $row;
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Bayi Haritam</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
	<div id="map"></div>
  <script type="text/javascript">
	  function initMap() {
    var locations = [
      <?php $l = 2; foreach ($result_customers as $res) { ?>
      	['<?=$res['firstname']?> <?=$res['lastname']?>', <?=$res['latitude']?>, <?=$res['longitude']?>, <?=$l?>],
      <?php $l++; } ?>
      ['<?=$get_location['title']?>', <?=$get_location['latitude']?>, <?=$get_location['longitude']?>, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(<?=$get_location['latitude']?>, <?=$get_location['longitude']?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
    if (locations[i][0]=='<?=$get_location['title']?>') {
      var image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: image
      });
    } else {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
    }

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    }
  </script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4U2_0ftTw2nJtmcbaiBerd2p2YVQ45as&callback=initMap"></script>
  </body>
</html>
