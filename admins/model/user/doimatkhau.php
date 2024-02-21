<?php  require('../../view/header.php'); require("../../../lib/config.php");  ?>
        <div class="manager">
              
              <div class="block col-md-8">
                <h3>Đổi mật khẩu</h3>
              </div>
        </div>
<?php  

if (isset($_POST['submit'])) {
	// require("../../../lib/config.php");
	$mkc=$_POST['mkc'];
	$mkm=$_POST['mkm'];
	$qr="select * from user where password=md5('{$mkc}') and user_id=('{$_SESSION['user']}')";
    $list=mysqli_query($conn, $qr);
	if(mysql_num_rows($list)==1){
		if (trim($_POST['mkm'])!=trim($_POST['xnmk'])) {
			echo "<p class='col-md-12' style='color:red'>Mật khẩu mới không khớp</p>";
		}
		else{
			$ud="update user set password=md5(trim('{$mkm}')) where user_id=('{$_SESSION['user']}')";
			$up=mysqli_query($conn, $ud);
			echo "<p class='col-md-12' style='color:#0070ff'>Đổi mật khẩu thành công</p>";
		}
	}
	else{
		echo "<p class='col-md-12' style='color:red'>Mật khẩu cũ không đúng</p>";
	}
}
?>
        <div class="col-md-12">
          <form action="doimatkhau.php" method="post" accept-charset="utf-8" autocomplete="off">
          	<div class="form-group">
          		<label>Tên tài khoản</label>
          		<input type="text" name="" value="<?php echo $_SESSION['username']; ?>" class="form-control" disabled="off">
          	</div>
          	<div class="form-group">
          		<label>Mật khẩu cũ</label>
          		<input type="password" name="mkc" placeholder="Nhập mật khẩu cũ" class="form-control">
          	</div>
          	<div class="form-group">
          		<label>Mật khẩu mới</label>
          		<input type="password" name="mkm" class="form-control" placeholder="Mật khẩu mới" >
          	</div>
          	<div class="form-group">
          		<label>Xác nhận mật khẩu</label>
          		<input type="password" name="xnmk"  class="form-control" placeholder="Xác nhận mật khẩu">
          	</div>
          	<div class="form-group">
	          	<input type="submit" name="submit" style="border-radius: 0" class="btn btn-primary" value="Đổi mật khẩu">
          	</div>
          </form>
        </div>
      </div>
    <?php require('../../view/footer.php') ?>