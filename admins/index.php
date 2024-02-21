<?php require('view/header.php') ?>
<script type="text/javascript" src="js/chart.js"></script>
       <div class="col-md-12 text-center">
       <style type="text/css">
       	.padding{
		padding: 15px;
		border: 1px solid #CCC;
		margin: 15px 0px;border-radius: 5px;
	}
	.padding span{
		text-align: center;
		height: 40px;
		width: 40px; border-radius: 50%;font-size: 20px;background: #333;display: inline-block;color: #ffffff;line-height: 40px
	}
	.canvasjs-chart-canvas:first-child{
		position: inherit !important;
	}
	.canvasjs-chart-canvas:nth-child(2){
		display: none !important;
	}
	.canvasjs-chart-credit{
		display: none
       </style>
	<div class="row">
		<h3 style="float: left;padding-left: 30px"><i class="fa fa-tachometer" aria-hidden="true"></i> Thống kê</h3>
	</div>
	<?php 
	require '../lib/config.php';
	$bv=mysqli_query($conn,"select news_id from news");
	$row_bv=mysqli_num_rows($bv);
	$tl=mysqli_query($conn,"select cate_id from categorie");
	$row_tl=mysqli_num_rows($tl);
	$bl=mysqli_query($conn,"select cm_id from comment");
	$row_bl=mysqli_num_rows($bl);
	$tv=mysqli_query($conn,"select user_id from user");
	$row_tv=mysqli_num_rows($tv);
	 ?>
	<div class="col-md-3">
		<div class="padding">
			<h4>Bài viết</h4>
			<span><?php echo $row_bv ?></span>
		</div>
	</div>
	<div class="col-md-3">
		<div class="padding">
			<h4>Bình luận</h4>
			<span><?php echo $row_bl  ?></span>
		</div>
	</div>

	<div class="col-md-3">
		<div class="padding">
			<h4>Thành viên</h4>
			<span><?php echo $row_tv  ?></span>
		</div>
	</div>
	<div class="col-md-3">
		<div class="padding">
			<h4>Thể loại</h4>
			<span><?php echo $row_tl  ?></span>
		</div>
	</div>
	
	
</div> 
<div class="col-md-6">
		<div class="padding">
			<?php
			
        $dataPoints = array(
            array("y" => $row_bv, "name" => "Bài viết", "exploded" => true),
            array("y" => $row_bl, "name" => "Bình luận"),
            array("y" => $row_tv, "name" => "Tài khoản"),
            array("y" => $row_tl, "name" => "Thể loại")
        );
    ?>  
    <div id="chartContainer"></div>
        <script type="text/javascript">
            $(function () {
                var chart = new CanvasJS.Chart("chartContainer",
                {
                    theme: "theme2",
                    
                    exportFileName: "New Year Resolutions",
                    exportEnabled: true,
                    animationEnabled: true,		
                    data: [
                    {       
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{name}: <strong>{y}%</strong>",
                        indexLabel: "{name} {y}%",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
            });
        </script>
		</div>
	</div>
	<div class="col-md-6">
		<div class="padding">
			<?php
        $dataPoints = array(
            array("y" => $row_bv, "label" => "Bài viết","exploded" => true),
            array("y" => $row_tl, "label" => "Thể loại"),
            array("y" => $row_bl, "label" => "Bình luận"),
            array("y" => $row_tv, "label" => "Tài khoản")
        );
    ?>
		    <div id="line"></div>
 
        <script type="text/javascript">
 
            $(function () {
                var chart = new CanvasJS.Chart("line", {
                    theme: "theme2",
                    zoomEnabled: true,
                    animationEnabled: true,
                   
                    data: [
                    {
                        type: "line", 
                        showInLegend: true,
                                     
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }
                    ]
                });
                chart.render();
            });
        </script>
		</div>
	</div> 
    <?php require('view/footer.php') ?>