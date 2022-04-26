<?php include("inc/header.php");?>
<?php include("inc/sidebar.php");?>
<?php include("../classes/toanha.php"); ?>
<?php include '../classes/giuong.php';?>
<?php include '../classes/phong.php';?>


<?php
$toanha=new toanha();
if(!isset($_GET['toanhaid']) || $_GET['toanhaid']==NULL)
{
	echo "<script>window.lotoanhaion ='toanhalist.php'</script>";
}else
{
	$id=$_GET['toanhaid'];	
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
    $updatetoanha = $toanha->update_toanha($_POST,$_FILES, $id);
    
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa tòa nhà</h2>
               <div class="block "> 
               <?php 
					if(isset($updatetoanha))
					{
						echo $updatetoanha;	
					}
				 ?>
                 <?php
                    $get_toanha_by_id = $toanha->gettoanhabyId($id);
                     if($get_toanha_by_id){
                     while($result_toanha = $get_toanha_by_id->fetch_assoc()){
                 ?>   
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">
                        
                            <tr>
                                <td>
                                    <label>Tên tòa nhà</label>
                                </td>
                                <td>
                                    <input type="text"  name="toanhaName" value="<?php echo  $result_toanha['toanhaName']?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Địa chỉ</label>
                                </td>
                                <td>
                                    <input type="text"  name="diachi" value="<?php echo  $result_toanha['diachi']?>" class="medium" />
                                </td>
                            </tr>      
                            <tr>
                                <td>
                                    <label>Hình ảnh tòa nhà</label>
                                </td>
                                <td>
                                    <img src="uploads/<?php echo $result_toanha['image'] ?>" width="90"><br>
                                    <input type="file" name="image" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" value="Cập nhật" />
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include ("inc/footer.php");?>