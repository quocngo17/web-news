 <!-- sidebar -->
 <?php  $link="http://localhost:81/webtintuc.com/"; ?>
				<div class="col-sm-4 col-md-4" style="padding-right: 0;margin-bottom: 15px">
						<div class="col-md-12" style="margin-top: 15px; border: 1px solid #CCC">
							<div class="row">
							<div class="search-box" style="margin-top: 15px;"> 
							    <form class="search-form" action="<?php echo $link ?>search.php"> 
							    	<input class="form-control" name="timkiem" style="border-radius: 0" placeholder="Tìm kiếm" type="text"> 
							     	<button class="btn btn-link search-btn" type="submit"> <i class="glyphicon glyphicon-search"></i></button> 
							    </form> 
							</div>
						</div>
                    	<div class="row" style="margin-top: 15px">
                    		<div class="col-md-12">
	                    		<img src="<?php echo $link ?>images/bngame.jpg"  style="width: 100%" alt="Hình ảnh quảng cáo" />	
                    		</div>
                    	</div>
						<div class="row">
							<div class="col-md-12">
							<div class="sbar" style="margin-top: 15px">
							<h4 style="padding-left: 15px; width: 100%; background: #2e6da4;height: 40px;line-height: 40px;color: #FFF;margin-top: 0">Tin xem nhiều nhất</h4>
							<ul>
							<?php 
								require("lib/config.php");

								
								$tp=mysqli_query($conn,"select * from news where anhien=1  order by solanxem desc limit 10");
								while($top=mysqli_fetch_assoc($tp)){
									$url=format_url($top['title']);
								echo"<li><a style='color:#333;padding-bottom:5px' href='".$link."baiviet/$url-$top[news_id].html'>$top[title]</a></li>";
							}
							mysqli_close($conn);
							?>	
							</ul>
							</div>
							</div>
							
						</div>
                    	
						</div>
                </div>
                <!-- sidebar -->