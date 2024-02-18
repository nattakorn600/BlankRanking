<?php session_start();
if($_SESSION['status']!='admin'){
  echo"<script>alert('Session ไม่ถูกต้อง');
      </script>";
      header("Location: ../index.php");
      exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<title>Blank Ranking</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/Addmovie.css">
<link rel="shortcut icon" type="image/x-icon" href="../icon.ico"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<head>

</head>
<body>

    <nav class="navbar" id="top">
      <a href="index.php"><button class=" w3-button   w3-round-large fa fa-angle-double-left" ></button></a>
  </nav>



 <div class="w3-row " >
    <div class="w3-quarter"><p></p></div>

    <div class="w3-half">
    <form action="addcode.php" method="post" enctype="multipart/form-data">
        <label for="fname">ชื่อเรื่อง</label>
          <input type="text" id="engname" name="engname" placeholder="ชื่ออังกฤษ.." required>
          <input type="text" id="thname" name="thname" placeholder="ชื่อไทย.." required>  

          <label for="country">ประเภท</label>
    <select class="custom-select" id="types" name="types" required>
    <option value="" selected>Please select type</option>
      <option>Movies</option>
      <option>Series</option>
      <option>Cartoons</option>
    </select>

        <label for="fname">แนว</label>
          <input type="text" id="genre" name="genre" placeholder="ประวัติศาสตร์ / แฟนตาซี / ระทึกขวัญ.." required>

        <label for="fname">ผู้กำกับ</label>
          <input type="text" id="director" name="director" placeholder="ชื่อผู้กำกับ.." required>

        <label for="fname">ผู้เขียนบท</label>
          <input type="text" id="script" name="script" placeholder="ชื่อผู้เขียนบท.." required>

        <label for="fname">ช่อง</label>
          <input type="text" id="ch" name="ch" placeholder="Netflix / SBS.." required>

          
        <label for="fname">จำนวนตอน</label>
          <input class="form-control" type="text" id="ep" name="ep" placeholder="6/16/32.." required>

        <label for="fname">วันที่ออนแอร์</label>
          <input class="form-control" type="date" id="onr" name="onr" placeholder="13 มีนาคม 2563" required>


        <label for="country">เรื่องย่อ</label>
          <textarea id="story" name="story" placeholder="เรื่องย่อ.." required></textarea>

        <label for="fname">ตัวอย่างหนัง</label>
          <input class="form-control" type="text" id="vdo" name="vdo" placeholder="https://www.youtube.com/watch?v=" required>


        <label for="country">รูปปก</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="img" id="img" required>
              <label class="custom-file-label" for="img" >Choose Banner image file...</label>
          </div>
  
        <label for="country">รูปแบนเนอร์</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="logo" id="logo" required>
              <label class="custom-file-label" for="logo" >Choose Cover image file...</label>
          </div>

  
        <input type="submit" value="Submit">
      </form>
    </div>

  <div class="w3-quarter"></div>
</div>


<script>
  $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>

</body>
</html>