<?php
$host = "localhost";
$username = "hanz";
$password = "hzn123456+";
$dbname = "mrating";

$con= mysqli_connect($host,$username,$password,$dbname) or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );

?>