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
$layid=0;
if(isset($_REQUEST['MaSP']))
{
  $layid=$_REQUEST['MaSP'];
}
$rowsp = $p->get_sanpham($_GET['id']);
switch($_POST['nut'])
{
  case 'Cập Nhập':
  {
      $MaSP=$_REQUEST['MaSP'];
			$TenSP=$_REQUEST['TenSP'];
      $MaDM=$_REQUEST['iddanhmuc'];
			$DonGia=$_REQUEST['DonGia'];
			$MoTa=$_REQUEST['MoTa'];
			$name=$_FILES['Hinh']['name'];
			$tmp_name=$_FILES['Hinh']['tmp_name'];
			$type=$_FILES['Hinh']['type'];
			$size=$_FILES['Hinh']['size'];
   if($name!=""){
   	$p->myupfile($name,$tmp_name,'../img');
     if($p->themxoasua("UPDATE sanpham SET TenSP = '$TenSP', MoTa = '$MoTa', DonGia = '$DonGia', Hinh = '$name', MaDM = '$MaDM' WHERE MaSP = '".$_GET['id']."' LIMIT 1")==1)
     {
       echo "<script>window.location.href='dssp.php';</script>";
     }
     else
     {
       
       echo 'Sửa không thành công';
     }
   }else{
    if($p->themxoasua("UPDATE sanpham SET TenSP = '$TenSP', MoTa = '$MoTa', DonGia = '$DonGia', MaDM = '$MaDM' WHERE MaSP = '".$_GET['id']."' LIMIT 1")==1)
      {
        echo "<script>window.location.href='dssp.php';</script>";
      }
      else
      {
        
        echo 'Sửa không thành công';
      }
   }  
    break;
  }
}
?>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" style="padding-left: 200px;">
                <div class="col-sm-6">
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                      <table width="813" border="1" align="center">
                        <tr>
                        	<th style="font-size: 50px; text-align:center" width="100%" colspan="2">SỬA SẢN PHẨM </th>
                        </tr>
                        <tr>
                          <td width="240" height="48"><strong>Tên sản phẩm</strong></td>
                          <td width="488"><label for="tensp"></label>
                          <input width ="100%" name="TenSP" type="text" id="TenSP" value="<?php echo $rowsp['TenSP']?>"/>
                          
                         </td>
                        </tr>
                        <tr>
                          <td height="45"><strong>Danh mục sản phẩm</strong></td>
                          <td><select name="iddanhmuc">
                                        <?php
                                       
                                            $layid = $p->get_dmsanpham_edit($_GET['id']);
                                          
                                        ?>
                                        </select>
                          </td>
                        </tr>
                        <tr>
                          <td height="52"><strong>Giá</strong></td>
                          <td><label for="DonGia"></label>
                          <input name="DonGia" type="text" id="DonGia" value="<?php echo $rowsp['DonGia']?>"/></td>
                        </tr>
                        <tr>
                          <td height="92"><strong>Mô tả</strong></td>
                          <td><label for="MoTa"></label>
                          <textarea name="MoTa" id="MoTa" cols="45" rows="5"><?php echo $rowsp['MoTa']?></textarea></td>
                        </tr>
                        <tr>
                          <td height="63"><strong>Ảnh sản phẩm</strong></td>
                          <td><label for="Hinh"></label>
                          <img src="images/<?php echo $rowsp['Hinh']?>">
                          <input type="file" name="Hinh" id="Hinh" /></td>
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