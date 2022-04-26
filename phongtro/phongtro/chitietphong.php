<?php	
include("inc/header.php");
?>
<?php
if(!isset($_GET['phongid']) || $_GET['phongid']==NULL)
{
	echo "<script>window.lotoanhaion ='404.php'</script>";
}else
{
	$id=$_GET['phongid'];	
}
?>
        <div class="container-fluid list-room">
            <div class="container">
            <?php
                $getphongchitiet = $phong->get_phong_chitiet($id);
                if($getphongchitiet){
                while($result = $getphongchitiet->fetch_assoc()){
            ?>
                <div class="row m-0">
                                    <div class="col-lg-9">
                                                    <div class="main-info">
                                                        <div class="row m-0">
                                                            <div
                                                                class="col-12 col-md-8 left-info no-padding-right"
                                                            >
                                                                <div
                                                                    class="address"
                                                                >
                                                                    <span
                                                                        class="btn info-label"
                                                                        >Địa
                                                                        chỉ</span
                                                                    >
                                                                    <span
                                                                        class="address-text"
                                                                    ><?php echo $result['diachi'];?></span>
                                                                </div>
                                                                <div
                                                                    class="floor"
                                                                >
                                                                    <span
                                                                        class="btn info-label"
                                                                        >Tầng</span
                                                                    >
                                                                    <span
                                                                        class="floor-text"
                                                                    ><?php echo $result['tang'];?></span>
                                                                </div>
                                                                <div
                                                                    class="room"
                                                                >
                                                                    <span
                                                                        class="btn info-label"
                                                                        >Phòng</span
                                                                    >
                                                                    <span
                                                                        class="room-text"
                                                                    ><?php echo $result['phongName'];?></span>
                                                                </div>
                                                                
                                                                <div
                                                                    class="price"
                                                                >
                                                                    <span
                                                                        class="btn info-label"
                                                                        >Giá</span
                                                                    >
                                                                    <span
                                                                        class="price-text"
                                                                    ><?php echo $result['price'];?></span>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                            <div
                                                                class="col-12 col-md-4 info-contact"
                                                            >
                                                                <div
                                                                    class="contact-label"
                                                                >
                                                                    <i
                                                                        class="fa-solid fa-mobile-screen"
                                                                    ></i>

                                                                    Thông tin
                                                                    liên hệ
                                                                </div>
                                                                <?php
                                                                    $showadmin = $phong->showadmin();
                                                                    if($showadmin){
                                                                    while($result_showadmin = $showadmin->fetch_assoc()){
                                                                ?>
                                                                <div
                                                                    class="info-boss"
                                                                >
                                                                    <i
                                                                        class="fa-solid fa-user"
                                                                    ></i>
                                                                    <?php echo $result_showadmin['adminName'];?></span>

                                                                </div>
                                                                <div
                                                                    class="info-phone"
                                                                >
                                                                    <i
                                                                        class="fa-solid fa-mobile-screen"
                                                                    ></i>

                                                                    <?php echo $result_showadmin['sdt'];?></span>

                                                                </div>
                                                                <?php

                                                                    }
                                                                }
                                                            ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="room-detail-img"
                                                    >
                                                        <div class="row m-0">
                                                            <div
                                                                id="carousel"
                                                                class="carousel slide"
                                                                data-ride="carousel"
                                                            >
                                                                <ol
                                                                    class="carousel-indicators"
                                                                >
                                                                    <li
                                                                        data-target="#carousel"
                                                                        data-slide-to="0"
                                                                        class="active"
                                                                    ></li>
                                                                    <li
                                                                        data-target="#carousel"
                                                                        data-slide-to="1"
                                                                    ></li>
                                                                    <li
                                                                        data-target="#carousel"
                                                                        data-slide-to="2"
                                                                    ></li>
                                                                </ol>
                                                                <div
                                                                    class="carousel-inner" style="width: 600px;height: 400px;"
                                                                >
                                                                <?php
                                                                        $getphongchitiet = $phong->get_phong_chitiet($id);
                                                                        if($getphongchitiet){
                                                                        while($result = $getphongchitiet->fetch_assoc()){
                                                                    ?>
                                                                    <div
                                                                        class="carousel-item active"
                                                                    >
                                                                        <img
                                                                            class="d-block w-100"
                                                                            src="admin/uploads/<?php echo $result['image_phong'];?>"
                                                                            alt="First slide"
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="carousel-item"
                                                                    >
                                                                        <img
                                                                            class="d-block w-100"
                                                                            src="admin/uploads/<?php echo $result['image_phong'];?>"
                                                                            alt="Second slide"
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="carousel-item"
                                                                    >
                                                                        <img
                                                                            class="d-block w-100"
                                                                            src="admin/uploads/<?php echo $result['image_phong'];?>"
                                                                            alt="Third slide"
                                                                        />
                                                                    </div>
                                                                </div>
                                                                <a
                                                                    class="carousel-control-prev"
                                                                    href="#carousel"
                                                                    role="button"
                                                                    data-slide="prev"
                                                                >
                                                                    <span
                                                                        class="carousel-control-prev-icon"
                                                                        aria-hidden="true"
                                                                    ></span>
                                                                    <span
                                                                        class="sr-only"
                                                                        >Previous</span
                                                                    >
                                                                </a>
                                                                <a
                                                                    class="carousel-control-next"
                                                                    href="#carousel"
                                                                    role="button"
                                                                    data-slide="next"
                                                                >
                                                                    <span
                                                                        class="carousel-control-next-icon"
                                                                        aria-hidden="true"
                                                                    ></span>
                                                                    <span
                                                                        class="sr-only"
                                                                        >Next</span
                                                                    >
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="room-detail">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div
                                                                    class="room-detail__label"
                                                                >
                                                                    <h3>
                                                                        Thông
                                                                        tin chi
                                                                        tiết
                                                                    </h3>
                                                                </div>
                                                                <div
                                                                    class="room-detail__content"
                                                                >
                                                                    Tòa nhà VP
                                                                    phố Chùa
                                                                    Láng nằm
                                                                    trong khu
                                                                    vực trung
                                                                    tâm của quận
                                                                    Đống Đa với
                                                                    trường
                                                                    học,bệnh
                                                                    viện,các
                                                                    trung tâm
                                                                    thương
                                                                    mại...Hiện
                                                                    tòa nhà còn
                                                                    trống sàn
                                                                    với diện
                                                                    tích: -P401
                                                                    80m2 giá
                                                                    23tr/thángGiá
                                                                    trên đã bao
                                                                    gồm phí dịch
                                                                    vụ chung của
                                                                    tòa nhà
                                                                    Setup đầy đủ
                                                                    các tiện
                                                                    nghi với
                                                                    đèn, trần,
                                                                    sàn, cửa
                                                                    kính, điều
                                                                    hòa chuẩn
                                                                    văn phòng.+
                                                                    Nằm ngay mặt
                                                                    đường, ngã
                                                                    ba hồ Chùa
                                                                    Láng, view
                                                                    hồ.+ Sát khu
                                                                    nhiều ngân
                                                                    hàng, văn
                                                                    phòng, quán
                                                                    cafe, hàng
                                                                    ăn. + Có
                                                                    hầm, bãi để
                                                                    xe; có thang
                                                                    máy, wc
                                                                    riêng biệt,
                                                                    sạch sẽ.+
                                                                    Văn phòng
                                                                    mới, đẹp, hỗ
                                                                    trợ tối đa
                                                                    các dịch vụ
                                                                    văn phòng đi
                                                                    kèm.+ Bảo vệ
                                                                    24/24, dọn
                                                                    dẹp thường
                                                                    xuyên.Liên
                                                                    hệ trực tiếp
                                                                    Quản Lý tòa
                                                                    nhà để được
                                                                    tư vấn tốt
                                                                    nhất Mrs
                                                                    Tuyết Mai :
                                                                    0866683628
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                        }
                                                    }
                                                    ?>
                                                <div
                                                    class="col-lg-3 col-md-5 pl-0 mb-5"
                                                >
                                                    <div class="mt-3">
                                                        <div
                                                            class="color-group d-flex align-items-center"
                                                        >
                                                            <div
                                                                class="color-label mr-1"
                                                            ></div>
                                                            Đã có người đặt
                                                        </div>
                                                        <div
                                                            class="color-group d-flex align-items-center"
                                                        >
                                                            <div
                                                                class="color-label mr-1"
                                                            ></div>
                                                            Còn trống
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-center pt-4"
                                                    >
                                                        <h5>Giường tầng 1</h5>
                                                    </div>
                                                    
                                                    <div class="room-floor row">
                                                    <?php
                                                        $getphongchitiet1 = $phong->get_giuong_chitiet_tang1($id);
                                                        if($getphongchitiet1){
                                                        while($result1 = $getphongchitiet1->fetch_assoc()){
                                                    ?>
                                                    <?php
                                                        if($result1['trangthai']==1)
                                                        {
                                                        ?>
                                                        <div
                                                            class="col-6 bed text-center"
                                                        >
                                                            <ion-icon
                                                                name="bed-outline"
                                                                class="active"
                                                            ></ion-icon>
                                                        </div>
                                                        <?php
                                                        }else{
                                                        ?>	
                                                        <div
                                                            class="col-6 bed text-center"
                                                        >
                                                            <ion-icon
                                                                name="bed-outline"
                                                            ></ion-icon>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    
                                                    </div>
                                                    <div
                                                        class="text-center pt-4"
                                                    >
                                                        <h5>Giường tầng 2</h5>
                                                    </div>
                                                    <div class="room-floor row">
                                                    <?php
                                                        $getphongchitiet1 = $phong->get_giuong_chitiet_tang2($id);
                                                        if($getphongchitiet1){
                                                        while($result1 = $getphongchitiet1->fetch_assoc()){
                                                    ?>
                                                    <?php
                                                        if($result1['trangthai']==1)
                                                        {
                                                        ?>
                                                        <div
                                                            class="col-6 bed text-center"
                                                        >
                                                            <ion-icon
                                                                name="bed-outline"
                                                                class="active"
                                                            ></ion-icon>
                                                        </div>
                                                        <?php
                                                        }else{
                                                        ?>	
                                                        <div
                                                            class="col-6 bed text-center"
                                                        >
                                                            <ion-icon
                                                                name="bed-outline"
                                                            ></ion-icon>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>            
            </div>
            
        </div>

 <?php
 include('inc/footer.php');
 ?>

