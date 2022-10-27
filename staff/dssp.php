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

	require('header.php');
	error_reporting(0);
?>
<?php
include("class/cls_product.php");
$p=new tmdt();

switch($_POST['nut'])
{
	case 'Xóa':
	{
		  $MaSPxoa=$_POST['MaSP'];
		  if($MaSPxoa>0)
		  {
			  if($p->themxoasua("delete from sanpham where MaSP='".$MaSPxoa."' limit 1 ")==1)
			  {
				  header('location:xoasp.php');
			  }
			  else
			  {
				  echo'Xóa không thành công';
			  }
		  }
		  else
		  {
		  	echo 'Vui lòng chọn danh mục cần xóa';
		  }
		  break;
	}
	
	case 'Sửa':
	{	
		$idsua = $_REQUEST['id'];
		if($idsua > 0 )
		{	
			header('location:suasp.php?id='.$idsua.'');
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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="main-content" style="padding-left: 20px;">
                       <?php
                      		 $p->loadds_sanpham("select * from sanpham order by MaSP desc");
                        ?>
                        <div style="margin-top:20px;">
                        <a href="themsp.php" style=" text-align: center; font-weight: bold; font-size: 25px; color:white;    background-color: #4CAF50;padding: 10px 20px;
    color: white;
                        border: 2px black solid; ">THÊM SẢN PHẨM</a>
                       </div>
                    </div>
            	 </div>;
        	</div>
			<div class="main-content" style="padding-left: 20px;">
                       
                        <!--<center><a href="themsp.php" style="background-color: #69F; text-align: center; font-weight: bold; font-size: 36px; color:white;
                        border: 2px black solid; ">THÊM SẢN PHẨM</a></center>-->
						<div align="center" style="font-size: 25px;" width="100%">QUẢN LÝ SẢN PHẨM</div>
						<div class="card-body">
						<form action="" method="post">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
										<th><strong>STT</strong></th>
										<th><strong>Hình</strong></th>
										<th><strong>Tên Sản Phẩm</strong></th>
										<th><strong>Mô Tả</strong></th>
										<th><strong>Đơn Giá</strong></th>
										<th><strong>Giá Khuyến Mãi</strong></th>
										<th><strong>Danh mục</strong></th>
										<th>Xóa</th>
										<th>Sửa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
									<tr>
									<th><strong>STT</strong></th>
										<th><strong>Tên Sản Phẩm</strong></th>
										<th><strong>Mô Tả</strong></th>
										<th><strong>Đơn Giá</strong></th>
										<th><strong>Giá Khuyến Mãi</strong></th>
										<th><strong>Hình</strong></th>
										<th>Xóa</th>
										<th>Sửa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php
										$p->loadds_sanpham("select * from sanpham order by MaSP desc");
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
	require('footer.php');
	
?>

</body>
</html>