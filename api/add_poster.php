<?php
include_once "../base.php";
move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
$_POST['img']=$_FILES['img']['name'];
$_POST['sh']=1;
$rank=($Poster->q("SELECT MAX(rank) from poster ")[0][0]+1)??"1";
$_POST['rank']=$rank;
$Poster->save($_POST);
to("../admin.php?do=poster");