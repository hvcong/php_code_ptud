<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/khachhang.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/hopdong.php';?>
<?php
$pd=new khachhang();
			if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
			{
				
				$insertkhachhang = $pd->insert_khachhang($_POST,$_FILES);
			}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm khách hàng</h2>
        <div class="block">    
         <?php

                if(isset($insertkhachhang)){
                    echo $insertkhachhang;
                }

            ?>             
         <form action="khachhangadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="khachhangName" placeholder="Nhập tên người thuê..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Cnmd</label>
                    </td>
                    <td>
                        <input type="text" name="cmnd" placeholder="Nhập cmnd..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Sđt</label>
                    </td>
                    <td>
                        <input type="text" name="sdt" placeholder="Nhập Sđt..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Địa chỉ thường trú</label>
                    </td>
                    <td>
                        <input type="text" name="diachi" placeholder="Nhập Địa chỉ ..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="Nhập email ..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mật khẩu</label>
                    </td>
                    <td>
                        <input type="text" name="password" placeholder="Nhập mật khẩu ..." class="medium" />
                    </td>
                </tr>  
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
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


