<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	require('header.php');
  error_reporting(0);
?>
<?php
include("class/cls_product.php");
$p=new tmdt();

include("class/cls_giohang.php");
$giohang=new giohang();
$row=$giohang->load_chitiet_donhang($_GET['id']);
$layid=0;

if(isset($_REQUEST['id']))
{
  $MaDHsua=$_REQUEST['id'];
}
switch($_POST['nut'])
{
  case 'Cập Nhập':
  {
    $MaDH = $_GET['MaDH'];
    $HoTen = $_POST['HoTen'];
    $SDT = $_POST['SDT'];
    $DiaChi = $_POST['DiaChi'];
    $Email = $_POST['Email'];
    $TrangThai = $_POST['TrangThai'];
    $Note = $_POST['Note'];
    
    if($MaDHsua>0)
    {
      if($giohang->themxoasua("UPDATE donhang SET HoTen = '$HoTen', SDT = '$SDT',DiaChi = '$DiaChi', Email = '$Email', TrangThai='$TrangThai', Note = '$Note' WHERE MaDH = '".$MaDHsua."'")==1)
      {
        echo "<script>window.location.href='dsdonhang.php';</script>";
      }
      else
      {
        echo 'Sửa không thành công';
      }
          
    }
    else
    {
      echo 'vui lòng chọn thông tin cẩn sửa';
    } 
    break;
  }
}
?>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" style="padding-left: 200px;">
                <div class="col-sm-6 chitiet_donhang">
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                      <table width="813" border="1" align="center">
                        <tr>
                        	<th style="font-size: 50px; text-align:center" width="100%" colspan="2">SỬA ĐƠN HÀNG </th>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Họ tên</strong></td>
                          <td width="488">
                          <input name="HoTen" type="text" id="HoTen" value="<?php echo $row['HoTen']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Số điện thoại</strong></td>
                          <td width="488">
                          <input name="SDT" type="text" id="SDT" value="<?php echo $row['SDT']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Địa chỉ</strong></td>
                          <td width="488">
                          <input name="DiaChi" type="text" id="DiaChi" value="<?php echo $row['DiaChi']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Email</strong></td>
                          <td width="488">
                          <input name="Email" type="text" id="Email" value="<?php echo $row['Email']?>"/>
                         </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Tổng tiền</strong></td>
                          <td width="488">
                          <?php echo number_format($row['TongTien'])."đ";?>
                         </td>
                        </tr>
                        <tr>

                         <td width="240" height="48"><strong>Trạng Thái</strong></td>
                          <td><select name="TrangThai">
                                        <?php
                                       
                                            $layid = $giohang->get_ttdonhang($_GET['id']);
                                          
                                        ?>
                                        </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Ghi chú</strong></td>
                          <td width="488">
                          
                          <textarea name="Note" type="text" id="Note" cols="70%" rows="5" value="<?php echo $row['Note']?>"></textarea>
                         </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <?php echo $row['donhang']?>
                          </td>
                        </tr>
                        <tr>
                          <td height="115" colspan="2" align="center">
							<button style="background-color: #4CAF50; color: white;" type="submit" name="nut" id="nut" value="Cập Nhập">Cập Nhập</button>
                        </tr>
                      </table>
 
                  </form>
              </div>
             </div>
         </div>
     </section>
</div>         
<?php
	require('footer.php');
	
?>
</body>
</html>