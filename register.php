
<?php  
$loi=array();
$loi["user"]=$loi["pass"]=$loi["email"]=$loi["register"]=NULL;
$user=$pass=$email=NULL;
$link="http://localhost:81/webtintuc.com/";

if (isset($_POST["dk"])) {
	if (empty($_POST["txtuser"])) {
		$loi["user"]="*Vui lòng nhập username";
	}
	else{
		$user=addslashes($_POST["txtuser"]);
	}
	if (empty($_POST["txtpass"])) {
		$loi["pass"]="*Vui lòng nhập password";
	}
	else{
		$pass=addslashes(md5($_POST["txtpass"]));
	}
	if (empty($_POST["txtemail"])) {
		$loi["email"]="*Vui lòng nhập email";
	}
	else{
		$email=addslashes($_POST["txtemail"]);
	}
	
	if($user && $pass && $email) {
		//kết nối csdl
		require("lib/config.php");
		//truy vấn dữ liệu
		$result=mysqli_query($conn,"select * from user where username='$user' ");
		if(mysqli_num_rows($result)==0){
		mysqli_query($conn,"insert into user (username,password,email,level) value('$user','$pass','$email','1')");
		$loi["register"]="Đăng ký thành công";

	}else{
		$loi["register"]="Username đã tồn tại";
	}

		//ngắt kết nối
		mysqli_close($conn);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng ký</title>
    <link rel="icon" href="<?php echo $link ?>images/logoad.png"/>
 	<link rel="stylesheet" href="<?php echo $link ?>css/bootstrap.css">

 	<link rel="stylesheet" href="<?php echo $link ?>css/css.css">
	<script type="text/javascript" src="<?php echo $link ?>js/jquery-3.1.1.min.js"></script>
 	<script>
	// var number=10;
	// function demnguoc(){
	// 	number=number-1;
	// 	if (number!=0) {
	// 		document.getElementById('texbox').value=number;
	// 		setTimeout("demnguoc()",1000);
	// 	}
	// 	else{
	// 		window.location.href="index.html";
	// 	}
	// }
	// demnguoc();
</script>
</head>
<body>

	<!-- nguoc <input type="text" name="" id="texbox"> -->
	<div class="container">
		<div class="col-md-4 col-md-offset-4 login">
			<h3 class="text-center" style="color: #337ab7;font-weight: bold">ĐĂNG KÝ</h3>
			<div class="logo-icon">
				<img src="<?php echo $link ?>images/male.png" alt="" class="img-responsive">
			</div>
			<p style="height: 30px;width: 100%;color: red;margin-bottom: 0;line-height: 30px"><?php echo $loi["register"] ?></p>
			<form action="<?php echo $link ?>dang-ky.html" method="post" accept-charset="utf-8">
					<input type="text" name="txtuser" class="text" minlength="5" required  placeholder="Nhập username">
					<input type="password" name="txtpass" class="text" minlength="5" required  placeholder="Nhập password">
					<input type="email" name="txtemail" class="text" required pattern="[^@]+@gmail+\.com" placeholder="Nhập email">
					<input type="submit" name="dk" value="Đăng ký">
			</form>
			<div class="text-center" style="margin-bottom: 15px">
				<a href="<?php echo $link ?>dang-nhap.html">Đăng nhập tại đây</a><span> | </span>
				<a href="<?php echo $link ?>">Về trang chủ</a>
			</div>
		</div>
	</div>
</body>
</html>