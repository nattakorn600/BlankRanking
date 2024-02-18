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
  <li><a href="index.php" ><h3 class="w3-padding-64 w3-center"><b>B L A N K</b></h3></a></li>
  <form class="example" action="../admin/search.php" style="margin:auto;max-width:90%">
    <input type="text" placeholder="  Search.." name="search" id="search">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form><br>
  <a href="Addmovie.php" onclick="w3_close()" class="w3-bar-item w3-button">ADD MOVIES</a>
  <a href="index.php?type=Movies" onclick="w3_close()" class="w3-bar-item w3-button">MOVIES</a> 
  <a href="index.php?type=Series" onclick="w3_close()" class="w3-bar-item w3-button">SERIES</a> 
  <a href="index.php?type=Cartoons" onclick="w3_close()" class="w3-bar-item w3-button">CARTOONS</a>
  <div style="height: 45%"></div>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding" onclick="w3_close()">Logout</a>
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

<form action="edit.php" method="post" enctype="multipart/form-data">

<div class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:400px" >
  <img class="w3-image" src="../movie/logo/<?php echo $id ?>.jpg "  width="1600" height="800">
  <div class="custom-file">
            <input type="file" class="custom-file-input" name="logo" id="logo">
              <label class="custom-file-label" for="logo" ><?php echo $id ?>.jpg</label>
          </div>
    <!-- Big Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-small"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 30px; background-color: rgba(0, 0, 0, 0.7); "><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate_top, 1, '.', ' ')?></p></span>
    </div>
    <!-- Small Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-large"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 20px; background-color: rgba(0, 0, 0, 0.7); width: 110%"><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate_top, 1, '.', ' ')?></p></span>
    </div>
</div>

<div class="w3-row w3-padding-64 " id="about" >
    <div class="w3-col m6 w3-padding-large  w3-center">
     <img src="../movie/image/<?php echo $id ?>.jpg " class="w3-round w3-image " alt="Table Setting" width="390" height="488">
     <div class="custom-file" style=" max-width: 390px;">
            <input type="file" class="custom-file-input" name="img" id="img" style="">
              <label class="custom-file-label" for="img" ><?php echo $id ?>.jpg</label>
          </div>
    </div>

    <div class="w3-col m6 w3-padding-large ">
      <h1 class="w3-center"><?php echo $engname ?></h1>
      <h5 class="w3-center"><?php echo $thname ?></h5><br>
      <p class="w3-large">ชื่อเรื่อง : 
        <input type="text" id="engname" name="engname" value="<?php echo "$engname"?>"style="width: 100%" placeholder="ชื่ออังกฤษ"> / 
        <input type="text" id="thname" name="thname" value="<?php echo "$thname" ?>" style="width: 100%;"placeholder="ชื่อไทย"></p>
      <p class="w3-large">แนว : 
        <input type="text" id="genre" name="genre" value="<?php echo "$genre" ?>" style="width: 100%;"placeholder="ประวัติศาสตร์ / แฟนตาซี / ระทึกขวัญ.."></p>
      <p class="w3-large">ผู้กำกับ : 
        <input type="text" id="director" name="director" value="<?php echo "$director" ?>" style="width: 100%; display: inline;    "placeholder="ชื่อผู้กำกับ.."></p>
      <p class="w3-large">คนเขียนบท : 
        <input type="text" id="script" name="script" value="<?php echo "$script" ?>" style="width: 100%;"placeholder="ชื่อผู้เขียนบท.."></p>
      <p class="w3-large">ช่อง : 
        <input type="text" id="ch" name="ch" value="<?php echo "$ch" ?>" style="width: 100%;"placeholder="Netflix / SBS / tvN.."></p>
      <p class="w3-large">จำนวนตอน : 
        <input type="text" id="ep" name="ep" value="<?php echo "$ep" ?>" style="width: 100%;"placeholder="6/16/32.."></p>
      <p class="w3-large">วันที่ออนแอร์ : 
        <input type="date" id="onr" name="onr" value="<?php echo "$onr" ?>" style="width: 100%;"placeholder="13 มีนาคม 2563"></p>
      <p class="w3-large">เรื่องย่อ : 
        <textarea class="form-control "  id="story" name="story" style="width: 100%; height: 100px;"placeholder="เรื่องย่อ.."><?php echo "$story" ?></textarea></p>
    </div>
  </div>

<div class="w3-row " >
  <div class="w3-quarter"><p></p></div>

  <div class="w3-half">
 
    <div class="videoWrapper">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $vdo ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
    </div>
    <input class="form-control" type="text" id="vdo" name="vdo" value="<?php echo $vdo ?>">
  </div>

  <div class="w3-quarter"></div>
</div>


<br>
<br>
<br>
<br>

<!-- Comment -->
<div class="w3-row">
  

  <div class="w3-col" style="width:5%"><p></p></div>
</div>



<div class="w3-row">
  <div class="w3-col" style="width:3%"><p></p></div>


  <div class="w3-col w3-center" style="width:80%; max-width: 880px;">
    <div class="w3-container"  >
      <button type="submit" class="btn btn-light" style="background-color: rgba(0, 0, 0, 0.6); color: #fff;" id="id" name="id" value="<?php echo $id?>">
        <b style="color: #fff; ;margin: 5px 18px; float: left; ">   Save  </b></button>

      <a href="Show_Detail.php?id=<?php echo $id?>" value="button" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style=" float: right;"><b style="color: #fff; ;margin: 9px 9px; font-size: 15px;">ยกเลิก</b></a>
    </div>

  <div style="margin: 3px;"></div>
</div>

</form>





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

<script>
  $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>


</body>
</html>