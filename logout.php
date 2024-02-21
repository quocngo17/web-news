<?php
session_start();
//hủy
session_destroy();
header("location:dang-nhap.html");
exit();
?>