<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/toanha.php';?>
<?php include '../classes/giuong.php';?>
<?php
    $pd = new phong();

    if(!isset($_GET['phongid']) || $_GET['phongid']==NULL){
       echo "<script>window.lotoanhaion ='phonglist.php'</script>";
    }else{
         $id = $_GET['phongid']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updatephong = $pd->update_phong($_POST,$_FILES, $id);
        
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa phòng</h2>
        <div class="block">    
         <?php

                if(isset($updatephong)){
                    echo $updatephong;
                }

            ?>        
        <?php
         $get_phong_by_id = $pd->getphongbyId($id);
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
                        <input type="text"  name="phongName" value="<?php echo  $result_phong['phongName']?>" class="medium" />
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


                            <option
                            <?php
                            if($result['toanhaId']==$result_phong['toanhaId']){ echo 'selected';  }
                            ?>

                             value="&toanhaid=<?php echo $result['toanhaId'] ?>"><?php echo $result['toanhaName'] ?></option>



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
                        <input type="text"  name="tang" value="<?php echo  $result_phong['tang']?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text"  name="price" value="<?php echo  $result_phong['price']?>" class="medium" />
                    </td>
                </tr>           
                <tr>
                    <td>
                        <label>Hình ảnh phòng</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_phong['image_phong'] ?>" width="90"><br>
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


