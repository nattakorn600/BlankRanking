<?php
session_start();

include '../connection.php';

if($_GET['id']){
    $id = $_GET['id'];
    $sql = "DELETE FROM movie WHERE id=$id";

    $sqli = "DROP TABLE `$id`";
    $drop = mysqli_query($con, $sqli);

    unlink("../movie/image/$id.jpg");
    unlink("../movie/logo/$id.jpg");

    if (mysqli_query($con, $sql)) {
      ?>
      <script>
      alert('่ลบเรียบร้อยแล้ว');
      window.location="index.php";
      </script>
      <?php
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
    }
?>