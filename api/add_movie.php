<?php
include_once "../base.php";
$_POST['date']=$_POST['y']."_".$_POST['m']."_".$_POST['d'];
unset($_POST['y'],$_POST['m'],$_POST['d']);
move_uploaded_file($_FILES['poster']['tmp_name'],"../img/".$_FILES['poster']['name']);
move_uploaded_file($_FILES['trailer']['tmp_name'],"../img/".$_FILES['trailer']['name']);
$_POST['poster']=$_FILES['poster']['name'];
$_POST['trailer']=$_FILES['trailer']['name'];
$rank=($Movie->q("SELECT MAX(rank) from movie ")[0][0]+1)??"1";
$_POST['rank']=$rank;
$Movie->save($_POST);
to("../admin.php?do=movie");