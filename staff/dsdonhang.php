<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
table tr:hover{
	background-color:#FF6;
}
        </style>
</head>

<body>
<?php
	session_start();
	if(isset( $_SESSION['Username']) && isset($_SESSION['Password'])&& $_SESSION['PhanQuyen'] ==1){
	require('header.php');
	error_reporting(0);
?>
<?php
include("class/cls_product.php");
$p=new tmdt();

include("class/cls_giohang.php");
$giohang=new giohang();

switch($_POST['nut'])
{
	case 'Xóa':
	{
		  $MaDHxoa=$_POST['MaDH'];
		  if($MaDHxoa>0)
		  {
			  if($p->themxoasua("delete from donhang where MaDH='".$MaDHxoa."' limit 1 ")==1)
			  {
				  header('location:xoa_donhang.php');
			  }
			  else
			  {
				  echo'Xóa không thành công';
			  }
		  }
		  else
		  {
		  	echo 'Vui lòng chọn đơn hàng cần xóa';
		  }
		  break;
	}
	
	case 'Sửa':
	{	
		$MaDHsua= $_REQUEST['MaDH'];
		if($MaDHsua > 0 )
		{	
			header('location:sua_donhang?id='.$MaDHsua.'');
		}
		else
		{
			echo 'Không Thành Công';	
		}
		break;
	}
	
	case 'Thêm Sản Phẩm':
	{
		header('location:themsp.php');
		break;
	}
	
}
?>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
                    <div class="main-content" style="padding-left: 20px;">
                       
                        <!--<center><a href="themsp.php" style="background-color: #69F; text-align: center; font-weight: bold; font-size: 36px; color:white;
                        border: 2px black solid; ">THÊM SẢN PHẨM</a></center>-->
						<div class="card-body">
				<div align="center" style="font-size: 25px;" width="100%">QUẢN LÝ ĐƠN HÀNG</div>
							<form action="" method="post">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
										<th><strong>STT</strong></th>
										<th><strong>Họ tên</strong></th>
										<th><strong>Số điện thoại</strong></th>
										<th><strong>Địa chỉ</strong></td>
										<th><strong>Email</strong></td>
										<th><strong>Tổng tiền</strong></td>
										<th><strong>Trạng thái</strong></td>
										<th><strong>Ghi chú</strong></td>
										<th>Xóa</th>
										<th>Sửa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
									<tr>
										<th><strong>STT</strong></th>
										<th><strong>Họ tên</strong></th>
										<th><strong>Số điện thoại</strong></th>
										<th><strong>Địa chỉ</strong></td>
										<th><strong>Email</strong></td>
										<th><strong>Tổng tiền</strong></td>
										<th><strong>Trạng thái</strong></td>
										<th><strong>Ghi chú</strong></td>
										<th>Xóa</td>
										<th>Sửa</td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php
										$giohang->loadds_donhang("select * from donhang inner join trangthaidh on donhang.TrangThai=trangthaidh.MaTTDH order by MaDH desc");
									?>
                                    </tbody>
                                </table>
							</form>
                            </div>
							<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        				<script src="js/datatables-simple-demo.js"></script>
                    </div>
       </div>
     </section>
</div>
<?php
$layid = 0;
    if (isset($_REQUEST['id'])) {
        $layid = $_REQUEST['id'];
    }

?>
<div class="modal">
                    <div class="modal-container">
                    <div class="modal-close">
                        <i class="ti-close"></i>
                        <div class="clear"></div>
                        <div class="modal-header">
                            <i class="ti-bag"></i>
                            Chi Tiết Đơn Hàng
                        </div>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                      <table width="813"  align="center">
                        <tr>
                          <td width="240" height="48"><strong>Họ Và Tên</strong></td>
                          <td width="488"><label for="hoten"></label>
                          <?php echo $giohang->laycot("select HoTen from donhang where MaDH='$layid' limit 1"); ?>
                         </td>
                        </tr>
                        <tr>
                          <td height="52"><strong>SDT</strong></td>
                          <td><label for="sdt"></label>
                          <?php echo $giohang->laycot("select SDT from donhang where MaDH='$layid' limit 1"); ?>
                        </tr>
                        <tr>
                          <td height="52"><strong>Địa Chỉ</strong></td>
                          <td><label for="diachi"></label>
                          <?php echo $giohang->laycot("select DiaChi from donhang where MaDH='$layid' limit 1"); ?>
                        </tr>
                        <tr>
                          <td height="52"><strong>Sản phẩm</strong></td>
                          <td><label for="sanpham"></label>
                          <?php echo $giohang->laycot("select TenSP, SoLuong from chitiethoadon inner join sanpham on chitiethoadon.MaSP=sanpham.MaSP where MaDH='$layid' limit 1"); ?>
                        </tr>
                        <tr>
                          <td height="63"><strong>Hình thức thanh toán</strong></td>
                          <td><label for="Hinh"></label>
                          <?php echo $giohang->laycot("select PPThanhToan from donhang where MaDH='$layid' limit 1"); ?>
                        </tr>
						<tr>
                          <td height="63"><strong>Ngày Đặt hàng</strong></td>
                          <td><label for="Hinh"></label>
                          <?php echo $giohang->laycot("select NgayDatHang from donhang where MaDH='$layid' limit 1"); ?>
                        </tr>
                        <tr>
                          <td height="115" colspan="2" align="center">
							<button  type="submit" name="nut" id="buy-capnhat" value="Cập Nhập"><i class="ti-check"></i></button>
                            
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
	require('footer.php');
}
else
{
	header('location:Login_admin.php');
}
?>

</body>
</html>