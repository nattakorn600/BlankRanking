<!DOCTYPE html>

<?php
include 'top.php';
  
$sql = "SELECT * FROM movie order by onr desc";
$result = mysqli_query($con,$sql); 

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
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/Search.css">
<link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  


<body class="w3-light-grey w3-content " style="max-width:1600px">



<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
  <li><a href="index.php" ><h3 class="w3-padding-64 w3-center"><b>B L A N K</b></h3></a></li>
  <form class="example" action="search.php" style="margin:auto;max-width:90%">
    <input type="text" placeholder="  Search.." name="search" id="search">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form><br>
  <a href="index.php?type=Movies" onclick="w3_close()" class="w3-bar-item w3-button">MOVIES</a> 
  <a href="index.php?type=Series" onclick="w3_close()" class="w3-bar-item w3-button">SERIES</a> 
  <a href="index.php?type=Cartoons" onclick="w3_close()" class="w3-bar-item w3-button">CARTOONS</a>
    <div style="height: 45%"></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('login').style.display='block'">For Admin</a> 
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

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators w3-hide-small">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <?php
if($_GET['type']){
  if($_GET['type'] == 'Movies'){
    logo($top_mid,$top2_mid,$top3_mid,$top_m,$top2_m,$top3_m);
  }
  if($_GET['type'] == 'Series'){
    logo($top_sid,$top2_sid,$top3_sid,$top_s,$top2_s,$top3_s);
  }
  if($_GET['type'] == 'Cartoons'){
    logo($top_cid,$top2_cid,$top3_cid,$top_c,$top2_c,$top3_c);
  }
}
  else{
    logo($top_mid,$top_sid,$top_cid,$top_m,$top_s,$top_c);
  }

  ?>
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

  <!-- Photo grid -->
<div class="row " style="margin: 5px;" >
<?php
if($_GET['page']){
  $page = $_GET['page'];
}
else{
  $page = 1;
}
$colm = ($page*8)-8;
$coin = 0;
while($row = mysqli_fetch_array($result)){
  $id = $row['id'];
  $name = $row['engname'];
  $sql_r = "SELECT * FROM `$id`";
  $result_r = mysqli_query($con,$sql_r);
  $sum = 0;
  $rate = 0;
  $count=0;
  
  while($row_r = mysqli_fetch_array($result_r)){
    $sum += $row_r['rating'];
    $count++;
    $rate = $sum / $count;
  }

  if($_GET['type']){
    if($row['types'] == $_GET['type']){
      $coin++;
      if(($coin > $colm) && ($coin <= $page*8)){
        movie($id,$rate,$name);
      }
    }
  }
  else {
    $coin++;
    if(($coin > $colm) && ($coin <= $page*8)){
      movie($id,$rate, $name);
    }
  }
}
?>
</div>
   

  <!-- Pagination -->
<?php
if($_GET['type']){
?>
  <div class="w3-center w3-padding-32 ">
    <div class="w3-bar">
    	<ul class="pagination justify-content-lg-between" style="margin:20px 0">
        <li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?type=<?php echo $_GET['type']?>&page=<?php echo $page-1?>"><<</a></li>
  		<li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?type=<?php echo $_GET['type']?>&page=1">1</a></li>
  		<li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?type=<?php echo $_GET['type']?>&page=2">2</a></li>
  		<li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?type=<?php echo $_GET['type']?>&page=3">3</a></li>
  		<li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?type=<?php echo $_GET['type']?>&page=<?php echo $page+1?>">>></a></li>
  		</ul>
    </div>
  </div>
<?php
}
else{
?>
  <div class="w3-center w3-padding-32 ">
    <div class="w3-bar">
    	<ul class="pagination justify-content-lg-between" style="margin:20px 0">
        <li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?&page=<?php echo $page-1?>"><<</a></li>
  		<li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?page=1">1</a></li>
  		<li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?page=2">2</a></li>
  		<li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?page=3">3</a></li>
  		<li class="page-item"><a class="w3-bar-item w3-button w3-hover-black" href="index.php?&page=<?php echo $page+1?>">>></a></li>
  		</ul>
    </div>
  </div>
<?php
}
?>

  <!-- Login -->
<div id="login" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:20px; max-width: 550px;">
    <div class="w3-container w3-white w3-center ">
      <div class="row">
        <div class="w3-col ">
          <i onclick="document.getElementById('login').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge" style="float: right;"></i>
        </div>
        <div class="w3-col ">
          <h2 class="w3-wide w3-center" >LOGIN</h2>
        </div>
    </div>
    <form action="admin/login.php" method="post">
      <label style="float: left; width: 11%;"><b>Username</b></label>
      <p><input class="w3-input w3-border" type="text" id="user" name="user" placeholder="Enter Username"></p>

      <label style="float: left; width: 11%;"><b>Password</b></label>
      <p><input class="w3-input w3-border" type="password" id="pass" name="pass" placeholder="Enter Password"></p>
      <BUTTON type="submit" value="Login" class="w3-button w3-padding-large w3-dark-grey w3-margin-bottom " onclick="document.getElementById('login').style.display='none'">Login</BUTTON>
    </form>
    </div>
  </div>
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

</script>

<?php
function movie($id,$rate,$name){
  ?>
  <div class="w3-col l3 s6">
      <div style="padding: 20px"></div>
        <div class="w3-container">
          <div class="w3-display-container">
        	<a href="detail/Show_Detail.php?id=<?php echo $id?>">
          		<img  src="movie/image/<?php echo $id?>.jpg" style="width:100%">
                <span class="w3-tag  w3-display-topright w3-display-container" style="font-family: Roboto,sans-serif;background-color: rgba(0, 0, 0, 0.7); font-size: 20px;"><i class="fa fa-star" style="color: #FFD700; "></i>&nbsp<?php echo number_format($rate, 1, '.', ' ')?></span>
      		</a>
          </div>
        <p class="w3-center"><br><b><?php echo $name ?></b></p>
      </div>
    </div>
    <?php
}

function logo($top1,$top2,$top3,$rate1,$rate2,$rate3){
?>

<div class="carousel-inner">
    <div class="carousel-item active">
    <div class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:400px" >
   <a href="detail/Show_Detail.php?id=<?php echo $top1?>">
  <img class="w3-image" src="movie/logo/<?php echo $top1?>.jpg" width="1600" height="800">
    <!-- Big Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-small"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 30px; background-color: rgba(0, 0, 0, 0.7); "><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate1, 1, '.', ' ')?></p></span>
    </div>
    <!-- Small Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-large"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 20px; background-color: rgba(0, 0, 0, 0.7); width: 130%"><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate1, 1, '.', ' ')?></p></span>
    </div>
  </a>
</div>
    </div>

    <div class="carousel-item">
    <div class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:400px" >
<a href="detail/Show_Detail.php?id=<?php echo $top2?>">
  <img class="w3-image" src="movie/logo/<?php echo $top2?>.jpg" width="1600" height="800">
    <!-- Big Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-small"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 30px; background-color: rgba(0, 0, 0, 0.7); "><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate2, 1, '.', ' ')?></p></span>
    </div>
    <!-- Small Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-large"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 20px; background-color: rgba(0, 0, 0, 0.7); width: 130%"><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate2, 1, '.', ' ')?></p></span>
    </div>
  </a>
</div>
    </div>

    <div class="carousel-item">
    <div class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:400px" >
<a href="detail/Show_Detail.php?id=<?php echo $top3?>">
  <img class="w3-image" src="movie/logo/<?php echo $top3?>.jpg" width="1600" height="800">
    <!-- Big Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-small"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 30px; background-color: rgba(0, 0, 0, 0.7); "><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate3, 1, '.', ' ')?></p></span>
    </div>
    <!-- Small Screen -->
    <div class="w3-display-topright  w3-padding-large w3-hide-large"  >
      <span class="w3-tag w3-display-topright "style="font-family: Roboto,
    sans-serif; font-size: 20px; background-color: rgba(0, 0, 0, 0.7); width: 130%"><i class="fa fa-star" style="color: #FFD700; "></i><p><?php echo number_format($rate3, 1, '.', ' ')?></p></span>
    </div>
  </a>
</div>
    </div>
  </div>

<?php 
}
?>

</body>
</html>
