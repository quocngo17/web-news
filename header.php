<?php 
session_start();
require('function.php');
$link="http://localhost:81/webtintuc.com/";

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php if (isset($id)) {
	require('lib/config.php');
	$qr="select * from news where news_id=$id";
	$title= mysqli_query($conn, $qr);
	$row_title=mysqli_fetch_assoc($title);

echo "<title> $row_title[title] </title>";
}
else{
	echo "<title>Trang chủ- Tin tức mới nhất trong ngày</title>";
}

 ?>
 
<link rel="icon" href="<?php echo $link ?>image/logoad.png"/>
<link rel="stylesheet" type="text/css" href="<?php echo $link ?>css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $link ?>css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $link ?>css/css.css"/>
<style>
	.btn-top {
    bottom: 0px;
    cursor: pointer;
    display: none;
    height: 50px;
    outline: medium none;
    padding: 0;
    position: fixed;
    right: 0px;
    width: 50px;
    z-index: 9999;
    /* border-radius: 50%; */
}
</style>

<script type="text/javascript" src="<?php echo $link ?>js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo $link ?>js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo $link ?>js/jquery.bpopup.min.js"></script>

</head>

<body>
		<div class="bl-header">
			
			<div class="container" style="border: 1px solid #CCC;width: 1000px;padding: 0">
					<div class="col-md-12 top">
						<div class="col-md-8">
							<span class="fa fa-phone"> 0968361675</span>
							<span> | </span>
							<span class="fa fa-envelope-o"> ngoconghau96@gmail.com</span>
						</div>
						<!-- icon -->

						<div class="rg-lg">
							<ul>
								<?php 
								  	if (isset($_SESSION['username'])) {
								  		if ($_SESSION['level']==2) {
								  			echo "<li ><a href='".$link."admins/index.php'><i clas='fa fa-user'></i> Xin chào : ". $_SESSION['username'] . " </a></li>";
								  		}
								  		else{
								  			echo "<li ><a href='".$link."thanhvien.php'><i clas='fa fa-user'></i> Hello : ". $_SESSION['username'] . " </a></li>";
								  			echo "<li><a href=''>|</a></li>";
								  			echo "<li><a href='".$link."dang-bai-thanh-vien.html'>Đăng bài</a></li>";
								  		}
								  		echo "<li><a href=''>|</a></li>";
								  		echo "<li><a href='".$link."logout.php'>Thoát</a>";
								  	}
								  	else{
								  		echo"<li><a href='".$link."dang-ky.html'>Đăng ký</a></li>";
										echo"<li><a href=''>|</a></li>";
										echo"<li><a href='".$link."dang-nhap.html'>Đăng nhập</a></li>";
								  	}
								?>
								

							</ul>
						</div>
					</div>
	            	<div class="col-md-3">
	                	<a  href="<?php echo $link ?>"><img style="padding-top:20px" src="<?php echo $link ?>images/Bao-Tin-Tuc-logo.png" /></a>
	                </div>
	                <div class="col-md-9">
	                	<img src="<?php echo $link ?>images/2015-11-28-02-38-32banner-tin-tuc.jpg" width="100%" height="100" style="margin-bottom: 15px; margin-top:15px" />
	                </div>
	        </div>
	    </div>
        <!-- header -->
        <div class="container bl-menu" style="width: 1000px">
			<div class="menu-home">
			      <ul>
			      <li ><a href="<?php echo $link ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
			      <?php
			      require("lib/config.php");
			      $result=mysqli_query($conn,"select cate_id,cate_title from categorie where an_hien=1");
			      while($data=mysqli_fetch_assoc($result)){
			      	$url=format_url($data['cate_title']);
				        echo"<li><a href='".$link."chuyenmuc/$url-$data[cate_id].html'>$data[cate_title]</a></li>";
				   }
				  ?> 	
				 	
			      </ul>
			</div>
		</div>
		<!-- bl-menu -->