<?php
include '../connection.php';

$engname = $_REQUEST['engname'];
$thname = $_REQUEST['thname'];
$types = $_REQUEST['types'];
$genre = $_REQUEST['genre'];
$director = $_REQUEST['director'];
$script = $_REQUEST['script'];
$ch = $_REQUEST['ch'];
$ep = $_REQUEST['ep'];
$onr = $_REQUEST['onr'];
$vdo = $_REQUEST['vdo'];
$story = $_REQUEST['story'];
$img = $_REQUEST['img'];
$logo = $_REQUEST['logo'];

$id = date("YmdHis");	

$typeimg = strrchr($_FILES['img']['name'],".");
$newimg = $id.$typeimg; 
$path_copyimg="../movie/image/".$newimg;

move_uploaded_file($_FILES['img']['tmp_name'],$path_copyimg); 

$typelogo = strrchr($_FILES['logo']['name'],".");
$newlogo = $id.$typelogo; 
$path_copylogo="../movie/logo/".$newlogo;

move_uploaded_file($_FILES['logo']['tmp_name'],$path_copylogo); 

$query = "SELECT * FROM movie" or die("Error:" . mysqli_error()); 
$result = mysqli_query($con, $query); 

	

$sql = "INSERT INTO movie (id,engname,thname,types,genre,director,script,ch,ep,onr,story,vdo) VALUES ('$id','$engname','$thname','$types','$genre','$director','$script','$ch','$ep','$onr','$story','$vdo')";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

$sql = "CREATE TABLE `$id` (
    `user` varchar(50) NOT NULL,
    `rating` float NOT NULL,
    `comment` varchar(500) NOT NULL,
    `photo` varchar(2) NOT NULL,
    `date` timestamp NOT NULL DEFAULT current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
  

if ($con->query($sql) === TRUE) {
    echo"<script>
    alert('บันทึกข้อมูลเรียบร้อยแล้วครับ!');
    window.location='index.php';
    </script>";
	exit();
} else {
    echo "Error creating table: " . $con->error;
}


mysqli_close($con);

?>