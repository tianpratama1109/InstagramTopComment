<?php

$title = "Ardav Media";

date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d");
$time = date("h:i:s");

$host = "localhost";
$user = "sangatez_topkomen"; 
$pass = "08983400496dudut";
$db = "sangatez_topkomen";
$konek = mysqli_connect($host, $user, $pass, $db);
if(!$konek){
    die("Error #1");
}
?>