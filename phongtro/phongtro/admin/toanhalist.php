<?php include ('inc/header.php');?>
<?php include ('inc/sidebar.php');?>
<?php
include("../classes/toanha.php");
?>
 <?php
$toanha=new toanha();
if(isset ($_GET['delid']))
{
	$id=$_GET['delid'];	
	$deltoanha = $toanha->del_toanha($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh mục sản phẩm</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên tòa nhà</th>
							<th>Địa chỉ</th>
							<th>Hình ảnh</th>
							<th>Chi tiết</th>
							<th>Hoạt động</th>
						</tr>
					</thead>
					<tbody>
                    <?php
						$show_toanhae = $toanha->show_toanha();
						if($show_toanhae)
						{
							$i=0;
							while($resulttoanha=$show_toanhae->fetch_assoc()){
							
								$i++;	
										
					?>
                    
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $resulttoanha['toanhaName'] ?></td>
							<td><?php echo $resulttoanha['diachi'] ?></td>
							<td><img src="uploads/<?php echo $resulttoanha['image']; ?>" width="80" height="70"></td>
							<td><a href="giuongtrong.php?toanhaid=<?php echo $resulttoanha['toanhaId'] ?>">Xem chi tiết</a></td>
							<td><a href="toanhaedit.php?toanhaid=<?php echo $resulttoanha['toanhaId'] ?>">Chỉnh sửa</a> || <a onclick = "return confirm('Bạn có  muốn xóa không?')" href="?delid=<?php echo $resulttoanha['toanhaId'] ?>">Xóa</a></td>
						</tr>
						<?php
						}
							}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include ('inc/footer.php');?>

