<?php include ('inc/header.php');?>
<?php include ('inc/sidebar.php');?>
<?php
include("../classes/toanha.php");
?>
<?php
$toanha=new toanha();
if(!isset($_GET['toanhaid']) || $_GET['toanhaid']==NULL)
{
	echo "<script>window.lotoanhaion ='toanhalist.php'</script>";
}else
{
	$id=$_GET['toanhaid'];	
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách giường </h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên giường</th>
							<th>Phòng</th>
							<th>Trạng thái</th>
							<th>Tòa nhà</th>

						</tr>
					</thead>
					<tbody>
                    <?php
						$show_toanhae = $toanha->show_giuongtrong_by_toanha($id);
						if($show_toanhae)
						{
							$i=0;
							while($resulttoanha=$show_toanhae->fetch_assoc()){
							
								$i++;	
										
					?>                   
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $resulttoanha['giuongName'] ?></td>
							<td><?php echo $resulttoanha['phongName'] ?></td>
							<td>
						<?php
						if($resulttoanha['trangthai']==1)
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
							<td><?php echo $resulttoanha['toanhaName'] ?></td>						
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

