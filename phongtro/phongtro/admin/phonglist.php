<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$pd = new phong();
	$fm = new Format();
	if(isset($_GET['phongid'])){
        $id = $_GET['phongid']; 
        $delpro = $pd->del_phong($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách phòng</h2>
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
					<th>Tên phòng</th>
					<th>Tòa nhà </th>
					<th>Tầng</th>
					<th>Giá</th>	
					<th>Hình ảnh</th>
					<th>Hoạt động</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pdlist = $pd->show_phong();
				if($pdlist){
					$i = 0;
					while($resultphong = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $resultphong['phongName'] ;?></td>
					<td><?php echo $resultphong['toanhaName']; ?></td>
					<td><?php echo $resultphong['tang'] ;?></td>
					<td><?php echo $resultphong['price'] ;?></td>
					<td><img src="uploads/<?php echo $resultphong['image_phong']; ?>" width="80" height="70"></td>
					<td><a href="phongedit.php?phongid=<?php echo $resultphong['phongId']; ?>">Chỉnh sửa</a> || <a href="?phongid=<?php echo $resultphong['phongId']; ?>">Xóa</a></td>
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
