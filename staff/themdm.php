<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?

	require('header.php');
	error_reporting(0);
?>
<?php
include("class/cls_product.php");
$p=new tmdt();
$layid=0;
if(isset($_REQUEST['MaDM']))
{
	$layid=$_REQUEST['MaDM'];
}
?>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" style="padding-left: 200px;">
                <div class="col-sm-6">
                    <form id="form1" name="form1" method="post" action="">
                    <table width="846" border="0">
                        <tr>
                            <th style="font-size: 50px; text-align:center" width="100%">THÊM DANH MỤC MỚI</th>
                        </tr>
                        <tr>
							<td height="56" align="center"><input value="<?php echo $_POST['TenDM']?>" style="width: 60%; height: 50px" type="text" name="TenDM" placeholder="Nhập tên danh mục mới"/></td>
                        </tr>
                        <tr>
                        	<td align="center" height="70">
                        		<button style="background-color: #4CAF50; color: white;" type="submit" name="nut" id="nut" value="Thêm danh mục">Thêm Danh Mục</button>
                            </td>
                        </tr>
                        <tr>
                        	<td align="center">
							<?php
								  switch($_POST['nut'])
								  {
									case 'Thêm danh mục':
									{
										$TenDM=$_REQUEST['TenDM'];
										if($TenDM!='')
		  								{
											$link= mysqli_connect('localhost', 'root', '', 'myngheviet') or die('Lỗi kết nối');
                                            mysqli_set_charset($link, "utf8");
                                            $sql = "SELECT * FROM danhmucsp WHERE TenDM= '".$TenDM."' ";
                                        	$result = mysqli_query($link, $sql);
											mysqli_close($link);
											$i=mysqli_num_rows($result);
                                            if ( $i > 0) {
                                             echo 'Danh mục này đã tồn tại';
											}
											else
											{
												if($p->themxoasua("INSERT INTO  danhmucsp (TenDM) VALUES('$TenDM')")==1)
												{
												echo'Thêm danh mục sản phẩm thành công';
												
												}
												else
												{ 
													echo'Thêm danh mục không thành công';
												}
											}
										}
										else
										{
												echo' Vui lòng nhập tên danh mục sản phẩm cần thêm';
										}
									}
																
										break;
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