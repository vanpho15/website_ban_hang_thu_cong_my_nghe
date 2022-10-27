<?php 
include('header.php'); 
if(isset($_GET['partnerCode'])){
    $partnerCode=$_GET['partnerCode'];
    $orderId=$_GET['orderId'];
    $amount=$_GET['amount'];
    $orderType=$_GET['orderType'];
    $transId=$_GET['transId'];
    $conn = mysqli_connect('localhost', 'root', '', 'myngheviet') or die('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
    $sql="INSERT INTO `tt_momo` (`id_momo`, `partnerCode`, `orderId`, `amount`, `orderType`, `transId`) VALUES (NULL, '$partnerCode', '$orderId', '$amount', '$orderType', '$transId')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql1="UPDATE `donhang` SET `PPThanhToan` = '$orderType', `TrangThaiTT` = 'Đã thanh toán' WHERE `donhang`.`MaDH` ='{$_SESSION['ttdonhang']}' ";
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            echo "
            <script>
                window.location.href= 'Dathangthanhcong.php';
            </script>
            ";
            return 1;
        }else{
            return 0;
        }
    }
}
?>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <center><img src="img/check.png"></center>
            <div class="content_dathangthanhcong">
                <h2>Thành công!</h2>
                <p>Đơn hàng của quý khách đang chờ xử lý!</p>
                <p>Cảm ơn quý khách đã đặt hàng tại Mỹ Nghệ Việt!</p>
                <p>Chúng tôi sẽ liên hệ quý khách hàng để xác nhận đơn hàng trong thời gian sớm nhất</p>
                <p>Xin chân thành cảm ơn!</p>
                <div class="btn_muathem"><a href="index.php">Mua thêm</a></div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
<?php include('footer.php'); ?>