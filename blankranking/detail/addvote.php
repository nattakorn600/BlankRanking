<?php
include '../connection.php';

//เพิ่มข้อมูลลง database

$id = $_REQUEST['id'];
$user = $_POST['name'];
$rate = $_POST['star'];
$comment = $_POST['review'];
$photo = rand(1,13);

$sql = "INSERT INTO `$id` (user,rating,comment,photo) VALUES ('$user','$rate','$comment','$photo')";

if ($con->query($sql) === TRUE) {
    echo"<script>
	    window.location='Show_Detail.php?id=$id';
	    </script>";
	    exit();
} else {
    echo "Error creating table: " . $con->error;
}

?>