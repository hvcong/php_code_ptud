<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khachhang.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php include '../classes/hopdong.php';?>
<?php include '../classes/phong.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$pd = new khachhang();
	$fm = new Format();
	if(isset($_GET['khachhangid'])){
        $id = $_GET['khachhangid']; 
        $delpro = $pd->del_khachhang($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách khách hàng</h2>
        <div class="block"> 
        <?php
        if(isset($delpro)){
        	echo $delpro;
        }
        ?> 
        	
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>id</th>
					<th>Tên người thuê</th>
					<th>Cmnd</th>
					<th>Sđt</th>
					<th>Địa chỉ thường trú</th>	
					<th>Email</th>
					<th>Mật khẩu</th>
					<th>Hoạt động</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pdlist = $pd->show_khachhang();
				if($pdlist){
					$i = 0;
					while($resultkhachhang = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $resultkhachhang['khachhangName'] ;?></td>
					<td><?php echo $resultkhachhang['cmnd']; ?></td>
					<td><?php echo $resultkhachhang['sdt'] ;?></td>
					<td><?php echo $resultkhachhang['diachi'] ;?></td>
					<td><?php echo $resultkhachhang['email'] ;?></td>
					<td><?php echo $resultkhachhang['password'] ;?></td>
					<td><a href="khachhangedit.php?khachhangid=<?php echo $resultkhachhang['khachhangId']; ?>">Chỉnh sửa</a> || <a href="?khachhangid=<?php echo $resultkhachhang['khachhangId']; ?>">Xóa</a></td>
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
