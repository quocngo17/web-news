<?php  
require("../../../lib/config.php");
$id=$_GET['id'];
mysqli_query($conn, "delete from categorie where cate_id=$id ");
header("location:list_theloai.php");
?>