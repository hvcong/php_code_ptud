<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php
$pd=new phong();
			if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
			{
				
				$insertphong = $pd->insert_phong($_POST,$_FILES);
			}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm phòng</h2>
        <div class="block">    
         <?php

                if(isset($insertphong)){
                    echo $insertphong;
                }

            ?>             
         <form action="phongadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="phongName" placeholder="Nhập tên phòng..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Tòa nhà</label>
                    </td>
                    <td>
                        <select id="select" name="toanha">
                            <option>--------Chọn tòa nhà--------</option>
                            <?php
                            $toanha = new toanha();
                            $toanhalist = $toanha->show_toanha();

                            if($toanhalist){
                                while($result = $toanhalist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['toanhaId'] ?>"><?php echo $result['toanhaName'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Tầng</label>
                    </td>
                    <td>
                        <input type="text" name="tang" placeholder="Nhập tầng..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Nhập giá..." class="medium" />
                    </td>
                </tr>
				
			
            
                <tr>
                    <td>
                        <label>Hình ảnh phòng</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
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


