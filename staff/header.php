<?php
	
	if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset($_SESSION['password']))
	{
		include("class/clslogin.php");
		$q = new login();
        error_reporting(0);
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | oganic</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="Public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="Public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="Public/admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="Public/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="Public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="Public/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="Public/admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/styles.css">
    
    <!-- Ionicons -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Trang chủ</a>
                </li>
            </ul>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                    <a href="./logout.php">
                        <i class="far fa-comments"></i>
                    </a>
                <!-- Notifications Dropdown Menu -->
                
            </ul>
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../staff/images/logo_menu.png" alt="Logo"  style=" background-color:#FFF; border-radius:20px; width: 200px; height: 60px; margin-left:15px" >
                <span class="brand-text font-weight-light"></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">Xin Chào</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Trang chủ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ ĐƠN HÀNG
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="dsdonhang.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Danh sách đơn hàng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Thống kê đơn hàng</p>
                                    </a>
                                </li>
                            </ul>

                                
                    
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="dssp.php" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ SẢN PHẨM
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="dssp.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Danh sách sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="themsp.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Thêm sản phẩm</p>
                                    </a>
                                </li>
                                

                            </ul>
                        </li>

                        <li class="nav-item has-treeview dropdown">
                            <a href="dsdm.php" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ DANH MỤC
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                            <li class="nav-item">
                                    <a href="dsdm.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Danh sách danh mục</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="themdm.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Thêm danh mục</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ KHUYẾN MÃI
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="./DS_HoSoBenhVien.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Tạo khuyến mãi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./danhsachbenhnhan.php" class="nav-link"
                                        style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Cập nhật khuyến mãi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÍ KHÁCH HÀNG
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="./dskhachhang.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Danh sách khách hàng</p>
                                    </a>
                                </li>                   
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>