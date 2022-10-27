<?php
	session_start();
    error_reporting(0);
	include("class/config.php");
	if( isset($_SESSION['Username']) && isset($_SESSION['Password']))
	{
		header('location:index.php');
	}
	else
	{
	include('class/login.php');
	$p = new login();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Nhập</title>
    <meta charset="utf-8">
    <link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="./css/styleform.css">
    <link rel="stylesheet" href="./font/themify-icons-font/themify-icons/themify-icons.css">
</head>

<body>
    <div class="login">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.birds.min.js"></script>
    <script>
    VANTA.BIRDS({
      el: ".login",
      mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            alignment: 67.00,
            cohesion: 58.00,
            backgroundAlpha: 0.00
    })
    </script>
        <div class="logo-img">
            <img src="./img/logo.png" alt="logo" class="header-logo">
        </div>
        <div class="login-container">
            <header class="login-header">
                <h3>Đăng Nhập</h3>
            </header>
            <div class="login-body">
                <form method="post">
                    <div class="user-box">
                        <input type="text" name="Username" placeholder="Tên Tài Khoản">
                    </div>
                    <div class="user-box">
                        <input type="password" name="Password"  placeholder="Mật Khẩu">
                    </div>
                    <div class="login-btn">
                        <button class="" type="submit" id="btn_singup" name="btn_submit" value="Đăng nhập">
                            <b>Đăng Nhập</b>
                        </button>
                        <?php
						 switch($_POST['btn_submit'])
						  {
							case 'Đăng nhập':
							{
								$Username = $_POST["Username"];
								$Password = $_POST["Password"];
                                $PhanQuyen = 0 ;
									if($p->mylogin($Username,$Password,$PhanQuyen )==1)
									{
										header('location:index.php');
									}
									else
									{
										echo 'Đăng Nhập Không Thành Công';
									}
									break;
								}
                                case 'Đăng ký':
                                    {
                                        header('location: Singup.php');
                                            break;
                                        }
						 }

				 	 ?>
                        <a href="./Singup.php">
                            <span></span>
                            <button class="" type="submit" id="btn_singup" name="btn_submit" value="Đăng ký">
                                <b>Đăng Ký</b>
                            </button>
                        </a>
                    </div>
                    <div class="btn-social">
                        <a href="" class="btn-facebook">
                            <i class="ti-facebook"></i>
                            Kết nối bằng Facebook
                        </a>
                        <?php require_once 'class/config.php'; 
                        echo '<a href="'.$client->createAuthUrl().'" class="btn-google">
                            <i class="ti-google"></i>
                            Kết nối bằng Google
                        </a>';
                        ?>
                    </div>  
                </form>
            </div>
        </div>
    </div>
<script>

</script>

</body>

</html>