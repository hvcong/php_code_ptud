<?php	
include("inc/header.php");
?>
<?php
if(!isset($_GET['toanhaid']) || $_GET['toanhaid']==NULL)
{
	echo "<script>window.lotoanhaion ='404.php'</script>";
}else
{
	$id=$_GET['toanhaid'];	
}
?>
        <div class="container-fluid list-room">
            <div class="container">
                <div class="list-room__title mt-4">Danh sách các phòng</div>
                <div class="column">
                    <?php
                    $getphong = $toanha->get_phong_by_toanha($id);
                    if($getphong){
                    while($result = $getphong->fetch_assoc()){
                    ?>
                    <div class="row my-4">
                        <div class="build column">
                            <div class="build__top col-lg-4 col-4" style="width: 500px; height: 200px;">
                                <img
                                    src="admin/uploads/<?php echo $result['image_phong'];?>"
                                    alt=""
                                    class="build__top-img py-2" style="width: 250px;height: 200px;"
                                />
                            </div>
                            <div
                                class="build__top-status build__top-status-empty"
                            >
                                đã thuê
                            </div>
                            <div class="build__body col-lg-6 col-md-6">
                                <div class="build__body-name">
                                    <span class="build__body-label"
                                        >Tên tòa:
                                    </span>
                                    <span class="build__body-name-value">
                                    <?php echo $result['toanhaName']?>
                                    </span>
                                </div>
                                <div class="build__body-name">
                                    <span class="build__body-label"
                                        >Tầng:
                                    </span>
                                    <span class="build__body-name-value">
                                    <?php echo $result['tang']?>
                                    </span>
                                </div>
                                <div class="build__body-name">
                                    <span class="build__body-label"
                                        >Phòng:
                                    </span>
                                    <span class="build__body-name-value">
                                    <?php echo $result['phongName']?>
                                    </span>
                                </div>
                                <div class="build__body-price">
                                    <span class="build__body-label">Giá: </span>
                                    <span class="build__body-price-num"
                                        ><?php echo $result['price']?></span
                                    >
                                    <span class="build__body-price-sub"
                                        >đồng/giường</span
                                    >
                                </div>
                            </div>
                            <div class="build__bottom col-lg-2 col-md-2">

                                <a href="chitietphong.php?phongid=<?php echo $result['phongId']; ?>" style="text-decoration: none;color: black;" class="menu__item-link1" ><button
                                    type="button"
                                    class="btn"
                                    data-toggle="modal"
                                >Xem chi tiết</button></a>
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

 <?php
 include('inc/footer.php');
 ?>

