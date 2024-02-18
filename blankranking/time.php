
<?php
function duration($begin,$end){

    $remain=intval(strtotime($end)-strtotime($begin));
    $year=floor($remain/31104000);
    $l_year=$remain%31104000;
    $month=floor($l_year/2592000);
    $l_month=$l_year%2592000;
    $wan=floor($l_month/86400);
    $l_wan=$l_month%86400;
    $hour=floor($l_wan/3600);
    $l_hour=$l_wan%3600;
    $minute=floor($l_hour/60);
    $second=$l_hour%60;

    if($year >= 1){
        return $year." ปีที่แล้ว";
    }
    else if($month >= 1){
        return $month." เดือนที่แล้ว";

    }
    else if($wan >= 1){
        return $wan." วันที่แล้ว";

    }
    else if($hour >= 1){
        return $hour." ชั่วโมงที่แล้ว";

    }
    else if($minute >= 1){
        return $minute." นาทีที่แล้ว";

    }
    else {
        return $second." วินาทีที่แล้ว";
    }
}
?>