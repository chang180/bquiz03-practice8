<?php
include_once "../base.php";
$orders=$Ord->all($_POST);
$seat=[];
foreach($orders as $o){
    $seat=array_merge($seat,unserialize($o['seat']));
}
for($i=1;$i<=20;$i++){
    if(in_array($i,$seat)){
        echo "<img src='icon/03D03.png'>&nbsp;&nbsp;";
    }else{
        echo "<img src='icon/03D02.png'><input type='checkbox' class='seat' value='$i'>";
    }
    if($i%5==0) echo "<br>";
}