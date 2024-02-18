<?php
session_start();
include '../connection.php';

$user=$_POST['user'];
$pass=MD5($_POST['pass']);

$sqluser = "SELECT * FROM user WHERE uname ='$user'";
$queryuser = mysqli_query($con, $sqluser) or die(mysqli_error());
$rowsuser = mysqli_num_rows($queryuser);
	
 if($rowsuser<=0)
 {
	echo"<script>alert('Username ไม่ถูกต้อง');
	history.back();
	</script>";
	exit();
 }
 else {
    $sql = mysqli_query($con, "SELECT * FROM user WHERE password='$pass' AND uname='$user'");
    $num = mysqli_num_rows($sql);
    if($num <= 0){
        echo"<script>alert('password ไม่ถูกต้อง');
	    history.back();
	    </script>";
	    exit();
    } else {
        while ($users = mysqli_fetch_array($sql)) 
            
            $_SESSION['id'] = session_id();
            $_SESSION['user'] = $users['user'];
            $_SESSION['status'] = 'admin';
            header("Location: index.php");   
        }
    }


?>