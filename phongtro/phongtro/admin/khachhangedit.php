<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khachhang.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/hopdong.php';?>
<?php
    $pd = new khachhang();

    if(!isset($_GET['khachhangid']) || $_GET['khachhangid']==NULL){
       echo "<script>window.lotoanhaion ='khachhanglist.php'</script>";
    }else{
         $id = $_GET['khachhangid']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updatekhachhang = $pd->update_khachhang($_POST,$id);
        
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa khách hàng</h2>
        <div class="block">    
         <?php

                if(isset($updatekhachhang)){
                    echo $updatekhachhang;
                }

            ?>        
        <?php
         $get_khachhang_by_id = $pd->getkhachhangbyId($id);
            if($get_khachhang_by_id){
                while($result_khachhang = $get_khachhang_by_id->fetch_assoc()){
        ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text"  name="khachhangName" value="<?php echo  $result_khachhang['khachhangName']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Cmnd</label>
                    </td>
                    <td>
                        <input type="text"  name="cmnd" value="<?php echo  $result_khachhang['cmnd']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Sđt</label>
                    </td>
                    <td>
                        <input type="text"  name="sdt" value="<?php echo  $result_khachhang['sdt']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Địa chỉ thường trú</label>
                    </td>
                    <td>
                        <input type="text"  name="diachi" value="<?php echo  $result_khachhang['diachi']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text"  name="email" value="<?php echo  $result_khachhang['email']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mật khẩu</label>
                    </td>
                    <td>
                        <input type="text"  name="password" value="<?php echo  $result_khachhang['password']?>" class="medium" />
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


