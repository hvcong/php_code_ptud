<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php
    $pd = new giuong();

    if(!isset($_GET['giuongid']) || $_GET['giuongid']==NULL){
       echo "<script>window.lotoanhaion ='giuonglist.php'</script>";
    }else{
         $id = $_GET['giuongid']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updategiuong = $pd->update_giuong($_POST,$_FILES, $id);
        
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa giường</h2>
        <div class="block">    
         <?php

                if(isset($updategiuong)){
                    echo $updategiuong;
                }

            ?>        
        <?php
         $get_giuong_by_id = $pd->getgiuongbyId($id);
            if($get_giuong_by_id){
                while($result_giuong = $get_giuong_by_id->fetch_assoc()){
        ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên giường</label>
                    </td>
                    <td>
                        <input type="text"  name="giuongName" value="<?php echo  $result_giuong['giuongName']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Loại giường</label>
                    </td>
                    <td>
                    <select id="select" name="loaigiuong">
                          <?php echo $result_giuong['loaigiuong']?>
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
                            <option>--------Chọn phòng-------</option>

                             <?php
                            $phong = new phong();
                            $phonglist = $phong->show_phong();

                            if($phonglist){
                                while($result = $phonglist->fetch_assoc()){
                             ?>

                            <option

                            <?php
                            if($result['phongId']==$result_giuong['phongId']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['phongId'] ?>"><?php echo $result['phongName'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
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


