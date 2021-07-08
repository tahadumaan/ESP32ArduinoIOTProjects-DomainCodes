<?php
$db = new mysqli("localhost","tduman", "Taha.1999Taha.1999","esp_data" );

date_default_timezone_set('Europe/Istanbul');
$db -> set_charset('utf8');

if($db->connect_errno){
    echo "Connection is failed dawg: (" . $db->connect_errno . ") " . $db->connect_error;
}

//echo "connected.."
?>