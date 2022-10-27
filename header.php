<?php
session_start();
error_reporting(0);
  include('./class/login.php');
  $p = new login();
  include('./class/tmdt.php');
$q = new quanly();
include('class/cls_giohang.php');
    $giohang = new giohang();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trang Chủ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/contact.css">
        <link rel="stylesheet" type="text/css" href="./css/index.css">
        <link rel="stylesheet" type="text/css" href="./css/home.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/product.css">
        <link rel="stylesheet" type="text/css" href="./css/call.css">
        <link rel="stylesheet" type="text/css" href="./css/responsive.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="./bootstrap/js/jquery-3.6.0.min.js"></script>
        <script src="./bootstrap/js/bootstrap.js"></script>
        <link rel="stylesheet" href="./font/themify-icons-font/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!-- slick Carousel CDN -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>
    </head>
    <body>
        <div class="main">
            <div class="header row form-group">
                <div class="header_group col-md-6 ">
                    <div class="header__content">
                    
                    <p class=""><i class="icon__email ti-email"></i>Xin Chào Khách Hàng</p>
                    <p class="header__content-sale">Miễn phí giao hàng cho những đơn hàng trên 1 triệu</p>
                    </div>
                    
                </div>
                <div class=" header__user col-md-6 ">
                    <div class="header__icon">
                        <a href=""><i class="ti-facebook"></i></a>
                        <a href=""><i class="ti-linkedin"></i></a>
                        <a href=""><i class="ti-twitter-alt"></i></a>
                        <a href=""><i class="ti-pinterest-alt"></i></a>
                    </div>

                    <?php if(isset($_SESSION['Username']))
							{?>
							<div class="header__tk">
                            <i class="ti-user"></i>
                                
                                    <?php echo $_SESSION['Username'];?>
                                    <a href="./Logout_user.php">Đăng Xuất</a>
                                
                            </div>
						  <?php }
                              else
								{?>
							<div class="header__tk">
                            <i class="ti-user"></i>
                            <a href="./login.php">Đăng nhập</a> 
                            <span>|</span>        
                            <a href="./Singup.php">Đăng ký</a>
                            </div>
							<?php }?>
                </div>
            </div>
            <div class="nav">
                <div class="header__nav row form-group">
                    <div class="logo_menu col-md-4 ">  
                        <img src="./img/logo_menu.png" alt="">        
                    </div>
                    <div class="main_menu col-md-6 ">
                        <ul id="header__nav-menu">
                            <li><a href="./index.php">Trang Chủ</a></li>
                            <li><a href="./list_product.php">Sản Phẩm</a></li>
                            <li><a href="./contact.php">Liên Hệ</a></li>
                            <li><a href="./hoso.php">Hồ Sơ</a></li>
                            <li><a href="./users.php">Chat</a></li>
                            <li class="subcart"><a href="./cart.php"><i class="ti-bag"></i></a></li>
                        </ul>
                    </div>
                    <div class="cart col-md-2 " style="display: inline-flex;">
                        <a href="cart.php"><i class="fa fa-shopping-bag"></i></a>
                    </div>
                </div>
            </div>