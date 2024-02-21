<?php 
require("../../../lib/config.php");
$id=$_GET['id'];
$qr="delete from user where user_id=$id";
mysqli_query($conn, $qr);
header("location:list_user.php");








 ?>