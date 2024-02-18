<?php
include 'connection.php';

$sql_top = "SELECT * FROM movie order by onr asc";
$result_top = mysqli_query($con,$sql_top);

while($row_top = mysqli_fetch_array($result_top)){

$id_top = $row_top['id'];
$sql_table = "SELECT * FROM `$id_top`";
$result_table = mysqli_query($con,$sql_table);
$sum_top = 0;
$rate_top = 0;
$count_top = 0;


while($row_table = mysqli_fetch_array($result_table)){
  $sum_top += $row_table['rating'];
  $count_top++;
  $rate_top = $sum_top / $count_top;
}

$last = $rate_top;

if($row_top['types'] == 'Movies'){
    if($top_m <= $last){
        $top3_m =  $top2_m;
        $top3_mid = $top2_mid;

        $top2_m = $top_m;
        $top2_mid = $top_mid;

        $top_m = $last;
        $top_mid = $id_top;
      }
    else if(($top2_m <= $last) && ($last <= $top_m)){
        $top3_m =  $top2_m;
        $top3_mid = $top2_mid;

        $top2_m = $last;
        $top2_mid = $id_top;
    }
    else if(($top3_m <= $last) && ($last <= $top2_m)){
        $top3_m = $last;
        $top3_mid = $id_top;
    }
}
if($row_top['types'] == 'Series'){
    if($top_s <= $last){
        $top3_s = $top2_s;
        $top3_sid = $top2_sid;

        $top2_s =  $top_s;
        $top2_sid =  $top_sid;

        $top_s = $last;
        $top_sid = $id_top;
      }
    else if(($top2_s <= $last) && ($last <= $top_s)){
        $top3_s = $top2_s;
        $top3_sid = $top2_sid;

        $top2_s = $last;
        $top2_sid = $id_top;
    }
    else if(($top3_s <= $last) && ($last <= $top2_s)){
        $top3_s = $last;
        $top3_sid = $id_top;
    }
}
if($row_top['types'] == 'Cartoons'){
    if($top_c <= $last){
        $top3_c = $top2_c;
        $top3_cid = $top2_cid;

        $top2_c =  $top_c;
        $top2_cid = $top_cid;

        $top_c = $last;
        $top_cid = $id_top;
      }
    else if(($top2_c <= $last) && ($last <= $top_c)){
        $top3_c = $top2_c;
        $top3_cid = $top2_cid;

        $top2_c = $last;
        $top2_cid = $id_top;
    }
    else if(($top3_c <= $last) && ($last <= $top2_c)){
        $top3_c = $last;
        $top3_cid = $id_top;
    }
}
}

?>