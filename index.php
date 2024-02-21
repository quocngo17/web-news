<?php 
require("header.php");

 ?>
<!--nav end-->
	<div class="block-main">
		<div class="container" style="width: 1000px">
			<div class="row">
				<div class="col-sm-8 col-md-8 cot8">
					<div class="row" style="border: 1px solid #CCC;margin-top: 15px">
						<h4 style="padding-left: 15px; width: 100%; background: #2e6da4;height: 40px;line-height: 40px;color: #FFF;margin-top: 0">Tin mới nhất</h4>
						<div class="col-md-7">
							<?php
							require("lib/config.php");
							$kq=mysqli_query($conn,"select * from news order by news_id desc");
							$data=mysqli_fetch_assoc($kq);
							$url=format_url($data['title']);
								echo"<img src='".$link."images/baiviet/$data[images]' width='100%' alt='Hình ảnh' title='Hỉnh ảnh' />";
								
								echo"<h5><a href='".$link."baiviet/$url-$data[news_id].html'> $data[title]</a></h5>";
								echo "<p>$data[intro]</p>";
							?>
						</div>
						<div class="col-md-5">
							<ul style="list-style: square;">
							<?php
							require("lib/config.php");
							$kq1=mysqli_query($conn,"select * from news where anhien=1 order by  news_id desc  limit 1,9");
							while($data1=mysqli_fetch_assoc($kq1)){
								$url_new=format_url($data1['title']);
								echo"<li><a style='color:#333' href='".$link."baiviet/$url_new-$data1[news_id].html'>$data1[title]</a></li>";
							}							
							?>	
							</ul>
						</div>
					</div>

					<!-- bai viết mới nhất -->

					<div class="row" style="margin-top: 15px">
						<div class="col-md-12">
							<?php
							require("lib/config.php");
							$ketqua=mysqli_query($conn,"select cate_id,cate_title from categorie where an_hien=1");
							while($khoitao=mysqli_fetch_assoc($ketqua)){
							echo"<div class='row' style='margin-bottom:15px;border: 1px solid #CCC;'>";
							echo"<h4 style='padding-left: 15px; width: 100%; background: #2e6da4;height: 40px;line-height: 40px;color: #FFF;margin-top: 0'>$khoitao[cate_title]</h4>";													
									$kq2=mysqli_query($conn,"select * from news where cate_id=$khoitao[cate_id] order by news_id desc limit 4");
									while($data2=mysqli_fetch_assoc($kq2)){
										$url_ct=format_url($data2['title']);
									echo"<div class='col-md-6'>";
											echo "<div class='col-md-4' style='padding:0'>";
												echo"<img src='".$link."images/baiviet/$data2[images]' height='80' width='100%' class='' />";
											echo "</div>";

											echo "<div class='col-md-8'>";
												echo"<h5 style='width: 100%;
height: 43px;
overflow: hidden;
text-overflow: ellipsis;'><a  href='".$link."baiviet/$url_ct-$data2[news_id].html'>$data2[title]</a></h5>";	
												echo "<span> Số lượt xem </span> $data2[solanxem]";
											echo "</div>";

											echo "<div class='col-md-12 text-justify' style='padding:0;'>";
												echo"<p  style='margin-top:10px;width: 100%;
height: 40px;
overflow: hidden;
text-overflow: ellipsis;' class='tin'>$data2[intro] </p>";
											echo "</div>";
									echo"</div>";

									}
							
							echo"</div>";
								}
							?>
							<!--end loại tin-->
						</div>
					</div>
				</div>	

               <?php require('sidebar.php'); ?>
			</div>
		</div>
		<!--end nd-->
	</div>	
<?php require("footer.php"); ?>