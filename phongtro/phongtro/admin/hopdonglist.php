<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php include '../classes/hopdong.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$pd = new hopdong();
	$fm = new Format();
	if(isset($_GET['hopdongid'])){
        $id = $_GET['hopdongid'];
        $id1 = $_GET['giuongid'];
        $delpro = $pd->del_hopdong($id,$id1);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách hợp đồng</h2>
        <div class="block"> 
        <?php
        if(isset($delpro)){
        	echo $delpro;
        }
        ?> 
        	
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Mã HĐ</th>
					<th>Người thuê</th>
					<th>Giường</th>
					<th>Giá</th>	
					<th>Ngày thuê</th>
					<th>Ngày trả</th>
					<th>Chi tiết</th>
					<th>Hình ảnh</th>
					<th>Hoạt động</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pdlist = $pd->show_hopdong();
				if($pdlist){
					$i = 0;
					while($resulthopdong = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $resulthopdong['soHđ'] ;?></td>
					<td><?php echo $resulthopdong['khachhangName']; ?></td>
					<td><?php echo $resulthopdong['giuongName'] ;?></td>
					<td><?php echo $resulthopdong['price'] ;?></td>
					<td><?php echo $resulthopdong['ngayBd'] ;?></td>
					<td><?php echo $resulthopdong['ngayKt'] ;?></td>
					<td><a href="hopdongchitiet.php?hopdongid=<?php echo $resulthopdong['hopdongId'] ?>" target = "blank">Xem chi tiết</a></td>
					<td><img src="uploads/<?php echo $resulthopdong['image_hopdong']; ?>" width="80" height="70"></td>
					<td><a href="hopdongedit.php?hopdongid=<?php echo $resulthopdong['hopdongId']; ?>">Chỉnh sửa</a> || <a href="?hopdongid=<?php echo $resulthopdong['hopdongId']?>&giuongid=<?php echo $resulthopdong['giuongId']; ?>">Xóa</a></td>
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
<?php include 'inc/footer.php';?>
