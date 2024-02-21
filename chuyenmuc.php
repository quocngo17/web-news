<?php 
require("header.php");
$id=$_GET["id"];
 ?>
	<div class="block-main">
		<div class="container" style="width: 1000px">
			<div class="row">
				<!-- <div class="col-md-12"> -->
				<div class="col-md-8" style="padding: 0;margin-top: 15px;">
					<?php  
					require("lib/config.php");
					$result=mysqli_query($conn,"select cate_title from categorie where cate_id=$id ");
					$data=mysqli_fetch_assoc($result);
					echo"<h4 style='padding-left: 15px; width: 100%; background: #2e6da4;height: 40px;line-height: 40px;color: #FFF;margin: 0'>$data[cate_title]</h4>";

					$result1=mysqli_query($conn,"select * from news where cate_id=$id and anhien=1  order by news_id desc");
					while($data1=mysqli_fetch_assoc($result1)){
						
						
						$url=format_url($data1['title']);
					?>
						<div class="col-md-12" style="padding-bottom: 15px; padding-top: 15px;border: 1px solid #CCC;margin-bottom: 15px">
							<div class="col-md-4" style="padding:0">
								<img src='<?php echo $link ?>images/baiviet/<?php echo $data1['images'] ?>' height="150" width="100%" />
							</div>

							<div class="col-md-8">
								<h5 style="padding-top:0"><a href='<?php echo $link ?>baiviet/<?php echo $url ?>-<?php echo $data1['news_id'] ?>.html'><?php echo $data1['title'] ?></a></h5></h5>
								<p><?php echo $data1['intro'] ?></p>
								<p><span> Số lượt xem : <?php echo $data1['solanxem'] ?></span> <span>|</span> <span>Ngày đăng : <?php

								$date = $data1['date'];
								$fomat = new DateTime($date);
								echo $fomat -> format('d-m-Y'); ?></span></p>
								<!--<p><span>Đăng bởi : </span><?php //echo $data1['nguoidang'] ?></p>-->
							</div>
						</div>
					<?php } ?>
				</div>
				<!-- </div> -->
				<?php require('sidebar.php'); ?>
			</div>
		</div>
	
	</div>


 <?php require("footer.php"); ?>