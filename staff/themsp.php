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
?>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" style="padding-left: 200px;">
                <div class="col-sm-6">
				<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <table width="813" border="1" align="center">
                                <tr>
                                    <th style="font-size: 50px; text-align:center" width="100%" colspan="2">THÊM SẢN PHẨM MỚI</th>
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Tên Sản Phẩm</strong>
                                    </td>
                                    <td width="200px">
                                        <div class="form-group invalid">
                                            <label for=""></label>
                                            <input value="<?php echo $_POST['TenSP']?>" type="text" name="TenSP" id="TenSP" style="width: 95%;"
                                                placeholder="Nhập tên sản phẩm" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="45" value="<?php echo $_POST['TenDM']?>" style="padding-left: 10px;"><strong>Danh Mục</strong></td>
                                    <td>
                                        <select name="iddanhmuc">
                                        <?php
                                       
                                            $layid = $p->getdanhmuc("select TenDM, MaDM from danhmucsp");
                                          
                                        ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Đơn giá</strong></td>
                                    <td>
                                        <div class="form-group invalid">
                                            <label for=""></label>
                                            <input  value="<?php echo $_POST['DonGia']?>" placeholder="Nhập đơn giá" type="text" name="DonGia" id="DonGia" style="width: 95%;" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                               
                                
                                <tr>
                                    <td height="63" style="padding-left: 10px;"><strong>Ảnh minh họa sản phẩm</strong>
                                    </td>
                                    <td>
                                        <div class="form-group invalid">
                                            <label for="anh"></label>
                                            <input type="file" name="Hinh" id="Hinh" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td height="92" style="padding-left: 10px;"><strong>Mô tả</strong></td>
                                    <td><label for="Mota" value="<?php echo $_POST['MoTa']?>"></label>
                                        <textarea name="MoTa" id="MoTa" cols="70%" rows="5"  placeholder="Nhập mô tả sản phẩm"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="115" colspan="2" align="center">
                                        <button
                                            style="background-color: #4CAF50; color: white; width: 50%; height: 65%; font-size: 50px"
                                            type="submit" name="nut" id="nut" value="Thêm sản phẩm">Thêm Sản Phẩm</button>
                                </tr>
                                <tr>
                                    <td height="30" colspan="2" align="center" style=" font-weight: bold;"><span
                                            style="text-align: left;">Thông báo</span>
<?php

	switch($_POST['nut'])
	{
		case 'Thêm sản phẩm':
		{
			$TenSP=$_REQUEST['TenSP'];
            $MaDM=$_REQUEST['iddanhmuc'];
			$DonGia=$_REQUEST['DonGia'];
			$MoTa=$_REQUEST['MoTa'];
			$name=$_FILES['Hinh']['name'];
			$tmp_name=$_FILES['Hinh']['tmp_name'];
			$type=$_FILES['Hinh']['type'];
			$size=$_FILES['Hinh']['size'];
				if($TenSP!=''||$DonGia!='')
				{
					if($MaDM!=0)
					{
				        if($name!='')
					    {
					        $name=time()."_".$name;
                            if($p->myupfile($name,$tmp_name,'../img'))
                            {
                                $link= mysqli_connect('localhost', 'root', '', 'myngheviet') or die('Lỗi kết nối');
                                                    mysqli_set_charset($link, "utf8");
                                                    $sql = "SELECT * FROM sanpham WHERE TenSP= '".$TenSP."' ";
                                                    $result = mysqli_query($link, $sql);
                                                    mysqli_close($link);
                                                    $i=mysqli_num_rows($result);
                                                    if ( $i > 0) {
                                                    echo 'Sản phẩm này đã tồn tại';
                                                    }
                            
                                                    else
                                                    {
                                                            if($p->themxoasua("INSERT INTO sanpham (TenSP, DonGia, MoTa, Hinh, MaDM) VALUES ('$TenSP', '$DonGia', '$MoTa', '$name', '$MaDM');")==1)
                                                    
                                                            {
                                                                
                                                                echo'Thêm sản phẩm thành công';
                                                            }
                                                            else
                                                            {
                                                                echo'Thêm sản phẩm không thành công';
                                                            }
                                                    }
                            }
				            else
						    {
							echo 'không upload được hình đại diện';
						    }
                        }	
					    else
					    {
							echo 'Vui lòng chọn ảnh đại diện';
					    }
                    }	
				    else
					{ 
						echo'Chọn loại danh mục sản phẩm';
					}
				}
				else
				{
				    echo'Chưa nhập đầy đủ thông tin sản phẩm';
				}
				
		break;
		}
	}
?> 
                          </td>
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