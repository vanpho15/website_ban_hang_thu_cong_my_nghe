
    <?php
    session_start();
    error_reporting(0);
    include_once "./class/config.php";
    if (!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }else{
        include('header.php');
    ?>
    <style>
        #list_donhang {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            
        }
        
        #list_donhang td,#list_donhang th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #list_donhang td{text-align: center;}
        #list_donhang tr:nth-child(even){background-color: #f2f2f2;}
        
        #list_donhang tr:hover {background-color: #ddd;}
        
        #list_donhang th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="./css/hoso.css">
    <div class="row form-group acount">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row form-group hoso">
                    <h2>HỒ SƠ CÁ NHÂN</h2>
                        <?php
                        $q->load_hoso("select * from khachhang inner join taikhoan on khachhang.Email=taikhoan.Username where taikhoan.unique_id ={$_SESSION['unique_id']} ");
                        ?>
                        <button type="button" class="btn btn-primary js-suahoso">Cập nhật</button>
                    <div class="col-md-4"></div>
                </div>
                <?php
                $rowhs = $q->get_hoso($_SESSION['Username']);
                switch($_POST['nut'])
                    {
                    case 'Cập Nhập':
                    {
                                $hoten=$_REQUEST['hoten'];
                                $diachi=$_REQUEST['diachi'];
                                $sdt=$_REQUEST['sdt'];
                                $name=$_FILES['Hinh']['name'];
                                $tmp_name=$_FILES['Hinh']['tmp_name'];
                                $type=$_FILES['Hinh']['type'];
                                $size=$_FILES['Hinh']['size'];
                                if($name!=""){
                                    $q->myupfile($name,$tmp_name,'./img');
                                    $acount=$_SESSION['Username'];
                                    if($q->themxoasua("UPDATE `khachhang` SET `HoTen`='$hoten',`DiaChi`='$diachi',`SDT`='$sdt',`Hinh`='$name' WHERE `Email`='$acount'")==1)
                                    {
                                            echo "<script>window.location.href='hoso.php';</script>"; 
                                    }
                                    else
                                    {
                                        echo 'Sửa không thành công';
                                    }
                                }else{
                                    $acount=$_SESSION['Username'];
                                    if($q->themxoasua("UPDATE `khachhang` SET `HoTen`='$hoten',`DiaChi`='$diachi',`SDT`='$sdt' WHERE `Email`='$acount'")==1)
                                    {
                                            echo "<script>window.location.href='hoso.php';</script>"; 
                                    }
                                    else
                                    {
                                        echo 'Sửa không thành công';
                                    }

                                }
                                    
                                        
                                    break;
                                }
                    }
                //bắt đầu sửa hồ sơ
                ?>
                <div class="modal">
                    <div class="modal-container">
                    <div class="modal-close">
                        <i class="ti-close"></i>
                        <div class="clear"></div>
                        <div class="modal-header">
                            <i class="ti-bag"></i>
                            Cập nhật hồ sơ
                        </div>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                      <table width="813"  align="center">
                        <tr>
                          <td width="240" height="48"><strong>Họ Và Tên</strong></td>
                          <td width="488"><label for="hoten"></label>
                          <input name="hoten" type="text" id="hoten" value="<?php echo $rowhs['HoTen']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td height="52"><strong>SDT</strong></td>
                          <td><label for="sdt"></label>
                          <input name="sdt" type="text" id="sdt" value="<?php echo $rowhs['SDT']?>"/></td>
                        </tr>
                        <tr>
                          <td height="52"><strong>Địa Chỉ</strong></td>
                          <td><label for="diachi"></label>
                          <input name="diachi" type="text" id="diachi" value="<?php echo $rowhs['DiaChi']?>"/></td>
                        </tr>
                        <tr>
                          <td height="52"><strong>Email</strong></td>
                          <td><label for="email"></label>
                          <input name="email" type="text" id="email" value="<?php echo $rowhs['Email']?>"/></td>
                        </tr>
                        <tr>
                          <td height="63"><strong>Ảnh</strong></td>
                          <td><label for="Hinh"></label>
                          <img src="./img/<?php echo $rowhs['Hinh']?>" style="width: 150px; height:150px">
                          <input type="file" name="Hinh" id="Hinh" /></td>
                        </tr>
                        <tr>
                          <td height="115" colspan="2" align="center">
							<button  type="submit" name="nut" id="buy-capnhat" value="Cập Nhập"><i class="ti-check"></i></button>
                            <button type="button" class="btn btn-primary js-xemdh">Xem chi tiết</button>
                        </tr>
                      </table>
                  </form>
                    </div>
                </div>
            </div>
            <script>
                const buyBtns = document.querySelectorAll('.js-suahoso');
                const modal = document.querySelector('.modal');
                const ticloses = document.querySelectorAll('.ti-close')
                const modalcontainer = document.querySelector('.modal-container')


                function showBuyTickets(){
                    modal.classList.add('open')
                }
                function RemoveTickets(){
                    modal.classList.remove('open')
                }

                for(const buyBtn of buyBtns){
                    buyBtn.addEventListener('click', showBuyTickets)
                }
                for(const ticlose of ticloses){
                    ticlose.addEventListener('click', RemoveTickets)
                }

                /*Bấm ở ngoài thì ẩn đi*/
                modal.addEventListener('click', RemoveTickets)

                modalcontainer.addEventListener('click', function(event){
                    event.stopPropagation()
                })
            </script>
                <?php
                
                //kết thúc sửa hồ sơ
                ?>
                
            </div>
            <div class="col-md-2"></div>
        </div>
        
        <div class="row form-group">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                    <h2 class="donhangcuaban">ĐƠN HÀNG CỦA BẠN</h2>
                    <table id="list_donhang">
                        <tr>
                            <th>STT</th>
                            <th>Mã Đơn hàng</th>
                            <th>Tổng tiền</th>
                            <th>phương thức thanh toán</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Tình trạng đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Thao tác</th>
                            
                        </tr>
                        <?php
                            $q->load_donhang_khachhang("select* from donhang inner join trangthaidh on donhang.TrangThai= trangthaidh.MaTTDH where Email ='{$_SESSION['Username']}' ");
                            $layiddh=$_GET['id'];
                            if(isset($layiddh)){
                                $q->load_ctdonhang("select * from donhang inner join chitietdonhang on donhang.MaDH=chitietdonhang.MaDH inner join sanpham on sanpham.MaSP = chitietdonhang.MaSP WHERE donhang.MaDH=".$layiddh."; ");
                            }
                        ?>
                        <script language="javascript">
                            var button = document.getElementById("btn");
                            button.onclick = function(){
                                <?php
                                    $MaDHxoa=$_REQUEST['iddh'];
                                    $TrangThai=1;
                                    $q->huydh('delete from donhang where MaDH="'.$MaDHxoa.'" and TrangThai="'.$TrangThai.'"')
                                ?>
                            }
                        </script>
                    </table>
            </div>
            <div class="col-md-1"></div>
        </div>
            <?php /* bắt đầu Chi tiết đơn hàng */ ?> 
            <div id="myModal" class="modal">
            <!-- Nội Dung Modal -->
            <div class="modal-content">
                <span class="close">×</span>
                <p>Lorem ipsum dolor sit amet...</p>
            </div>
            </div>
            <script>
            /* lấy phần tử modal */
            var modal = document.getElementById("myModal");
            /* thiết lập nút mở modal */
            var btn = document.getElementById("myBtn");
            /* thiết lập nút đóng modal */
            var span = document.getElementsByClassName("close")[0];
            /* Sẽ hiển thị modal khi người dùng click vào */
            btn.onclick = function() {
            modal.style.display = "block";
            }
            /* Sẽ đóng modal khi nhấn dấu x */
            span.onclick = function() {
            modal.style.display = "none";
            }
            /*Sẽ đóng modal khi nhấp ra ngoài màn hình*/
            window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            }
            </script>
            <?php /* kết thúc Chi tiết đơn hàng */ ?> 
            
     <?php
        include('footer.php');
    }
    ?>