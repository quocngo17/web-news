<?php  
require("../../../lib/config.php");
$id = $_GET['id'];
	$qr=mysqli_query($conn,"delete from news where news_id=$id");
	header('location:http://localhost:81/webtintuc.com/admins/model/baiviet/list_baiviet.php');

?>