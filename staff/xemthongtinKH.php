<?php
session_start();
include('class/cls_khachhang.php');
$p= new khachhang();

$layid = 0;
    if (isset($_REQUEST['id'])) {
        $layid = $_REQUEST['id'];
    }

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Form Sửa Thông Tin</title>

</head>

<body>
    <?php
    
    require('./header.php');
    ?>
   
    <div class="content-wrapper" style="min-height: 1203.6px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" style="padding-left: 200px;">
                    <div class="col-sm-6">
                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <table width="813" border="1" align="center">
                                <tr>
                                    <th style="font-size: 50px; text-align:center" width="100%" colspan="2">THÔNG TIN
                                        KHÁCH HÀNG</th>
                                    <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Tên Khách Hàng</strong>
                                    </td>
                                    <td width="488" style="padding-left: 10px;">
                                        
                                      <?php echo $p->laycot("select HoTen from khachhang where MaKH='$layid' limit 1"); ?>
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Địa chỉ</strong></td>
                                    <td style="padding-left: 10px;">
                                        <?php echo $p->laycot("select DiaChi from khachhang  where MaKH='$layid'limit 1"); ?>
                                    </td>
                                </tr>
                                <<tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số Điện Thoại</strong></td>
                                    <td style="padding-left: 10px;">
                                        <?php echo $p->laycot("select SDT from khachhang  where MaKH='$layid'limit 1"); ?>
                                    </td>
                                </tr>

                                <<tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Email</strong></td>
                                    <td style="padding-left: 10px;">
                                        <?php echo $p->laycot("select Email from khachhang  where MaKH='$layid.'limit 1"); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="57px" colspan="2" align="center">
                                        <button
                                            style="background-color: #4CAF50; color: white; width: 50%; height: 65%; font-size: 15px"
                                            name="nut" id="nut" value="Cập Nhập">Xem Lịch Sử Mua Hàng</button>
                                </tr>

                           
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    require('./footer.php');
    ?>
</body>

</html>