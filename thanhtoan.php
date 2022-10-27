<?php include('header.php'); 
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']= array();
}

?>

    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>CHI TIẾT ĐƠN HÀNG</h4>
                <form method="post" action="">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="checkout__input">
                                <p>Họ tên<span>*</span></p>
                                <input type="text" name="hoten" id="hoten">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="diachi" id="diachi">
                            </div>
                            <div class="checkout__input">
                                <p>Số điện thoại<span>*</span></p>
                                <input type="text" name="sodienthoai" id="sodienthoai">
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú thêm</p>
                                <input type="text" name="ghichu" id="ghichu">
                            </div>
                        </div>
                        <div class="col-md-5">
                        <div class="shoping__checkout">
                        <h5>Tổng tiền giỏ hàng
                        </h5>
                        <ul>
                            <li><span class="tongtien_sanpham"><?php 
                            if(!empty($_SESSION['cart'])){
                                $giohang->chitiet_donhang();
                                
                           }
                            ?></span></li>
                            
                        </ul>
                        <form id = "cart-form" action="" method="POST">
                        <button type="submit" class="site-btn" name="nut" id="nut" value="Đặt hàng">Đặt hàng</button>
                        </form>
                    </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php
        switch($_POST['nut'])
	{
		case 'Đặt hàng':
		{ if(isset($_SESSION['Username'])&&isset($_SESSION['Password'])){
                $HoTen=$_POST['hoten'];
                $SDT=$_POST['sodienthoai'];
                $DiaChi=$_POST['diachi'];
                $Email=$_SESSION['Username'];
                $Note=$_POST['ghichu'];
                $MaDH= rand(0, 1000);
                $TrangThai=1;
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $time_now=getdate();
                $show_date= $time_now['mday'].'/'.$time_now['mon'].'/'.$time_now['year'];
                $link = $giohang->connect();
                $ketqua = mysqli_query($link,"select * from sanpham where MaSP IN (".implode(",",array_keys($_SESSION["cart"])).")");
                $tongtien=0;
                $orderproducts= array();
                    while($row=mysqli_fetch_array($ketqua))
                    {
                        $orderproducts[]=$row;
                        $tongtien +=$_SESSION['cart'][$row['MaSP']] * $row['DonGia'];
                        
                        
                    }
                    if($HoTen!=''&&$SDT!=''&&$DiaChi!='')
                    {
                                if($giohang->themxoasua("INSERT INTO `myngheviet`.`donhang` (`MaDH`,`HoTen` ,`SDT` ,`DiaChi` ,`Email` ,`TongTien` ,`Note` ,`TrangThai`,`NgayDatHang`)VALUES ('$MaDH','$HoTen', '$SDT', '$DiaChi', '$Email', '$tongtien', '$Note', '$TrangThai','$show_date');")==1)
                                {
                                    $orderid=$link->insert_id;
                                    $insertstring= "";
                                    foreach($orderproducts as $key => $product)
                                        {
                                            $insertstring .="('".$MaDH."','".$product['MaSP']."','".$_SESSION['cart'][$product['MaSP']]."')";  
                                            if($key != count($orderproducts)-1){
                                                $insertstring .=",";
                                            } 
                                        }
                                        $insertctdh = mysqli_query($link, "INSERT INTO `chitietdonhang`(`MaDH`, `MaSP`, `SoLuong`) VALUES ".$insertstring.";");
                                        echo "<script>window.location.href='phuongthucthanhtoan.php';</script>";
                                        unset($_SESSION["cart"]);
                                        session_start();
                                        error_reporting(0);
                                        $_SESSION['ttdonhang']=$MaDH;
                                        $_SESSION['tongtien']=$tongtien;
                                }
                                else
                                {
                                    echo'Đặt hàng không thành công';
                                }
        
                    }
                    else
                    {
                    echo'Bạn vui lòng nhập đầy đủ thông tin để cửa hàng có thể giao hàng cho bạn nhé';
                    }
            }else{
                echo "
                <script>
                    window.location.href= 'login.php';
                </script>
                ";
            }
			
                break;
			}
    }
            
?> 
    </section>
    <!-- Checkout Section End -->
<?php include('footer.php'); ?>