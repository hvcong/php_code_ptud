<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php
    $pd = new phong();

   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateadmin = $pd->update_admin($_POST,$_FILES);
        
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>ViewAdmin</h2>
        <div class="block">    
         <?php

                if(isset($updateadmin)){
                    echo $updateadmin;
                }

            ?>        
        <?php
         $get_phong_by_id = $pd->showadmin();
            if($get_phong_by_id){
                while($result_phong = $get_phong_by_id->fetch_assoc()){
        ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text"  name="adminname" value="<?php echo  $result_phong['adminName']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày sinh</label>
                    </td>
                    <td>
                        <input type="text"  name="ngaysinh" value="<?php echo  $result_phong['ngaysinh']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>sdt</label>
                    </td>
                    <td>
                        <input type="text"  name="sdt" value="<?php echo  $result_phong['sdt']?>" class="medium" />
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text"  name="adminEmail" value="<?php echo  $result_phong['adminEmail']?>" class="medium" />
                    </td>
                </tr>       
                <tr>
                    <td>
                        <label>Cmnd</label>
                    </td>
                    <td>
                        <input type="text"  name="cmnd" value="<?php echo  $result_phong['cmnd']?>" class="medium" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input type="text"  name="diachi" value="<?php echo  $result_phong['diachi']?>" class="medium" />
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
<?php include 'inc/footer.php';?>


