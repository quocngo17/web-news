<?php  
ob_start();
require("../../view/header.php"); 
require("../../../lib/config.php"); 
$id=$_GET['id'];
$loi=array();
$loi["catename"]=$loi["ah"]=NULL;
$catename=$ah=NULL;
	if (isset($_POST["ok"])) {
		if (empty($_POST["catename"])) {
			$loi["catename"]="*xin nhập tên chuyên mục";
		}
		else{
			$catename=$_POST["catename"];
		}
		if (empty($_POST["ah"])) {	
			$loi["ah"]="*xin nhập tên chuyên mục";
		}
		else{
			$ah=$_POST["ah"];
		}
		if ($catename && $ah) {
			mysqli_query($conn, "update categorie set cate_title='$catename',an_hien='$ah' where cate_id=$id");
			header('location:http://localhost:81/webtintuc.com/admins/model/theloai/list_theloai.php');
		}
	}
	$qr="select * from categorie where cate_id=$id";
	$theloai=mysqli_query($conn, $qr);
	$row_theloai=mysqli_fetch_assoc($theloai);
?>
        <div class="manager">
              <div class="block col-md-8">
                <h3>Chỉnh sửa</h3>
              </div>
              <div class="clearfix"></div>
        </div>
        <div class="col-md-12 add-product" style="margin-bottom: 15px">
          <form action="edit_theloai.php?id=<?php echo $id ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <label>Thể loại</label>
            <input type="text" value="<?php echo $row_theloai['cate_title'] ?>" name="catename" class="form-control">
            <label>Ẩn / Hiện</label>
            <select class="form-control" name="ah">
              <option value="1">Hiện</option>
              <option value="2">Ẩn</option>
            </select>
            <input type="submit" name="ok" value="Chỉnh sửa" class="btn submit btn-primary text-center ">
          </form>
        </div>
      </div>
  <?php require('../../view/footer.php') ;
ob_flush();
  ?>