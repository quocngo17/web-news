<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Trang chủ - quản lý tin tức</title>
  <link rel="stylesheet" href="http://localhost:81/webtintuc.com/admins/css/bootstrap.css">
  <link rel="stylesheet" href="http://localhost:81/webtintuc.com/admins/css/font-awesome.css">
  <link rel="stylesheet" href="http://localhost:81/webtintuc.com/admins/css/sidebar-menu.css">
  <link rel="stylesheet" href="http://localhost:81/webtintuc.com/admins/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" type="text/css" href="http://localhost:81/webtintuc.com/admins/js/table.css"/>
  <link rel="stylesheet" href="http://localhost:81/webtintuc.com/admins/css/style.css"> 
  <script src="http://localhost:81/webtintuc.com/admins/js/jquery.1.10.2.min.js"></script>
  <script src="http://localhost:81/webtintuc.com/admins/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="http://localhost:81/webtintuc.com/admins/js/table.js"></script>
  <script src="http://localhost:81/webtintuc.com/admins/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.xoa').click(function(){
        if (confirm("Bạn thực sự muốn xóa hay không")) {
          return true;
        }
        else{
          return false;
        }
      });
      $("#checkAll").click(function() {
      $(".second").prop("checked", $("#checkAll").prop("checked"))
      });

      $('#sp_datatable').DataTable();
    });
  </script>
  <style type="text/css" media="screen">
    #sp_datatable{
      padding: 0;
    }
    table.dataTable{
      border-collapse: collapse;
    }
    table.dataTable thead th, table.dataTable thead td{
      border: 1px solid #CCC
    }
    table.dataTable tbody th, table.dataTable tbody td{
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <div class="header">
    <div class="col-md-2 logo">
        <h3><a href="http://localhost:81/webtintuc.com/admins/">CONG HAU</a></h3>
    </div>
    <!-- logo -->

    <div class="acount">
          <div class="dropdown right-acount">
            <?php 
              if ($_SESSION["level"]==2) {
            ?>
          <img src="http://localhost:81/webtintuc.com/admins/images/admin.jpg" width="40" height="40"><button class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?php echo $_SESSION['username'] ?>
          <span class="fa fa-angle-down"></span></button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <li><a href="http://localhost:81/webtintuc.com/" target="b_lank">Trang chủ</a></li>
            <li><a role="menuitem" tabindex="-1" href="http://localhost:81/webtintuc.com/admins/model/user/doimatkhau.php">Thông tin tài khoản</a></li>
            <li><a role="menuitem" tabindex="-1" href="http://localhost:81/webtintuc.com/logout.php">Đăng xuất</a></li>
            
          </ul>
          <?php }
            else{
              header("location:http://localhost:81/webtintuc.com/logout.php");
            }
           ?>
      </div>
    </div>
    <!-- acount -->
  </div>
  <!-- header -->
<div class="clearfix"></div>
  <div class="block-wp">
    <div class="col-md-2 block-sidebar">
      <ul class="sidebar-menu">
        <li class="sidebar-header">Danh mục</li>
        <li>
          <a href="#"><i class="fa "></i> <span>Bài viết</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="sidebar-submenu">
            <li><a href="http://localhost:81/webtintuc.com/admins/model/baiviet/list_baiviet.php">Danh sách bài viết</a></li>
            <li><a href="http://localhost:81/webtintuc.com/admins/model/baiviet/add_baiviet.php">Thêm bài viết</a></li>
          </ul>
        </li> 
        <li>
          <a href="#"><i class="fa "></i> <span>Thể loại</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="sidebar-submenu">
            <li><a href="http://localhost:81/webtintuc.com/admins/model/theloai/list_theloai.php">Danh sách thể loại</a></li>
            <li><a href="http://localhost:81/webtintuc.com/admins/model/theloai/add_theloai.php">Thêm thể loại</a></li>
          </ul>
        </li> 
        <li><a href="http://localhost:81/webtintuc.com/admins/model/user/list_user.php"><i class="fa "></i> <span>Thành viên</span> </a></li> 
        <li><a href="http://localhost:81/webtintuc.com/admins/model/comment/list_comment.php"><i class="fa "></i> <span>Bình luận</span> </a></li>  
          </ul>
        </li>
      </ul>
      <!-- ul -->
    </div>
    <!-- block-sidebar -->
    <div class="col-md-10 block-main" style="padding-top: 15px;background: #FFF">
      <div class="col-md-12" style="padding: 0;border:1px solid #CCC;margin-bottom: 15px">