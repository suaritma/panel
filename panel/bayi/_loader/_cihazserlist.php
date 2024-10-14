<?php

$sorgum=mysqli_query($con, "SELECT customers.id,customers.firstname, customers.lastname, customers.gsm,customers.dealer_id, customers_device.status, customers_device.device_id,customers.city, customers_device.sonservistah, customers_device.sonrakisertah, customers_device.sonsertip FROM customers_device JOIN customers ON customers_device.customer_id=customers.id WHERE `dealer_id` = '$_SESSION[dealer_id]' AND customers.status=1 AND customers_device.status=1 ORDER BY `customers_device`.`sonrakisertah` DESC");
