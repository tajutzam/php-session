<?php
require_once "../database/koneksi.php";
$id=$_GET['id'];
$query = "delete from user_detail where id=$id";
mysqli_query($connect , $query) or die(mysqli_error);

header("Location:sb/index.php");