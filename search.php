<?php require('header.php'); require("lib/config.php"); $keyword=$_GET['timkiem']; ?>
<div class="block-main">
    <div class="container" style="width: 1000px">
      <div class="row">
        <div class="col-md-12" style="border: 1px solid #CCC;margin: 15px 0px">
          <div class="manager">
                <div class="block">
                  <h4>Tìm kiếm</h4>
                  <span style="color: red;margin-bottom: 10px"></span>
                </div>
                <div class="clearfix"></div>
          </div>
          <div class=" add-product" style="margin-bottom: 15px">
              <?php  
              if ($keyword=='' && $keyword!='_') {
                echo "<span style='color:red'>Nhập từ khóa cần tìm </span>";
              }

              else{
              $result=mysqli_query($conn,"select * from news where title like '%$keyword%'");
              {
                if (mysqli_num_rows($result)==0) {
                  echo "<span>Không tìm thấy kết quả tìm kiếm<i> ".$keyword."</i> </span>";
                }
                else{
                  $dem=mysqli_num_rows($result);
                  echo "<p>Có ".$dem." kết quả tìm kiếm <i> ".$keyword." </i></p>";
                while($data1=mysqli_fetch_assoc($result)){
              
              ?>
                        <div class="col-md-12" style="padding-bottom: 15px; padding-top: 15px;border: 1px solid #CCC;margin-bottom: 15px">

                          <div class="col-md-3" style="padding:0">
                            <img src='images/baiviet/<?php echo $data1['images'] ?>' height="150" width="100%" />
                          </div>

                          <div class="col-md-9">
                            <h5 style="padding-top:0"><a href='details.php?id=<?php echo $data1['news_id'] ?>'><?php echo $data1['title'] ?></a></h5></h5>
                            <p><?php echo $data1['intro'] ?></p>
                            <p><span> Số lượt xem : <?php echo $data1['solanxem'] ?></span> <span>|</span> <span>Ngày đăng : <?php

                            $date = $data1['date'];
                            $fomat = new DateTime($date);
                            echo $fomat -> format('d-m-Y'); ?></span></p>
                          </div>
                        </div>
              <?php }}}} ?>
            </div>
          </div>
      </div>
      </div>
      </div>
      </div>
  <?php require('footer.php') ?>