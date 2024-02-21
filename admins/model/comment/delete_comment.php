<?php 
require("../../../lib/config.php");
$id=$_GET['id'];
mysqli_query($conn,"delete from comment where cm_id=$id");
header("location:list_comment.php");



 ?>