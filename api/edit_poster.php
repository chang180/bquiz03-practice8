<?php
include_once "../base.php";
foreach($_POST['id'] as $key=>$id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $Poster->del($id);
    }else{
        $row=$Poster->find($id);
        $row['name']=$_POST['name'][$key];
        $row['rank']=$_POST['rank'][$key];
        $row['sh']=in_array($id,$_POST['sh'])?1:0;
        $Poster->save($row);
    }
}
$_SESSION['ani']=$_POST['ani'];
to("../admin.php?do=poster");