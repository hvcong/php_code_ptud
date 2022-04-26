<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$pd = new giuong();
	$fm = new Format();
	if(isset($_GET['giuongid'])){
        $id = $_GET['giuongid']; 
        $delpro = $pd->del_giuong($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách giường</h2>
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
					<th>Tên giường</th>

					<th>Phòng</th>
					<th>Loại giường</th>
					<th>Trạng thái</th>	
					<th>Hoạt động</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pdlist = $pd->show_giuong();
				if($pdlist){
					$i = 0;
					while($resultgiuong = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $resultgiuong['giuongName'] ;?></td>
					
					<td><?php echo $resultgiuong['phongName'] ;?></td>
					<td><?php echo $resultgiuong['loaigiuong'] ;?></td>
					<td>
						<?php
						if($resultgiuong['trangthai']==1)
						{
						?>
						<button type="button" 
						style ="background-color: #f44336; /* Red */
							border: none;
							color: white;
							padding: 5px 20px;
							text-align: center;
							text-decoration: none;
							display: inline-block;
							font-size: 16px;" 
						>Đã thuê</button> 
						<?php
						 }else{
						?>	
						<button type="button" 
						style ="background-color: #4CAF50; /* Green */
							border: none;
							color: white;
							padding: 5px 28px;
							text-align: center;
							text-decoration: none;
							display: inline-block;
							font-size: 16px;" 
						>Trống</button> 
						<?php
						}
						?>
					</td>
					<td><a href="giuongedit.php?giuongid=<?php echo $resultgiuong['giuongId']; ?>">Chỉnh sửa</a> || <a href="?giuongid=<?php echo $resultgiuong['giuongId']; ?>">Xóa</a></td>
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
