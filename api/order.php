<?php
include_once "../base.php";
$_POST['qt']=count($_POST['seat']);
$_POST['seat']=serialize($_POST['seat']);
$id=$Ord->q("SELECT MAX(id) FROM ord ")[0][0]+1;
$mno=date("Ymd").sprintf("%04d",$id);
$_POST['no']=$mno;
$Ord->save($_POST);
echo $mno;