<?php
include ("../lib/session.php");
session::checkSession();
?>

<?php include("../classes/toanha.php"); ?>
<?php include '../classes/giuong.php';?>
<?php include '../classes/phong.php';?>
<?php include '../classes/khachhang.php';?>
<?php include '../classes/hopdong.php';?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
    $pd = new hopdong();

    if(!isset($_GET['hopdongid']) || $_GET['hopdongid']==NULL){
       echo "<script>window.lotoanhaion ='hopdonglist.php'</script>";
    }else{
         $id = $_GET['hopdongid']; 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    * {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

 :root {
    --one-color: #d0e1f9;
    --second-color: #4d648d;
    --third-color: #283655;
    --fourth-color: #1e1f26;
    --transition-fast: all 0.2s ease;
    --transition-slow: all 0.5s ease;
    --footer-background-color: #52525c;
    --footer-text-color: #a9b3bb;
}

 html {
    font-size: 16px;
}

 .contract__container {
    padding: 0px !important;
}

 .section__title {
    text-align: center;
    font-size: 30px;
    letter-spacing: 1px;
    padding: 12px 0;
    text-transform: uppercase;
    font-weight: 700;
    position: relative;
    color: var(--third-color);
}

 .section__title::after {
    content: "";
    position: absolute;
    top: 100%;
    height: 2px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    background-color: rgb(233, 190, 125);
}


 /* main */


 /* .contract__body {
    border: 1px solid #ddd;
    padding: 0 12px;
    margin-top: 36px;
    border-radius: 4px;
} */

 .contract__item-heading {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 12px;
    margin-top: 24px;
    border-bottom: 1px solid #ddd;
    padding: 4px 0 !important;
}

 .contract__item-title {
    font-weight: 500;
    font-size: 18px;
    margin-bottom: 12px;
    text-align: center;
    margin-top: 12px;
}

 .contract__item-group {
    display: flex;
    padding-bottom: 12px;
}

 .contract__item-label {
    width: 120px;
    /* font-weight: 500; */
}

 .contract__item-value {
    flex: 1;
    color: rgb(35, 47, 224);
}

 .contract__image {
    padding: 24px 0;
}

 .contract__image-heading {
    font-size: 18px;
    font-weight: 500;
    padding-bottom: 12px;
 }

 .contract__image-body {
    padding: 12px;
    background-color: #ddd;
    text-align: center;
}

 .contract__image-img {
    width: 60%;
}
</style>
    <script>
        $(document).ready(async() => {
            $(".header__load").load("./header.html");

            await $(".footer__load").load("./footer.html");

            console.log({
                a: document.getElementById("header__load").children[5],
            });
        });
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <title>Trang chủ</title>
</head>

<body>
    <div class="container-fluid contract__container">
        <div class="header__load" id="header__load"></div>

        <!-- main -->
        <div class="main">
            <div class="container">
                <div class="section__title">
                    Hợp đồng thuê giường của bạn
                </div>
                <div class="contract__body">
                    <div class="row">
                        <div class="col-12 contract__item-heading">
                            Thông tin về hai bên
                        </div>
                        <?php
                            $get_hopdong_by_admin = $pd->get_hopdong_by_admin($id);
                                if($get_hopdong_by_admin){
                                    while($result_admin = $get_hopdong_by_admin->fetch_assoc()){
                            ?> 
                        <div class="col-md-6">
                            <div class="contract__item-title">
                                Bên cho thuê trọ (Bên A)
                            </div>
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Họ và tên:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_admin['adminName']; ?>
                                </div>
                            </div>
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Sinh ngày:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_admin['ngaysinh']; ?>
                                </div>
                            </div>

                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Nơi đăng kí HK:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_admin['diachi']; ?>
                                </div>
                            </div>

                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Số CMND:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_admin['cmnd']; ?>
                                </div>
                            </div>  
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Số điện thoại
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_admin['sdt']; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                }
                        ?>
                         <?php
                            $get_hopdong_by_khachhang = $pd->get_hopdong_by_khachhang($id);
                                if($get_hopdong_by_khachhang){
                                    while($result_khachhang = $get_hopdong_by_khachhang->fetch_assoc()){
                            ?> 
                        <div class="col-md-6">
                            <div class="contract__item-title">
                                Bên thuê phòng trọ (Bên B)
                            </div>
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                        Họ và tên:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_khachhang['khachhangName']; ?>
                                </div>
                            </div>
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Sinh ngày:
                                </div>
                                <div class="contract__item-value">
                                    10/1/1970
                                </div>
                            </div>

                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Nơi đăng kí HK:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_khachhang['diachi']; ?>
                                </div>
                            </div>

                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Số CMND:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_khachhang['cmnd']; ?>
                                </div>
                            </div>

                           

                           
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Số điện thoại
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_khachhang['sdt']; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                }
                        ?>
                        <div class="col-12 contract__item-heading">
                            Thông tin hợp đồng
                        </div>
                        <?php
                            $get_hopdong_by_id = $pd->get_hopdong_by_id($id);
                                if($get_hopdong_by_id){
                                    while($result_id = $get_hopdong_by_id->fetch_assoc()){
                            ?> 
                        <div class="col-md-6">
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Ngày bất đầu thuê:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_id['ngayBd']; ?>

                                </div>
                            </div>

                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Ngày kết thúc hợp đồng:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_id['ngayKt']; ?>

                                </div>
                            </div>

                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Tiền giường:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_id['price']; ?>

                                </div>
                            </div>
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Chu kì thanh toán:
                                </div>
                                <div class="contract__item-value">
                                    1 tháng
                                </div>
                            </div>
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Ngày thu tiền:
                                </div>
                                <div class="contract__item-value">Ngày 10 hằng tháng </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Giường thuê:
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_id['giuongName']; ?>

                                </div>
                            </div>

                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Phòng :

                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_id['phongName']; ?>

                                </div>
                            </div>

                            <div class="contract__item-group">
                                <div class="contract__item-label">
                                    Tòa nhà :
                                </div>
                                <div class="contract__item-value">
                                <?php echo $result_id['toanhaName']; ?>

                                </div>
                            </div>
                            
                        </div>
                        <div class="col-12 contract__item-heading">
                            Hình ảnh hợp đồng
                        </div>
                        <div class="col-12">
                            <div class="contract__image">
                                <div class="contract__image-body">
                                    <img src="uploads/<?php echo $result_id['image_hopdong']; ?>" alt="" class="contract__image-img" />
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- about -->
        <div class="footer__load"></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/home.js"></script>
</body>

</html>