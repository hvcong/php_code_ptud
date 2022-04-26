<?php	
include("inc/header.php");
?>
<div class="container-fluid build__container">
        <div class="header__load">
        </div>
        <!-- main -->
        <div class="main__container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="builds section__container">
                            <div class="builds__title section__title">
                                Danh sách các tòa nhà
                            </div>
                            <div class="buils__body">
                                <div class="row">
									<?php
										$gettoanha = $toanha->show_toanhaview();
										if($gettoanha){
										while($result = $gettoanha->fetch_assoc()){
									?>
                                    <div class="col-lg-6">
                                        <div class="build">
                                            <div class="build__top">
                                                <img src="admin/uploads/<?php echo $result['image'];?>" alt="" class="build__top-img" width="700" height="300" />
                                                <div class="build__top-link">
                                                    <i class="fa-solid fa-angles-right build__top-link-icon"></i>

                                                   <span class="build__top-link-text"><a href="dsphong.php?toanhaid=<?php echo $result['toanhaId']; ?>" class="menu__item-link item__menu-2" >Xem chi tiêt</a></span>
                                                    </div>
                                                    <div class="build__top-status ">Còn giường trống</div>
                                                    <div class="build__top-favorite active"><i class="fa-solid fa-heart build__top-heart"></i>
                                                    </div>
                                                </div>

                                                <div class="build__body">
                                                    <div class="build__body-name"><span class="build__body-item-label">Tên tòa:</span>
                                                    <span class="build__body-item-value"><?php echo $result['toanhaName']?></span>
                                                </div>
                                                <div class="build__body-item"><span class="build__body-item-label">Địa chỉ:</span>
                                                    <span class="build__body-item-value"><?php echo $result['diachi']?></span>
                                                </div>
                                                <div class="build__body-item"><span class="build__body-item-label">Số phòng:</span>
                                                    <span class="build__body-item-value"><?php echo $result['sophong']?></span>
                                                </div>
                                                
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
                        <div class="col-lg-2 d-none d-lg-block">
                            <div class="advertise">
                                <div
                                    class="advertise__item advertise__item-1"
                                ></div>
                                <div
                                    class="advertise__item advertise__item-2"
                                ></div>
                                <div
                                    class="advertise__item advertise__item-3"
                                ></div>
                                <div
                                    class="advertise__item advertise__item-4"
                                ></div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

 <?php
 include('inc/footer.php');
 ?>

