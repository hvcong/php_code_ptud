<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php include '../classes/hopdong.php';?>
<?php include '../classes/khachhang.php';?>
<?php
$pd=new hopdong();
			if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
			{
				
				$inserthopdong = $pd->insert_hopdong($_POST,$_FILES);
			}  
             
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm hợp đồng</h2>
        <div class="block">    
         <?php

                if(isset($inserthopdong)){
                    echo $inserthopdong;
                }

            ?>             
         <form action="hopdongadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Số Hợp đồng</label>
                    </td>
                    <td>
                        <input type="text" name="sohopdong" placeholder="Nhập số hợp đồng..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tên người thuê</label>
                    </td>
                    <td>
                        <select id="select" name="khachhang">
                            <option>--------Chọn người thuê-------</option>

                             <?php
                            $khachhang = new khachhang();
                            $khachhanglist = $khachhang->show_khachhang();

                            if($khachhanglist){
                                while($result = $khachhanglist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['khachhangId'] ?>"><?php echo $result['khachhangName'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giường</label>
                    </td>
                    <td>
                        <select id="select" name="giuong">
                            <option>--------Chọn giường-------</option>

                             <?php
                            $giuong = new giuong();
                            $giuonglist = $giuong->show_giuong_trong();

                            if($giuonglist){
                                while($result = $giuonglist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['giuongId'] ?>"><?php echo $result['giuongName'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày bất đầu</label>
                    </td>
                    <td>
                        <input type="date" name="ngayBd" placeholder="Nhập ngày bất đầu..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày kết thúc</label>
                    </td>
                    <td>
                        <input type="date" name="ngayKt" placeholder="Nhập ngày kết thúc..." class="medium" />
                    </td>
                </tr>
				
				 <!-- <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="hopdong_desc" class="tinymce"></textarea>
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
            
                <tr>
                    <td>
                        <label>Hình ảnh sản phẩm</label>
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
<?php include 'inc/footer.php';?>


