<?php
require 'db.php';
$sql = "SELECT * FROM data ORDER BY id DESC LIMIT 1";
$objConn = $db->query($sql);
$arrRes = $objConn->fetch_all(1);


print_r($arrRes[0]['gpsLat']."|".$arrRes[0]['gpsLng']);

?>