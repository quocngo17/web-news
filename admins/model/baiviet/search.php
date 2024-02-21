<?php 
require '../../../lib/config.php';
require '../../../function.php';

$search=$_POST['data'];
if(isset($search)){
$qr="select * from news n, categorie ct where n.cate_id=ct.cate_id and title like '%$search%'";
$show=mysqli_query($qr);
if($num=mysqli_num_rows($show)==0)
{
	
	echo "<tr>
	<td colspan='8'>Không tìm thấy kết quả ".$search."</td>
</tr>";
}
else{
	$dem=mysqli_num_rows($show);
	echo "<tr>
	<td colspan='8'>Có <span style='color:red'>".$dem."</span> kết quả <span style='color:red'>".$search."</span> </td>
</tr>";
while($row_baiviet=mysqli_fetch_array($show)){
 ?>




<tr>
              <td><?php echo $row_baiviet['news_id'] ?></td>
              <td><?php echo $row_baiviet['cate_title'] ?></td>
              <td><?php echo $row_baiviet['intro'] ?></td>
              <td>
                <?php  echo $row_baiviet['nguoidang'];                ?>
              </td>
              <td><?php if($row_baiviet['anhien']==1) echo "Hiện"; else echo "Ẩn"; ?></td>
              
              <td><?php echo $row_baiviet['date'] ?> </td>
              <td><a href="http://localhost:81/webtintuc.com/details.php?id=<?php echo $row_baiviet['news_id'] ?>" target="b_lank">Xem chi tiết</a></td>
              <td><a href="http://localhost:81/webtintuc.com/admins/model/baiviet/edit_baiviet.php?id=<?php echo $row_baiviet['news_id'] ?>" title="Sửa" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="http://localhost:81/webtintuc.com/admins/model/baiviet/delete_baiviet.php?id=<?php echo $row_baiviet['news_id'] ?>" title="Xóa" class='xoa' style="color:red"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>





 <?php }}} ?>
