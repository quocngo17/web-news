<?php  require('../../view/header.php'); require("../../../lib/config.php");  ?>
        <div class="manager">
              
              <div class="block col-md-8">
                <h3>Quản lý thành viên</h3>
              </div>
              <div class="col-md-4 ">
                <div class="add-delete">
                <a href="" class="add"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="" class="delete"><i class="fa fa-trash-o"></i> Xóa</a>
                </div>
              </div>
        </div>

        <div class="col-md-12">
          <table class="table table-bordered table-hover text-center col-md-12">
          <thead >
            <tr >
              <th class="text-center" width="60"><input id="checkAll" class="second" type="checkbox" name="second"></th>
              <th class="text-center" width="60">STT</th>
              <th class="text-center" >Tên tài khoản</th>
              <th class="text-center" >Email</th>
              <th class="text-center" width="100">Level</th>
              <th class="text-center" width="90">Sửa / Xóa</th>
            </tr>
          </thead>
          <tbody>
          <?php  
          $qr="select * from user";
          $list=mysqli_query($conn, $qr);
          $stt=1;
          while ($row_user=mysqli_fetch_assoc($list)) {
          
          ?>
            <tr>
              <td><input id="checkAll" class="second" type="checkbox" name="second"></td>
              <td><?php echo $stt ?></td>
              <td><?php echo $row_user['username'] ?></td>
              <td><?php echo $row_user['email']?></td>
              <td><?php if ($row_user['level']==1) {
                echo "Thành viên";
              } else{
                echo "Admin";
                }?></td>
              <td><a href="http://localhost:81/webtintuc.com/admins/model/user/edit_user.php?id=<?php echo $row_user['user_id'] ?>" title="Sửa" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="http://localhost:81/webtintuc.com/admins/model/user/delete_user.php?id=<?php echo $row_user['user_id'] ?>" title="Xóa" class='xoa' style="color:red"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
            <?php $stt++; } ?>
          </tbody>
        </table>
        </div>
      </div>
    <?php require('../../view/footer.php') ?>