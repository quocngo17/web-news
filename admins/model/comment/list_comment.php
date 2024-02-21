<?php  require('../../view/header.php'); require("../../../lib/config.php");  ?>
        <div class="manager">
              
              <div class="block col-md-8">
                <h3>Quản lý bình luận</h3>
              </div>
         
        </div>

        <div class="col-md-12">
          <table class="table table-bordered table-hover text-center col-md-12">
          <thead >
            <tr >
              <th class="text-center" width="60"><input id="checkAll" class="second" type="checkbox" name="second"></th>
              <th class="text-center" width="60">STT</th>
              <th class="text-center" width="150" >Thành viên</th>
              <th class="text-center" >Nội dung bình luận</th>
              <th class="text-center" width="150">Bình luận bài viết</th>
              <th class="text-center" width="90"> Xóa</th>
            </tr>
          </thead>

          <tbody>
          <?php  
          $qr="select * from comment";
          $list=mysqli_query($conn,$qr);
          $stt=1;
          while ($row_comment=mysqli_fetch_assoc($list)) {
          
          ?>
            <tr>
              <td><input id="checkAll" class="second" type="checkbox" name="second"></td>
              <td><?php echo $stt ?></td>
              <td><?php echo $row_comment['name'] ?></td>
              <td><?php echo $row_comment['message']?></td>
              <td><a href="http://localhost:81/webtintuc.com/details.php?id=<?php echo $row_comment['news_id'] ?>" target="b_lankd">Xem bài viết</a></td>
              <td> <a href="http://localhost:81/webtintuc.com/admins/model/comment/delete_comment.php?id=<?php echo $row_comment['cm_id'] ?>" title="Xóa" class='xoa' style="color:red"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
            <?php $stt++; } ?>
          </tbody>
        </table>
        </div>
      </div>
    <?php require('../../view/footer.php') ?>