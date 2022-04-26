<?php include ('inc/header.php');?>
<?php include ('inc/sidebar.php');?>
<?php
include("../classes/khachhang.php");
?>
<?php
$khachhang=new khachhang();
if(!isset($_GET['userid']) || $_GET['userid']==NULL)
{
	echo "<script>window.lokhachhangion ='khachhanglist.php'</script>";
}else
{
	$id=$_GET['userid'];	
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>View User</h2>
        <div class="block">           
        <?php 
         $showuser = $khachhang->get_khachhang($id);
            if($showuser){
                while($result_user = $showuser->fetch_assoc()){
        ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text"  readonly="readonly" value="<?php echo  $result_user['khachhangName']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày sinh</label>
                    </td>
                    <td>
                        <input type="text"  readonly="readonly" value="22/07/2000" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>sdt</label>
                    </td>
                    <td>
                        <input type="text"   readonly="readonly" value="<?php echo  $result_user['sdt']?>" class="medium" />
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text"  readonly="readonly" value="<?php echo  $result_user['email']?>" class="medium" />
                    </td>
                </tr>       
                <tr>
                    <td>
                        <label>Cmnd</label>
                    </td>
                    <td>
                        <input type="text"   readonly="readonly" value="<?php echo  $result_user['cmnd']?>" class="medium" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input type="text"   readonly="readonly" value="<?php echo  $result_user['diachi']?>" class="medium" />
                    </td>
                </tr>    		
            </table>
            </form>
            <?php
            }

        }
            ?>
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

