<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php
$pd=new giuong();
			if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
			{
				
				$insertgiuong = $pd->insert_giuong($_POST,$_FILES);
			}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm giường</h2>
        <div class="block">    
         <?php

                if(isset($insertgiuong)){
                    echo $insertgiuong;
                }

            ?>             
         <form action="giuongadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="giuongName" placeholder="Nhập tên giường..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Loại giường</label>
                    </td>
                    <td>
                        <select id="select" name="loaigiuong">
                            <option>--------Chọn Phòng-------</option>
                            <option value="giường tầng 1">Giường tầng 1</option>
                            <option value="giường tầng 2">Giường tầng 2</option>

                            
                           
                        </select>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Phòng</label>
                    </td>
                    <td>
                        <select id="select" name="phong">
                            <option>--------Chọn Phòng-------</option>

                             <?php
                            $phong = new phong();
                            $phonglist = $phong->show_phong();

                            if($phonglist){
                                while($result = $phonglist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['phongId'] ?>"><?php echo $result['phongName'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                    </td>
                </tr>
				
				 <!-- <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="giuong_desc" class="tinymce"></textarea>
                    </td>
                </tr> -->
				<!-- <tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Nhập giá..." class="medium" />
                    </td>
                </tr> -->
            
                
				
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
<?php include 'inc/footer.php';?>


