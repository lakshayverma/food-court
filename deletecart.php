<?php
$a=$_GET["id"];
include_once("connect.php");
$qu="delete from cart where cartid=$a";
mysqli_query($conn,$qu) or die(mysqli_error($conn));
header("location:showcart.php");
?>