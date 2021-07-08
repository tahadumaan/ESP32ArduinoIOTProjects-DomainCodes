<?php
require 'db.php';
$sql = "SELECT * FROM data ORDER BY id DESC LIMIT 3";
$objConn = $db->query($sql);
$arrRes = $objConn->fetch_all(1);


print_r($arrRes[0]['temp']."|".$arrRes[0]['curTime']."|".
		$arrRes[1]['temp']."|".$arrRes[1]['curTime']."|".
		$arrRes[2]['temp']."|".$arrRes[2]['curTime']."|");

?>