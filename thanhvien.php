<?php require('header.php'); require("lib/config.php");  ?>


<?php 





if (isset($_POST['submit'])) {
    if (!empty($matkhaucu=$_POST['password'])) {
        echo $matkhaucu=$_POST['password'];
    }
    if (!empty($matkhamoi=$_POST['password_new'])) {
        echo $matkhamoi=$_POST['password_new'];
    }
    if (!empty($ktmatkhau=$_POST['password_new_us'])) {
        echo $ktmatkhau=$_POST['password_new_us'];
    }
    if ($matkhaucu && $matkhamoi && $ktmatkhau) {
        $qr="update user set ";
    }
}
 ?>


<div class="block-main">
    <div class="container" style="width: 1000px">
      <div class="row">
        <div class="col-md-12" style="border: 1px solid #CCC;margin: 15px 0px">
         	 <div class="manager">
                <div class="block">
                  <h4 class="text-center">Thành viên</h4>
                </div>
                <div class="clearfix"></div>
                <table class="table table-hover table-bordered">
                	<thead>
                		<tr>
                			<th class="text-center">Cấp độ</th>
                			<th class="text-center">Tên tài khoản</th>
                			<th class="text-center">Email</th>
                		</tr>
                	</thead>
                	<tbody class="text-center">
                	<?php  
                	$qr="select * from user";
                	$user=mysqli_query($conn, $qr);
                	if (mysql_num_rows($user)>0) {
                		$row=mysqli_fetch_assoc($user);
                		# code...
                	}
                	?>
                		<tr>
                			<td><?php echo "Thành viên"; ?></td>
                			<td><?php echo $row['username'] ?></td>
                			<td><?php echo $row['email'] ?></td>
                		</tr>
                	</tbody>
                </table>
                <div class="edit_user">
                <h4>Đổi mật khẩu</h4>
                	<form action="thanhvien.php" method="post" accept-charset="utf-8">
                		<div class="form-group">
                			<label>Tên tài khoản</label>
                			<input type="text" name="user" class="form-control" value="<?php echo $_SESSION['username'] ?>" disabled="disabled">
                		</div>
                		<div class="form-group">
                			<label>Mật khẩu cũ</label>
                			<input type="password" name="password" autocomplete="off" class="form-control">
                		</div>
                		<div class="form-group">
                			<label>Mật khẩu mới</label>
                			<input type="password" name="password_new" autocomplete="off" class="form-control">
                		</div>
                		<div class="form-group">
                			<label>Nhập lại mật khẩu mới</label>
                			<input type="password" name="password_new_us" autocomplete="off" class="form-control">
                		</div>
                		<div class="form-group">
                			<input type="submit" name="submit" class="btn btn-primary" value="Đổi mật khẩu">
                		</div>
                	</form>
                </div>
                <style type="text/css">
                	.edit_user .form-group input{
                		border-radius: 0
                	}
                </style>
          	</div>
      	</div>
      </div>
    </div>
</div>
  <?php require('footer.php') ?>