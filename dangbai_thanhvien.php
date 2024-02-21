<?php require('header.php'); require("lib/config.php"); 

$loi=array();
$loi["title"]=$loi["image"]=$loi["intro"]=$loi["noidung"]=$loi["ngay"]=$loi["dang"]=NULL;
$tieude=$image=$intro=$noidung=$ngay=$ah=NULL;
if (isset($_POST["ok"])) {
   $cate_id=$_POST["txtchuyenmuc"];
  if (empty($_POST["txttieude"])) {
    $loi["title"]="*Vui lòng nhạp tiêu đề<br/>";
  }
  else{
     $tieude=addslashes($_POST["txttieude"]);
  }
  if ($_FILES["image"]["error"]>0) {
    $loi["image"]="*vui lòng chọn file ảnh<br/>";
  }
  else{
    $image=$_FILES["image"]["name"];
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
  if (empty($_POST["ngay"])) {
    $loi["ngay"]="*vui lòng nhập nội dung<br/>";
  }
  else{
    $ngay=$_POST["ngay"];
  }
  
  if ($tieude && $image && $intro && $noidung && $ngay) {
    mysqli_query($conn, "insert into news(title,images,intro,content,cate_id,solanxem,date,anhien,nguoidang) value('$tieude','$image','$intro','$noidung','$cate_id','1','$ngay','2','$_SESSION[username]')");
    move_uploaded_file($_FILES['image']['tmp_name'], 'images/baiviet/'.$_FILES['image']['name']);
mysql_close($conn);
    echo "<script>alert('Chờ kiểm duyệt của admin')</script>";
  }
  else{
    $loi["dang"]="Đăng bài không thành công";
  }
  
}

?>
<style type="text/css">
  .add-product form .form-control{
    border-radius: 0;
    margin-top: 5px;
    margin-bottom: 10px
  }
</style>
  <script src="http://localhost:81/admins/ckeditor/ckeditor.js"></script>
<div class="block-main">
    <div class="container" style="width: 1000px">
      <div class="row">
        <div class="col-md-12" style="border: 1px solid #CCC;margin: 15px 0px">
          <div class="manager">
                <div class="block col-md-8">
                  <h3>Đăng bài viết</h3>
                  <span style="color: red;margin-bottom: 10px"><?php echo $loi["dang"] ?></span>
                </div>
                <div class="clearfix"></div>
          </div>
          <div class="col-md-12 add-product" style="margin-bottom: 15px">
              <form action="dang-bai-thanh-vien.html" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <label>Thể loại</label>
                <select name="txtchuyenmuc" class="form-control">
                  <?php
                  $kq=mysqli_query($conn, "select cate_id,cate_title from categorie");
                  while($data=mysqli_fetch_assoc($kq)){
                      echo"<option value='$data[cate_id]'>$data[cate_title]</option>";
                      }
                  ?>
                </select>
                <label>Tiêu đề</label>
                <input type="text" placeholder="* Nhập tiêu để" name="txttieude" class="form-control">
                <label>Hình ảnh</label>
                <input type="file" name="image"  class="form-control">
                <label>Mô tả</label>
                <input type="text"  placeholder="* Nhập mô tả" name="txtmota" class="form-control">
                <label>Chi tiết bài viết</label>
                <textarea  name="txtnoidung" placeholder="Nhập chi tiết" class="form-control"></textarea>
                <script type="text/javascript">CKEDITOR.replace( 'txtnoidung' );</script>
                <label>Ngày đăng</label>
                <input type="date" name="ngay" class="form-control">
                <input type="submit" name="ok" value="Đăng bài" class="btn submit btn-primary text-center " style="margin-top: 15px">
              </form>
          </div>
      </div>
      </div>
      </div>
      </div>
  <?php require('footer.php') ?>