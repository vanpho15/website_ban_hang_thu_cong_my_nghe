<?php include('header.php'); 
?>
    <!-- Checkout Section Begin -->
    <div><h2 style="text-align: center; padding-bottom: 50px;">Phương thức thanh toán</h2></div>
    <div class="row form-group">
    <div class=" col-md-3 "></div>
    <div class=" col-md-2 ">
    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="./xulythanhtoanmomo.php">
                <input type="submit" name="momo" value="Thanh toán MoMo QRcode" class="btn btn-danger">
                </form>
    </div>
    <div class=" col-md-2 ">
    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="./xulythanhtoanmomo_atm.php">
                <input type="submit" name="momo" value="Thanh toán MoMo ATM" class="btn btn-danger">
                </form>
    </div>
    <div class=" col-md-2 ">
    <form class="" method="post" >
                <input type="submit" name="btn_submit" value="Thanh Toán Tiền Mặt" class="btn btn-danger">
                <?php
						 switch($_POST['btn_submit'])
						  {
							case 'Thanh Toán Tiền Mặt':
							{
								$conn = mysqli_connect('localhost', 'root', '', 'myngheviet') or die('Lỗi kết nối');
                                mysqli_set_charset($conn, "utf8");
                                $sql="UPDATE `donhang` SET `PPThanhToan` = 'Tiền Mặt', `TrangThaiTT` = 'Chưa Thanh toán' WHERE `donhang`.`MaDH` ='{$_SESSION['ttdonhang']}' ";
                                $result = mysqli_query($conn, $sql);
                                    echo "
                                        <script>

                                            window.location.href= 'Dathangthanhcong.php';
                                        </script>
                                        ";
									break;
								}
						 }

				 	 ?>
        </form>
    </div>
    <div class=" col-md-3 "></div>
    </div>
    <!-- Checkout Section End -->
<?php include('footer.php'); ?>