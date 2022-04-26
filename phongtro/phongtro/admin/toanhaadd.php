<?php include("inc/header.php");?>
<?php include("inc/sidebar.php");?>
<?php include("../classes/toanha.php"); ?>
<?php include '../classes/giuong.php';?>
<?php include '../classes/phong.php';?>


<?php
$toanha=new toanha();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
			{
				
				$inserttoanha = $toanha->insert_toanha($_POST,$_FILES);
			}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm tòa nhà</h2>
        <div class="block">    
         <?php

                if(isset($inserttoanha)){
                    echo $inserttoanha;
                }

            ?>             
         <form action="toanhaadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="toanhaName" placeholder="Nhập tên tòa nhà..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input type="text" name="diachi" placeholder="Nhập địa chỉ..." class="medium" />
                    </td>
                </tr>
				
				
				 <!-- <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="toanha_desc" class="tinymce"></textarea>
                    </td>
                </tr> -->
                <tr>
                    <td>
                        <label>Hình ảnh tòa nhà</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<!-- <tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn loại sản phẩm</option>
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                        </select>
                    </td>
                </tr> -->

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
<?php include ("inc/footer.php");?>