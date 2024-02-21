<?php  require('../../view/header.php'); require("../../../lib/config.php");  ?>
        <div class="manager">
              
              <div class="block col-md-8">
                <h3>Quản lý thể loại</h3>
              </div>
              <div class="col-md-4 ">
                <div class="add-delete">
                <a href="http://localhost:81/webtintuc.com/admins/model/theloai/add_theloai.php" class="add"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="" class="delete"><i class="fa fa-trash-o"></i> Xóa</a>
                </div>
              </div>
        </div>

        <div class="col-md-12">
          <table class="table table-bordered table-hover text-center col-md-12" >
          <thead >
            <tr >
              <th class="text-center" width="60"><input id="checkAll" class="second" type="checkbox" name="second"></th>
              <th class="text-center" width="60">STT</th>
              <th class="text-center" >Thể loại</th>
              <th class="text-center" width="100">Ẩn / Hiện</th>
              <th class="text-center" width="90">Sửa / Xóa</th>
            </tr>
          </thead>
          <tbody>
          <?php  
          $qr="select * from categorie";
          $list=mysqli_query($conn, $qr);
          $stt=1;
          while ($row_theloai=mysqli_fetch_assoc($list)) {
          
          ?>
            <tr>
              <td><input id="checkAll" class="second" type="checkbox" name="second"></td>
              <td><?php echo $stt ?></td>
              <td><?php echo $row_theloai['cate_title'] ?></td>
              <td><?php if ($row_theloai['an_hien']==1) {
                echo "<span>Hiện</span>";
              }
              else{
                echo "<span>Ẩn</span>";
                } ?></td>
              <td><a href="http://localhost:81/webtintuc.com/admins/model/theloai/edit_theloai.php?id=<?php echo $row_theloai['cate_id'] ?>" title="Sửa" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="http://localhost:81/webtintuc.com/admins/model/theloai/delete_theloai.php?id=<?php echo $row_theloai['cate_id'] ?>" title="Xóa" class='xoa' style="color:red"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
            <?php $stt++; } ?>
          </tbody>
        </table>
        </div>
      </div>
    <?php require('../../view/footer.php') ?>