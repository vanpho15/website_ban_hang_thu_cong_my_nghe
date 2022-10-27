<?php 
                    error_reporting(0);
                    include("./class/config.php");
                    if (isset($_POST["btn_submit"])) {
                        $recaptchaResponse = $_POST["g-recaptcha-response"];
                        $userIp = $_SERVER["REMOTE_ADDR"];
                        $request = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$userIp}";
                        $content = file_get_contents($request);
                        $json = json_decode($content);
                        if ($json->success == "true") {
                                $PhanQuyen = 0;
                                $Sdt = $_POST["sdt"];
                                $Diachi = $_POST["diachi"];
                                $Username = $_POST["Email"];
                                $unique_id=rand(time(), 100000000);
                                $MatKhau = md5($_POST["MatKhau"]);
                                $conn = mysqli_connect('localhost', 'root', '', 'myngheviet') or die('Lỗi kết nối');
                                mysqli_set_charset($conn, "utf8");
                                $sql = "SELECT * FROM taikhoan WHERE Username = '$Username' ";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                echo 'Email đã được đăng ký tài khoản';
                                } else {
                                $sql="INSERT INTO `taikhoan` (`Username`, `Password`, `PhanQuyen`, `MaKH`, `unique_id`, `TrangThai`) VALUES ('$Username', '$MatKhau', '$PhanQuyen', NULL, '$unique_id', 'Offline')";

                                if (mysqli_query($conn, $sql)) {
                                    echo 'đăng ký thành công';
                                    $sql1 = "INSERT INTO khachhang (Email, SDT, DiaChi) VALUES ('$Username','$Sdt','$Diachi')";
                                    if (mysqli_query($conn, $sql1)) {
                                        header('location: login.php');
                                    }
                                } else {
                                    echo 'Có lỗi trong quá trình xử lý';
                                }
                                }
                        } else {
                             $msg="You have failed to pass recaptcha. What does this means? ROBOT!";
                        }
                    }

                    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Ký</title>
    <meta charset="utf-8">
    <link rel="icon" href="./img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="./css/styleform.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                <h3>Đăng Ký</h3>
            </header>
            <div class="login-body">
                <form method="post">
                    <div class="user-box">
                    
                        <input type="email" name="Email" required="" placeholder="Username là Email">
                    </div>
                    <div class="user-box">
                        <input type="password" name="MatKhau"  required="" placeholder="Mật Khẩu">
                    </div>
                    <div class="user-box">
                        <input type="text" name="sdt" required="" placeholder="Số Điện Thoại">
                    </div>
                    <div class="user-box">
                        <input type="text" name="diachi" required="" placeholder="Địa Chỉ">
                    </div>
                    <div class="g-recaptcha mb-3" data-sitekey="<?php echo $siteKey; ?>"></div>
                    <div class="login-btn">
                            <button class="" type="submit" id="btn_singup" name="btn_submit" value="Đăng ký">
                                <b>Đăng Ký</b>
                            </button>
                            
                    </div>
                    <div style="text-align: center;"><p style="text-aline:center;"><?php echo $msg; ?></p></div>
                </form>
            </div>
        </div>
    </div>
<script>

</script>

</body>

</html>