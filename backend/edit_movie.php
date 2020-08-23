<form action="api/add_movie.php" method="post" enctype="multipart/form-data">
<?php
$row=$Movie->find($_GET['id']);
?>
<input type="hidden" name="id"  value="<?=$row['id'];?>">
片名：<input type="text" name="name" value="<?=$row['name'];?>"><br>
分級：<select name="level">
    <?php
for($i=1;$i<=4;$i++){
    echo "<option value='$i'>$level[$i]</option>";
}
    ?>
</select><br>
片長：<input type="number" name="length"  value="<?=$row['length'];?>"><br>
上映日期：
<select name="y"><option>2020</option></select>年
<select name="m">
    <?php
for($i=1;$i<=12;$i++){
    echo "<option>$i</option>";
}
    ?>
</select>月
<select name="d">
    <?php
for($i=1;$i<=31;$i++){
    echo "<option>$i</option>";
}
    ?>
</select>日<br>
發行商：<input type="text" name="publish" value="<?=$row['publish'];?>"><br>
導演：<input type="text" name="director"  value="<?=$row['director'];?>"><br>
預告影片：<input type="file" name="trailer"><br>
電影海報：<input type="file" name="poster"><br>
電影排序：<input type="number" name="rank"  value="<?=$row['rank'];?>"><br>
顯示：(1.顯示2.不顯示) <input type="number" name="sh"  value="<?=$row['sh'];?>"><br>
劇情簡介：<textarea name="intro" style="width:500px;height:200px"><?=$row['intro'];?></textarea><br>
<button>編輯</button><button type="reset">重置</button>
</form>