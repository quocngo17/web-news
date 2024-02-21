<?php 
$id=$_GET["id"];
require("header.php");
$links="http://localhost:81/webtintuc.com/";
$loi=array();
$loi["com"]=NULL;
$com=NULL;
	if (isset($_POST["ok"])) {
		if (isset($_SESSION['username'])) {
			
			if (empty($_POST["com"])) {
				$loi["com"]="*Nhập comment";
			}
			else{
				$com=addslashes($_POST["com"]);
			}
			if ($com) {
				require("lib/config.php");
				mysqli_query($conn,"insert into comment(name,message,time,news_id) value('$_SESSION[username]','$com',now(),'$id')");
				mysqli_close($conn);
			}
		}
		else{
			echo "<script>alert('Bạn cần phải đăng nhập')</script>";
			
		}
	}


 ?>
 <style type="text/css">
 	.a ul li{
 		float: left;padding-right: 5px;
 	}
 </style>
	<div class="block-main">
		<div class="container" style="width: 1000px">
			<div class="row">
				<div class="col-md-8" style="border:1px solid #CCC;margin-top: 15px;margin-bottom: 15px">
					<div class="banner" style="margin-top: 15px">
						<img src="<?php echo $link ?>images/baner.jpg" class="img-responsive" alt="">
					</div>
					<div class="col-md-12 a" style="padding: 20px 0px">
						<ul style="list-style: none">
							<?php 
							require("lib/config.php");
							
							$link=mysqli_query($conn,"select * from news n right join categorie c on n.cate_id=c.cate_id where news_id=$id");
							$data_link=mysqli_fetch_assoc($link);
							?>
							<li style="color: #337ab7;font-weight: bold;"><i  class="fa fa-home" aria-hidden="true"></i>Trang chủ /</li>
							<li><?php echo $data_link['cate_title'] ?> / </li>
							<li><?php echo $data_link['title'] ?></li>
						</ul>
					</div>
					<?php

						require("lib/config.php");
						$result=mysqli_query($conn,"select * from news where news_id=$id and anhien=1");
						$data=mysqli_fetch_assoc($result);
						$update=mysqli_query($conn,"update news set solanxem = solanxem + 1 where news_id=$id");
						echo"<h3>$data[title]</h3>";
						echo"<p class='intro'>$data[intro]</p>";
						echo"<p>$data[content]</p>";
						echo "<p><span>Số lượt xem :</span> $data[solanxem]";
					?>
					<hr>
					<div class="comment">
						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#home">Bình luận </a></li>
						  <li><a data-toggle="tab" href="#menu1">Bình luận facebook</a></li>
						
						</ul>

						<div class="tab-content">
						  <div id="home" class="tab-pane fade in active">
						    <form action="<?php echo $links ?>details.php?id=<?php echo $id; ?>" method="post">
								
								<label style="padding-top: 15px">Nội dung:</label>
								<textarea style="margin-bottom: 15px;border-radius: 0;max-width: 100%" class="form-control" name="com" rows="5" placeholder="Nội dung"></textarea>
								<span style="color: red"><?php echo $loi["com"] ?></span><span class="clearfix"></span>
								<input type="submit" style="padding: 5px 25px;border-radius: 0;margin-bottom: 25px" name="ok" value="Bình luận" class="btn btn-primary">
							</form >
							<div class="col-md-12" style="padding: 15px 0px">
							
						<?php
							require("lib/config.php");
							$comment=mysqli_query($conn,"select name,message,time from comment where news_id=$id order by cm_id desc");
							$count=mysqli_num_rows($comment);
							echo "<h4>Bình luận : $count</h4>";
							while($data3=mysqli_fetch_assoc($comment)){
							echo"<div class='cm-detail col-md-12'>";
								echo"<div class='col-md-12 '>";
									echo"<div class='col-md-2' style='padding:15px 0px'>";
										echo"<img class='img-responsive' src='".$links."lib/img/male.png' width='50' alt='Người dùng'>";
										echo"<p style='margin-bottom:0'>$data3[name]</p>";
									echo"</div>";
									echo"<div class='col-md-10' style='padding:15px 0px'>
										<p>$data3[message]</p>
										<p>$data3[time]</p>";
										
									echo"</div>";
								echo"</div>";
							echo"</div>";
							}
							mysqli_close($conn);
						?>
							
						</div>
						  </div>
						  <div id="menu1" class="tab-pane fade">
						    <div class="fb-comments" data-href="https://www.facebook.com/huynh.long.330?id=<?php echo $id ?>" data-width="100%"></div>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=219797951827872";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
						  </div>
						</div>
						
						<div class="tinlienquan">
							<div class="col-md-12" style="padding: 0;border: 1px solid #ccc;margin-bottom: 15px">
								<h4 style="padding-left: 15px; width: 100%; background: #2e6da4;height: 40px;line-height: 40px;color: #FFF;margin-top: 0">Tin liên quan</h4>
								<?php
								require("lib/config.php");
								$result1=mysqli_query($conn,"select * from news where cate_id=$data[cate_id]  and news_id <> $id order by title desc limit 10");
								while($data1=mysqli_fetch_assoc($result1)){
									$url_1=format_url($data1['title']);
								echo"<ul style='margin-left:15px;list-style:none'>";
									echo"<li><a style='color:#333' href='".$links."baiviet/$url_1-$data1[news_id].html'>$data1[title]</a></li>";
								echo"</ul>";
								}
								mysqli_close($conn);
								?>
							</div>
						</div>
					</div>
				</div>
				<?php require('sidebar.php'); ?>

	
			</div>

			
		</div>
	</div>

 <?php require("footer.php"); ?>