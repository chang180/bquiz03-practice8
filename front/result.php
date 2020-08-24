<?php $o=$Ord->find(['no'=>$_GET['no']]); ?>
感謝您的訂購，您的訂單編號是：<?=$o['no'];?><br>
電影名稱：<?=$o['name'];?><br>
日期：<?=$o['date'];?><br>
場次時間：<?=$o['session'];?><br>
座位：<br>
<?php
$seat=unserialize($o['seat']);
foreach($seat as $s) echo $s,"<br>";
?>
共<?=$o['qt'];?>張電影票<br>
<div class="ct"><button onclick="location.href='index.php'">確認</button></div>