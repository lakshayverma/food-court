<?php
$a=$_GET["id"];
include_once("connect.php");
$qu="delete from combopack where cid=$a";
mysqli_query($conn,$qu) or die(mysqli_error($conn));
header("location:vcombo.php");

?>