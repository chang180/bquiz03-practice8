<?php
include_once "../base.php";
$_POST['qt']=count($_POST['seat']);
$_POST['seat']=serialize($_POST['seat']);
$mno=$Ord->q("SELECT MAX(no) FROM ord ")[0][0]+1;
$_POST['no']=$mno;
$Ord->save($_POST);
echo $mno;