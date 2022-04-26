<?php
//$filepath = realpath(dirname(__FILE__));
include ('lib/session.php');
//include ($filepath.'lib/session.php');
Session :: init();
//include_once($filepath.'../lib/database.php');
//include($filepath.'../helpers/format.php');
include_once 'lib/database.php';
include_once 'helpers/format.php';
?>
<?php

	/*spl_autoload_register(function($class)
	{
		include_once "classes/".$class.".php";
	});*/?>
<?php include 'classes/phong.php';?>
<?php include 'classes/toanha.php';?>
<?php include 'classes/giuong.php';?>

		
<?php
	$db = new Database();
	$fm = new Format();

	$phong = new phong();
	$toanha = new toanha();
	$giuong = new giuong();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <!-- ion icon  -->
     <script
            type="module"
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
     <script
            nomodule
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
     ></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="admin/css/stylelogin.css" media="screen"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/listBuild.css"/>
    <link rel="stylesheet" href="css/policy.css"/>
    <link rel="stylesheet" href="css/listRoom.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="stylesheet" href="css/contact.css"/>
    <link rel="stylesheet" href="css/home.css"/>
    
    
    






</head>

<body>
<div class="container-fluid home__container">
    <div class="header__container">
        <div class="container">
            <div class="header__body">
                <div class="logo">
                    <img src="images/logo.jpg" alt="" class="logo__img" />
                </div>

                <!-- menu -->
                <div class="menu__container">
                    <div class="menu__item">
                        <a href="index.php" class="menu__item-link item__menu-1">Trang chủ</a
                            >
                        </div>
                        <div class="menu__item">
                            <a
                                href="toanhaview.php"
                                class="menu__item-link item__menu-2"
                                >Tòa nhà</a
                            >
                        </div>
                        <div class="menu__item">
                            <a
                                href="lienhe.php"
                                class="menu__item-link item__menu-3"
                                >Liên hệ</a
                            >
                        </div>
                        <div class="menu__item">
                            <a
                                href="chinhsach.php
                                "
                                class="menu__item-link item__menu-4"
                                >Chính sách</a
                            >
                        </div>
                    </div>

                    <!-- account -->
                    <div class="account__container bg-secondary">
                        <i class="fa-solid fa-user account__icon"></i>
                        <div class="account__list arrow-top">
                            <div class="account__item">
                                <div class="account__item-icon">
                                    <i
                                        class="fa-solid fa-arrow-right-to-bracket"
                                    ></i>
                                </div>
                                <a 
                                    href="admin/phongadd.php"
                                    class="account__item-link"
                                    >Đăng nhập quản trị viên</a
                                >
                            </div>
                            <div class="account__item">
                                <div class="account__item-icon">
                                    <i class="fa-solid fa-file-lines"></i>
                                </div>
                                <a href="user/viewuser.php">
                                <div class="account__item-link">
                                    Thông tin của tôi
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    


