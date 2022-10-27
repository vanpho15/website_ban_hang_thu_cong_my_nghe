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
<body>
    <?php
    
    require("header.php");
    include('class/cls_khachhang.php');
    $p = new khachhang();
    ?>
    <?php
    //ket noi

    $layid = 0;
    if (isset($_REQUEST['id'])) {
        $layid = $_REQUEST['id'];
    }

    ?>
    <div id="about" class="about top_layer" style="margin-left:150px">
    <section class="content-header">
        <div class="container-fluid">
                <div class="main-content" style="padding-left: 20px;">
                       
                        <!--<center><a href="themsp.php" style="background-color: #69F; text-align: center; font-weight: bold; font-size: 36px; color:white;
                        border: 2px black solid; ">THÊM SẢN PHẨM</a></center>-->
						<div class="card-body">
				<div align="center" style="font-size: 25px;" width="100%">DANH SÁCH KHÁCH HÀNG</div>
							<form action="" method="post">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
										<th><strong>STT</strong></th>
                                        <th><strong>Hình</strong></th>
                                        <th><strong>Họ tên</strong></th>
                                        <th><strong>Địa chỉ</strong></th>
                                        <th><strong>Số điện thoại</strong></th>
                                        <th><strong>Email</strong></th>
										<th>Xem</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
									<tr>
                                      <th><strong>STT</strong></th>
                                         <th><strong>Hình</strong></th>
                                        <th><strong>Họ tên</strong></th>
                                        <th><strong>Địa chỉ</strong></th>
                                        <th><strong>Số điện thoại</strong></th>
                                        <th><strong>Email</strong></th>
										<th>Xem</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php
										$p->loadds_khachhang("select * from khachhang  order by MaKH asc");
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
        require("./footer.php");
        ?>
</body>

</html>