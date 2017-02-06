<?php
include_once 'friendly_config.php';   // As functions.php is not included
$mysqli2 = new mysqli($host, $user, $password, $database);
/*if($mysqli2->connect_errno > 0){
    die('Unable to connect to database' . $mysqli2->connect_error);
}else{
    echo "Database is connected.";
}*/