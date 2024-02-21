<?php ob_start(); require('../../view/header.php'); require("../../../lib/config.php"); 
$id=$_GET['id'];
$loi=array();
$loi["title"]=$loi["image"]=$loi["intro"]=$loi["noidung"]=$loi["ngay"]=$loi["an"]=NULL;
$tieude=$image=$intro=$noidung=$ngay=$ah=NULL;
if (isset($_POST["ok"])) {
   $cate_id=$_POST["txtchuyenmuc"];
  if (empty($_POST["txttieude"])) {
    $loi["title"]="*Vui lòng nhạp tiêu đề<br/>";
  }
  else{
     $tieude=addslashes($_POST["txttieude"]);
  }
	if ($_FILES['image']['error'] > 0)
	{
		$image ="none";
	}
	else{
		$image=$_FILES['image']['name'];
	}
  if (empty($_POST["txtmota"])) {
    $loi["intro"]="*vui lòng nhập mô tả<br/>";
  }
  else{
    $intro=addslashes($_POST["txtmota"]);
  }
  if (empty($_POST["txtnoidung"])) {
    $loi["noidung"]="*vui lòng nhập nội dung<br/>";
  }
  else{
    $noidung=addslashes($_POST["txtnoidung"]);
  }

  if (empty($_POST["ah"])) {
    $loi["an"]="*vui lòng nhập nội dung<br/>";
  }
  else{
    $ah=addslashes($_POST["ah"]);
  }
  if (empty($_POST["ngay"])) {
    $loi["ngay"]="*vui lòng nhập nội dung<br/>";
  }
  else{
    $ngay=$_POST["ngay"];
  }
  if ($tieude | $image | $intro | $noidung | $ngay | $ah) {
		if ($image=='none') {
			$up_qr="UPDATE news SET title='$tieude', intro='$intro', content='$noidung', cate_id='$cate_id', date='$ngay', anhien=$ah where news_id=$id ";
				$update=mysqli_query($conn,$up_qr);
				header("location:list_baiviet.php");
		}
		else{
			$up_qr="UPDATE news SET title='$tieude', images='$image', intro='$intro', content='$noidung', cate_id='$cate_id', date='$ngay', anhien=$ah where news_id=$id";
				$update=mysqli_query($conn,$up_qr);
				header("location:list_baiviet.php");
				move_uploaded_file($_FILES['image']['tmp_name'], '../../../images/baiviet/'.$_FILES['image']['name']);
		}

}}
$qr="select * from news where news_id=$id";
$list=mysqli_query($conn,$qr);
$row_baiviet=mysqli_fetch_assoc($list);
?>
        <div class="manager">
              
              <div class="block col-md-8">
                <h3>Chỉnh sửa bài viết</h3>
              </div>
              <div class="clearfix"></div>
        </div>
        <div class="col-md-12 add-product" style="margin-bottom: 15px">
          <form action="edit_baiviet.php?id=<?php echo $id ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <label>Thể loại</label>
            <select name="txtchuyenmuc" class="form-control">
              <?php
              $kq=mysqli_query($conn,"select cate_id,cate_title from categorie");
              while($data=mysqli_fetch_assoc($kq)){
              		if ($row_baiviet['cate_id']==$data['cate_id']) {
              			echo"<option value='$data[cate_id]' selected='selected'>$data[cate_title]</option>";
              		}
              		else{
              			echo"<option value='$data[cate_id]'>$data[cate_title]</option>";
              		}
                  
              }
              mysqli_close($conn);
                  ?>
            </select>
            <label>Tiêu đề</label>
            <input type="text" value="<?php echo $row_baiviet['title'] ?>" name="txttieude" class="form-control">
            <label>Hình ảnh</label>
            <input type="file" name="image" value="" class="form-control">
            <img width="100" src="../../../images/baiviet/<?php echo $row_baiviet['images'] ?>" alt=""><br>
            <label>Mô tả</label>
            <textarea  name="txtmota" class="form-control"><?php echo $row_baiviet['intro'] ?></textarea>
            <label>Chi tiết bài viết</label>
            <textarea  name="txtnoidung" placeholder="Nhập chi tiết" class="form-control" style="margin-bottom: 15px"><?php echo $row_baiviet['content'] ?></textarea>
            <script type="text/javascript">CKEDITOR.replace( 'txtnoidung' );</script>
            <label>Ẩn / Hiện bài viết</label>
            <select class="form-control" name="ah">
              <option value="1">Hiện</option>
              <option value="2">Ẩn</option>
            </select>
            <label>Ngày đăng</label>
            <input type="date" name="ngay" value="<?php echo $row_baiviet['date'] ?>" class="form-control">
            <input type="submit" name="ok" value="Chỉnh sửa" class="btn submit btn-primary text-center ">
          </form>
        </div>
      </div>
  <?php require('../../view/footer.php'); ob_end_flush(); ?>