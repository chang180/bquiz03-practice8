<?php
include_once "../base.php";
$Ord->del($_GET['id']);
to("../admin.php?do=order");