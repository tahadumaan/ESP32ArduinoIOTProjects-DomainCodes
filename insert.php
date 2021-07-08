<?php
include 'db.php';
$curTime = date("h:i:s");
$strSQL = "INSERT INTO data(gpsLat,gpsLng,temp,curTime) VALUES ('".$_GET['gpsLat']."','".$_GET['gpsLng']."','".$_GET['temp']."','".$curTime."')";
$objConn =  $db->query($strSQL);

?>

