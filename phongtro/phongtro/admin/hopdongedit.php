<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php include '../classes/khachhang.php';?>
<?php include '../classes/hopdong.php';?>
<?php
    $pd = new hopdong();

    if(!isset($_GET['hopdongid']) || $_GET['hopdongid']==NULL){
       echo "<script>window.lotoanhaion ='hopdonglist.php'</script>";
    }else{
         $id = $_GET['hopdongid']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updatehopdong = $pd->update_hopdong($_POST,$_FILES, $id);
        
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa hợp đồng</h2>
        <div class="block">    
         <?php

                if(isset($updatehopdong)){
                    echo $updatehopdong;
                }

            ?>        
        <?php
         $get_hopdong_by_id = $pd->gethopdongbyId($id);
            if($get_hopdong_by_id){
                while($result_hopdong = $get_hopdong_by_id->fetch_assoc()){
        ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Số hợp đồng</label>
                    </td>
                    <td>
                        <input type="text"  name="sohopdong" value="<?php echo  $result_hopdong['soHđ']?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Người thuê</label>
                    </td>
                    <td>
                        <select id="select" name="khachhang">
                            <option>--------Chọn Người thuê--------</option>
                            <?php
                            $khachhang = new khachhang();
                            $khachhanglist = $khachhang->show_khachhang();

                            if($khachhanglist){
                                while($result = $khachhanglist->fetch_assoc()){
                             ?>


                            <option
                            <?php
                            if($result['khachhangId']==$result_hopdong['khachhangId']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['khachhangId'] ?>"><?php echo $result['khachhangName'] ?></option>



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
                            <option>--------Chọn Người thuê--------</option>
                            <?php
                            $giuong = new giuong();
                            $giuonglist = $giuong->show_giuong();

                            if($giuonglist){
                                while($result = $giuonglist->fetch_assoc()){
                             ?>


                            <option
                            <?php
                            if($result['giuongId']==$result_hopdong['giuongId']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['giuongId'] ?>"><?php echo $result['giuongName'] ?></option>



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
                        <input type="date"  name="ngayBd" value="<?php echo  $result_hopdong['ngayBd']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số kết thúc</label>
                    </td>
                    <td>
                    <input type="date"  name="ngayKt" value="<?php echo  $result_hopdong['ngayKt']?>" class="medium" />

                    </td>
                </tr>          
                <tr>
                    <td>
                        <label>Hình ảnh hợp đồng</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_hopdong['image_hopdong'] ?>" width="90"><br>
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
<?php include 'inc/footer.php';?>


