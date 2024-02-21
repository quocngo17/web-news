		<div class="container" style="width: 1000px;background: #333;color: #FFF;padding-top: 25px">
			<div class="menu-footer col-md-12 text-center">
				<ul class="list-footer text-center">
					<li><a href="<?php $link ?>">Trang chủ</a></li>
					 <?php
				      require("lib/config.php");
				      $result=mysqli_query($conn,"select cate_id,cate_title from categorie");
				      while($data=mysqli_fetch_assoc($result)){
				        echo"<li><a href='chuyenmuc.php?id=$data[cate_id]'>$data[cate_title]</a></li>";
				    }
				    mysqli_close($conn);
					?>
				</ul>
			</div>
			<a class="btn-top" href="javascript:void(0);" title="Top"></a>
			<footer class="text-center col-md-12">
				<p class="text-center">Copyright: &copy; 2019 - <?php echo date("Y");  ?> Bản quyền thuộc về cong hau | <?php 
						require("lib/config.php");
						$result=mysqli_query($conn,"select * from statistical");
						while($row=mysqli_fetch_assoc($result)){
							$current = $row['hit_counter'];
							$new=$current+1;
							$update=mysqli_query($conn, "update statistical set hit_counter = $new");
							echo"<span>Số lần truy cập : <strong> $row[hit_counter]</strong></span>";
						}
					?></p>
			</footer>

		</div>
		<?php $link="http://localhost:81/webtintuc.com/"; ?>
		
		<div class="footer"> <a class="btn-top text-center" href="javascript:void(0);" title="Top" style=""><i style="color: #337ab7;font-weight: bold;font-size: 40px;line-height: 50px" class="fa fa-arrow-circle-up" aria-hidden="true"></i></a> </div>
		<script>
			jQuery(document).ready(function($){ 	
			if($(".btn-top").length > 0){
				$(window).scroll(function () {
					var e = $(window).scrollTop();
					if (e > 300) {
						$(".btn-top").show()
					} else {
						$(".btn-top").hide()
					}
				});
				$(".btn-top").click(function () {
					$('body,html').animate({
						scrollTop: 0
					})
				})
			}		
		});
		</script>

</body>
</html>