<?php  require('../../view/header.php'); require("../../../lib/config.php");  ?>


<script type="text/javascript">
  $(document).ready(function(){
    $('.txtsearch').keyup(function(){
      var txt = $('.txtsearch').val();
      $.post('search.php', {data: txt}, function(data) {
        $('.show_list').html(data);
      });

    })
  })
</script>
        <div class="manager">
              <?php  
                $qr="select * from news";
                $count=mysqli_query($conn,$qr);
                $count_qr=mysqli_num_rows($count);
              ?>
              <div class="block col-md-8">
                <h3 style="padding-right: 15px">Quản lý bài viết &nbsp;<span style="background: rgb(57, 57, 78);
    color: #FFF;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    font-size: 13px;
    /* display: inline-block; */
    position: absolute;
    line-height: 30px;
    text-align: center;"><?php echo $count_qr ?></span></h3>
              </div>
              <div class="col-md-4 ">
                <div class="add-delete">
                <a href="http://localhost:81/webtintuc.com/admins/model/baiviet/add_baiviet.php" class="add"><i class="fa fa-plus"></i> Thêm mới</a>
                <a href="" class="delete"><i class="fa fa-trash-o"></i> Xóa</a>
                </div>
              </div>
        </div>
        <div class="search-product col-md-12">
          <input type="text" name="" class="txtsearch" id="" placeholder="Tìm kiếm bài viết" autocomplete="off">
         
        </div>
       
        <div class="col-md-12">
          <table class="table table-bordered table-hover text-center col-md-12" id="sp_datatable">
          <thead >
            <tr >
              <th class="text-center"  style="width: 20px !important">ID</th>
              <th class="text-center" style="width: 100px">Thể loại</th>
              <th class="text-center">Tiêu đề</th>
              <th class="text-center"  style="width: 75px">Đăng bởi</th>
              <th class="text-center" style="width: 70px">Ẩn / Hiện</th>
              <th class="text-center"  style="width: 100px">Ngày đăng</th>
              <th class="text-center"  style="width: 100px">Chi tiết</th>
              <th class="text-center"  style="width: 63px">Sửa / Xóa</th>
            </tr>
          </thead>
          <tbody class="show_list">
          <?php  
          $qr="select * from news n, categorie ct where n.cate_id=ct.cate_id order by news_id desc";
          $list=mysqli_query($conn,$qr);
          while ($row_baiviet=mysqli_fetch_assoc($list)) {

            //var_dump($row_baiviet);
          
          ?>
            <tr>
              <td><?php echo $row_baiviet['news_id'] ?></td>
              <td><?php echo $row_baiviet['cate_title'] ?></td>
              <td><?php echo $row_baiviet['intro'] ?></td>
              <td>
                <?php  

                $qur = 'SELECT * FROM user WHERE user_id = "'.$row_baiviet['user_id'].'"';

                // var_dump($qur);

                  $user_qr = mysqli_query($conn,$qur);
                   while ($row_user=mysqli_fetch_assoc($user_qr)) {

                    echo $row_user['username'];

                   }

                                ?>
              </td>
              <td><?php if($row_baiviet['anhien']==1) echo "Hiện"; else echo "Ẩn"; ?></td>
              <td><?php echo $row_baiviet['date'] ?> </td>
              <td><a href="http://localhost:81/webtintuc.com/details.php?id=<?php echo $row_baiviet['news_id'] ?>" target="b_lank">Xem chi tiết</a></td>
              <td><a href="http://localhost:81/webtintuc.com/admins/model/baiviet/edit_baiviet.php?id=<?php echo $row_baiviet['news_id'] ?>" title="Sửa" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="http://localhost:81/webtintuc.com/admins/model/baiviet/delete_baiviet.php?id=<?php echo $row_baiviet['news_id'] ?>" title="Xóa" class='xoa' style="color:red"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        </div>
      </div>
    <?php require('../../view/footer.php') ?>