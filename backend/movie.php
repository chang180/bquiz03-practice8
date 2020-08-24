<a href="?do=add_movie"><button>新增電影</button></a>
<hr>
<?php
$movies=$Movie->all([]," ORDER BY rank DESC");
foreach($movies as $m){
?>
<div style="display:flex">
<div><img src="img/<?=$m['poster'];?>" style="width:68px;height:100px"></div>
<div>分級：<img src="icon/<?=$m['level'];?>.png"></div>
<div>
<div>片名：<?=$m['name'];?> 片長：<?=$m['length'];?> 上映時間：<?=$m['date'];?></div>
<div>
    排序：<?=$m['rank'];?>顯示：<?=$m['sh'];?>
    <a href="?do=edit_movie&id=<?=$m['id'];?>"><button>編輯電影</button></a>
    <a href="api/del_movie.php?id=<?=$m['id'];?>"><button>刪除電影</button></a>
</div>
<div>劇情簡介：<?=$m['intro'];?></div>

</div>
</div>
<hr>


<?php } ?>