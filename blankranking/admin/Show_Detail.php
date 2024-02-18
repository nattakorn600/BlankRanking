<!DOCTYPE html>
<?php
session_start();
if($_SESSION['status']!='admin'){
  echo"<script>alert('Session ไม่ถูกต้อง');
	    </script>";
      header("Location: ../index.php");
      exit();
}

include '../connection.php';
include '../time.php';

$sql = "SELECT * FROM movie";
$result = mysqli_query($con,$sql);
$id = $_GET['id'];

while($row = mysqli_fetch_array($result)){
  if($row['id']==$id){
    $engname = $row['engname'];
    $thname = $row['thname'];
    $types = $row['types'];
    $genre = $row['genre'];
    $director = $row['director'];
    $script = $row['script'];
    $ch = $row['ch'];
    $ep = $row['ep'];
    $onr = $row['onr'];
    $vdo = $row['vdo'];
    $story = $row['story'];
  }
}


$sql_table = "SELECT * FROM `$id`";
$result_table = mysqli_query($con,$sql_table);
$sum_top = 0;
$rate_top = 0;
$count_top = 0;

while($row_table = mysqli_fetch_array($result_table)){
  $sum_top += $row_table['rating'];
  $count_top++;
  $rate_top = $sum_top / $count_top;
}

?>

<html lang="en">
<title>Blank Ranking</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="../css/Detail.css">
<link rel="stylesheet" href="../css/Vote.css">
<link rel="stylesheet" href="../css/Comment.css">
<link rel="stylesheet" href="../css/Search.css">
<link rel="shortcut icon" type="image/x-icon" href="../icon.ico"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


<body class="w3-light-grey w3-content" style="max-width:1600px">



<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
<a href="index.php"><li><h3 class="w3-padding-64 w3-center"><b>B L A N K</b></h3></li></a>
  <form class="example" action="../admin/search.php" style="margin:auto;max-width:90%">
    <input type="text" placeholder="  Search.." name="search" id="search">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form><br>
  <a href="Addmovie.php" onclick="w3_close()" class="w3-bar-item w3-button">ADD MOVIES</a>
  <a href="index.php?type=Movies" onclick="w3_close()" class="w3-bar-item w3-button">MOVIES</a> 
  <a href="index.php?type=Series" onclick="w3_close()" class="w3-bar-item w3-button">SERIES</a> 
  <a href="index.php?type=Cartoons" onclick="w3_close()" class="w3-bar-item w3-button">CARTOONS</a>
  <div style="height: 40%"></div>
  <a href="logout.php" class="w3-bar-item w3-button" onclick="w3_close()">Logout</a>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Push down content on small screens --> 
  <div class="w3-hide-large" style="margin-top:83px"></div>

<!-- header -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <li><a href="index.php"><span class="w3-left w3-padding">B L A N K</span></a></li>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header> 

<div class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:400px" >
  <img class="w3-image" src="../movie/logo/<?php echo $id ?>.jpg "  width="1600" height="800">
    <!-- Big Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-small"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 30px; background-color: rgba(0, 0, 0, 0.7); "><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate_top, 1, '.', ' ')?></p></span>
    </div>
    <!-- Small Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-large"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 20px; background-color: rgba(0, 0, 0, 0.7);  width: 130%"><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate_top, 1, '.', ' ')?></p></span>
    </div>
</div>

<div class="w3-row w3-padding-64 " id="about" >
    <div class="w3-col m6 w3-padding-large w3-hide-small w3-center">
     <img src="../movie/image/<?php echo $id ?>.jpg " class="w3-round w3-image " alt="Table Setting" width="390" height="488">
    </div>

    <div class="w3-col m6 w3-padding-large ">
      <h1 class="w3-center"><?php echo $engname ?></h1>
      <h5 class="w3-center"><?php echo $thname ?></h5><br>
      <p class="w3-large">ชื่อเรื่อง : <?php echo "$engname / $thname" ?></p>
      <p class="w3-large">แนว : <?php echo "$genre" ?></p>
      <p class="w3-large">ผู้กำกับ : <?php echo "$director" ?></p>
      <p class="w3-large">คนเขียนบท : <?php echo "$script" ?></p>
      <p class="w3-large">ช่อง : <?php echo "$ch" ?></p>
      <p class="w3-large">จำนวนตอน : <?php echo "$ep" ?></p>
      <p class="w3-large">วันที่ออนแอร์ : <?php echo "$onr" ?></p>
      <p class="w3-large">เรื่องย่อ : <?php echo "$story" ?></p>
    </div>
  </div>

<div class="w3-row " >
  <div class="w3-quarter"><p></p></div>

  <div class="w3-half">
    <div class="videoWrapper">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $vdo ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>

  <div class="w3-quarter"></div>
</div>

<br>
<br>
<br>
<br>
<br>


<!-- Button Comment -->
<div class="w3-row">
  <div class="w3-col" style="width:3%"><p></p></div>


  <div class="w3-col w3-center" style="width:80%; max-width: 850px;">
    <div class="w3-container"  >
      <a href="Edit_Detail.php?id=<?php echo $id?>" class="btn btn-light" style="background-color: rgba(0, 0, 0, 0.6); color: #fff;" type="submit" role="button" aria-pressed="true">
        <b style="color: #fff; ;margin: 5px 10px; float: left; font-size: 15px; ">  แก้ไข  </b></a>
    
      <a href="delete.php?id=<?php echo $id?>" value="button" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style=" float: right;" onclick="return confirm('ยืนยันการลบข้อมูล')"><b style="color: #fff; ;margin: 9px 15px; font-size: 15px;">ลบ</b></a>
    </div>

  <div style="margin: 3px;"></div>
</div>



  <!-- Comment -->
<div class="w3-half w3-center">
<div id="Vote" class="w3-modal">
  <form  action="addvote.php" method="post">
  <div class="w3-modal-content w3-animate-zoom" style="padding:20px; max-width: 550px;">
    <div class="w3-container w3-white w3-center ">
      <div class="row">
        <div class="w3-col ">
          <i onclick="document.getElementById('Vote').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge" style="float: right;"></i>
        </div>
        <div class="w3-col ">
          <h2 class="w3-wide w3-center" >Comment</h2>
        </div>
    </div>
      <label style="float: left;font-family: Roboto,sans-serif;"><b>ชื่อผู้รีวิว</b></label>
      <input class="w3-input w3-border" type="text" id="name" name="name" placeholder="ชื่อผู้รีวิว.. " style="font-family: Roboto,sans-serif">

      <label style="float: left;font-family: Roboto,sans-serif"><b>รีวิว</b></label>
      <textarea class="w3-input w3-border"  id="review" name="review" type="text" placeholder="รีวิว.." style="font-family: Roboto,sans-serif"></textarea>
      <br>

      <div class="star-rating">
              <span class="fa fa-star-o" data-rating="1.00" title="1 Star"></span>
              <span class="fa fa-star-o" data-rating="2.00" title="2 Star"></span>
              <span class="fa fa-star-o" data-rating="3.00" title="3 Star"></span>
              <span class="fa fa-star-o" data-rating="4.00" title="4 Star"></span>
              <span class="fa fa-star-o" data-rating="5.00" title="5 Star"></span>
              <span class="fa fa-star-o" data-rating="6.00" title="6 Star"></span>
              <span class="fa fa-star-o" data-rating="7.00" title="7 Star"></span>
              <span class="fa fa-star-o" data-rating="8.00" title="8 Star"></span>
              <span class="fa fa-star-o" data-rating="9.00" title="9 Star"></span>
              <span class="fa fa-star-o" data-rating="10.00" title="10 Star"></span>
              <input type="hidden" name="star" id="star" class="rating-value">
      </div>
      <br>

      <BUTTON type="submit" id="id" name="id" value="<?php echo $id?>"  class="btn btn-light" style="background-color: rgba(0, 0, 0, 0.6); color: #fff;" onclick="document.getElementById('Vote').style.display='none'">Post</BUTTON> 
    </div>
  </div>
  </form>
</div>
</div>
</div>
<br>
<br>
<br>


<!-- Comment -->
<div class="w3-row">
  <div class="w3-col" style="width:5%"><p></p></div>
  <div class="w3-col w3-hide-small" style="width:13%"><p></p></div>

<div class="w3-col " style="width:90%; max-width: 800px;">
<div class="w3-container"  >
  <h2>Comment</h2><br>


    <?php

    $result_com = mysqli_query($con,$sql_table);
    while($row_com = mysqli_fetch_array($result_com)){
    ?>

  <ul class="w3-ul w3-card-4">
    <li class="w3-bar" style="background-color: #fff; ">

      <a href="decom.php?id=<?php echo $id?>&user=<?php echo $row_com['user']?>&comment=<?php echo $row_com['comment']?>&date=<?php echo $row_com['date']?>" class="close w3-xlarge" style="color: black; " aria-label="close">&times;</a>&nbsp&nbsp
      <span class="tag" style="float: right; margin: 3px;font-family: Roboto,sans-serif; width: 15%; max-width: 80px;  font-size: 15px;">
      <p><i class="fa fa-star" style="color: #FFD700; "></i>&nbsp<?php echo $row_com['rating'] ?></p></span>

      <img src="../movie/who/<?php echo $row_com['photo']?>.png" class="w3-bar-item w3-circle " style="width:85px">
      <div class="w3-bar-item">
        <p><span class="w3-large"><?php echo $row_com['user'] ?></span><br>
           <span style="font-size: 11px;"><?php echo duration($row_com['date'],date("Y-m-d H:i:s"));?></span> </p>
        <span><?php echo $row_com['comment'] ?> </span>
      </div>
    </li>
  </ul>
  <div style="margin: 3px;"></div>
  <?php
    }
    ?>

</div>
</div>

  <div class="w3-col" style="width:5%"><p></p></div>
</div>

  <!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin-top:128px"> 
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
</footer>
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});
</script>




</body>
</html>