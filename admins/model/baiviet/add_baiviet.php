<?php require('../../view/header.php'); require("../../../lib/config.php"); 

$loi=array();
$loi["title"]=$loi["image"]=$loi["intro"]=$loi["noidung"]=$loi["ngay"]=$loi["an"]=NULL;
$tieude=$image=$intro=$noidung=$ngay=$ah=NULL;
if (isset($_POST["ok"])) {
  //lấy id lựa chọn
   $cate_id=$_POST["txtchuyenmuc"];
  //kiểm tra nhập tiêu đè chưa
  if (empty($_POST["txttieude"])) {
    $loi["title"]="*Vui lòng nhạp tiêu đề<br/>";
  }
  else{
     $tieude=addslashes($_POST["txttieude"]);
  }
  //kt chon hình ảnh hay chưa
  if ($_FILES["image"]["error"]>0) {
    $loi["image"]="*vui lòng chọn file ảnh<br/>";

  }
  else{
    $image=$_FILES["image"]["name"];
  }
  //kt nhập mô tả hay chưa
  if (empty($_POST["txtmota"])) {
    $loi["intro"]="*vui lòng nhập mô tả<br/>";
  }
  else{
    $intro=addslashes($_POST["txtmota"]);
  }
  //kt nhập noi dung
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
 
  if ($tieude && $image && $intro && $noidung && $ngay && $ah) {
    mysqli_query($conn,"insert into news(title,images,intro,content,cate_id,solanxem,date,anhien,user_id) value('$tieude','$image','$intro','$noidung','$cate_id','1','$ngay','$ah','$_SESSION[username]')");
    move_uploaded_file($_FILES['image']['tmp_name'], '../../../images/baiviet/'.$_FILES['image']['name']);

    mysqli_close($conn);
  }
  
  
}

?>
        <div class="manager">
              
              <div class="block col-md-8">
                <h3>Thêm mới</h3>
              </div>
              <div class="clearfix"></div>
        </div>
        <div class="col-md-12 add-product" style="margin-bottom: 15px">
          <form action="add_baiviet.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <label>Thể loại</label>
            <select name="txtchuyenmuc" class="form-control">
              <?php
              $kq=mysqli_query($conn,"select cate_id,cate_title from categorie");
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
            <textarea  name="txtnoidung" placeholder="Nhập chi tiết" class="form-control" style="margin-bottom: 15px"></textarea>
            <script type="text/javascript">CKEDITOR.replace( 'txtnoidung' );</script>
            <label>Ẩn / Hiện bài viết</label>
            <select class="form-control" name="ah">
              <option value="1">Hiện</option>
              <option value="2">Ẩn</option>
            </select>
            <label>Ngày đăng</label>
            <input type="date" name="ngay" class="form-control">
            <input type="submit" name="ok" value="Thêm mới" class="btn submit btn-primary text-center ">
          </form>
        </div>
      </div>
  <?php require('../../view/footer.php') ?>