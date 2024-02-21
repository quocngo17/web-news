<?php 
session_start();
$er=array();
$user=$pass=NULL;
$er["user"]=$er["pass"]=$er["login"]=NULL;
$link="http://localhost:81/webtintuc.com/";


// đổi lại link
if (isset($_POST["ok"])) {
	if (empty($_POST["txtuser"])) {
		$er["user"]="*Vui lòng nhập username";
	}
	else{
		$user=addslashes($_POST["txtuser"]);
	}
	if (empty($_POST["txtpass"])) {
		$er["pass"]="*Vui lòng nhập password";
	}
	else{
		$pass=addslashes(md5($_POST["txtpass"]));
	}
	//xử lý đăng nhập
	if ($user && $pass) {
		//kết nối csdl
		require("lib/config.php");
		//truy vấn dưc liệu
		$result=mysqli_query($conn,"select * from user where username='$user' and password='$pass'");
		
		if(mysqli_num_rows($result)==1) {
			$data=mysqli_fetch_assoc($result);
			
			$_SESSION["level"]=$data["level"];
			if ($_SESSION["level"]==2) {
				$_SESSION['username']=$user;
				$_SESSION['user']=$data['user_id'];
				header("location:admins/index.php");
				exit();
			}
			else{
			$_SESSION['username']=$user;
			header("location:index.html");
			exit();
			}
		}
		else
		{
			$er["login"]="*Bạn đã nhập sai tài khoản hoặc mật khẩu";
		}
	//đóng csdl
	mysqli_close($conn);
	}

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
    <link rel="icon" href="<?php echo $link ?>images/logoad.png"/>
 	<link rel="stylesheet" href="<?php echo $link ?>css/bootstrap.css">

 	<link rel="stylesheet" href="<?php echo $link ?>css/css.css">
</head>
<body>

	
	<div class="container">
		<div class="col-md-4 col-md-offset-4 login">
			<h3 class="text-center" style="color: #337ab7;font-weight: bold">ĐĂNG NHẬP</h3>
			<div class="logo-icon">
				<img src="<?php echo $link ?>images/male.png" alt="" class="img-responsive">
			</div>
			<p style="height: 30px;width: 100%;color: red;margin-bottom: 0;line-height: 30px"><?php echo $er["login"] ?></p>
			<form action="<?php echo $link ?>dang-nhap.html" method="post" accept-charset="utf-8">
					<input type="text" name="txtuser" class="text" required   minlength="5" maxlength="25" placeholder="Nhập tài khoản">
					<input type="password" name="txtpass" required   minlength="8" maxlength="25" class="text" placeholder="Nhập mật khẩu">
					<input type="submit" name="ok" value="Đăng nhập">
			</form>
			<div class="text-center" style="margin-bottom: 15px">
				<a href="<?php echo $link ?>dang-ky.html">Đăng ký tại đây</a><span> | </span>
				<a href="<?php echo $link ?>">Về trang chủ</a>
			</div>
		</div>
	</div>
</body>
</html>


