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

    if($_REQUEST['id']){
        $id = $_REQUEST['id'];

        $typeimg = strrchr($_FILES['img']['name'],".");
        $newimg = $id.$typeimg; 
        $path_copyimg="../movie/image/".$newimg;

        move_uploaded_file($_FILES['img']['tmp_name'],$path_copyimg); 

        $typelogo = strrchr($_FILES['logo']['name'],".");
        $newlogo = $id.$typelogo; 
        $path_copylogo="../movie/logo/".$newlogo;

        move_uploaded_file($_FILES['logo']['tmp_name'],$path_copylogo); 

    $update = "UPDATE movie SET engname='$engname',thname='$thname',genre='$genre',director='$director',script='$script',ch='$ch',ep='$ep',onr='$onr',story='$story',vdo='$vdo' WHERE id=$id"; 
    $up = mysqli_query($con, $update);
    
    if ($con->query($update) === TRUE) {
        ?>
        <script>
        alert('่แก้ไขเรียบร้อยแล้ว');
        window.location="Show_Detail.php?id=<?php echo $id?>";
        </script>
        <?php
    } else {
        echo "Error creating table: " . $con->error;
    }
    
    mysqli_close($con);
    
    }
?>