<?php
session_start();

include '../connection.php';

if($_GET['id']){
    $id = $_GET['id'];
    $user = $_GET['user'];
    $comm = $_GET['comment'];
    $date = $_GET['date'];

    $sql = "DELETE FROM `$id` WHERE user='$user' AND comment='$comm' AND date='$date'";
  
    if (mysqli_query($con, $sql)) {
        echo"<script>
	    history.back();
	    </script>";
	    exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
    }
?>