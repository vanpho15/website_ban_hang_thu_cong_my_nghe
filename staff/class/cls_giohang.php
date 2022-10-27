<?php
class giohang
{
	private function connect()
	{
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myngheviet";
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		if (!$conn) {
			echo "Database connection error" . mysqli_connect_error();
			exit();
		} else {
			mysqli_select_db($conn, $dbname);
			mysqli_set_charset($conn, 'UTF8');
			return $conn;
		}
	}
	public function loadds_donhang($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			  	$dem=1;
				while($row=mysqli_fetch_array($ketqua))
				{
					$MaDH = $row['MaDH'];
					$HoTen = $row['HoTen'];
					$SDT = $row['SDT'];
					$DiaChi = $row['DiaChi'];
					$Email = $row['Email'];
					$TongTien = $row['TongTien'];
					$TrangThai = $row['TrangThai'];
					$TenTTDH = $row['TenTTDH'];
					$Note = $row['Note'];
					echo'
					<tr>
						<td><a href="sua_donhang.php?id='.$MaDH.'">'.$dem.'</a></td>
						<td><a href="sua_donhang.php?id='.$MaDH.'">'.$HoTen.'</a></td>
						<td><a href="sua_donhang.php?id='.$MaDH.'">'.$SDT.'</a></td>
						<td><a href="sua_donhang.php?id='.$MaDH.'">'.$DiaChi.'</a></td>						
						<td><a href="sua_donhang.php?id='.$MaDH.'">'.$Email.'</a></td>
						<td><a href="sua_donhang.php?id='.$MaDH.'">'.number_format($TongTien).'đ</a></td>
						<td><a href="sua_donhang.php?id='.$MaDH.'">'.$TenTTDH.'</a></td>
						<td><a href="sua_donhang.php?id='.$MaDH.'">'.$Note.'</a></td>
						<td><a href="xoa_donhang.php?id='.$MaDH.'"><ion-icon name="trash-outline"></ion-icon></a></td>
						<td> <a href="sua_donhang.php?id='.$MaDH.'"><ion-icon name="create-outline"></ion-icon></a></td>
						
					</tr>';
				  $dem++;
				}	
			}
		else
		{
			echo 'Không có dữ liệu';
		}
	}	
	public function load_chitiet_donhang($MaDH)
	{
		$link=$this -> connect();
		$sql="select * from donhang where MaDH='".$MaDH."'";
		$ketqua=mysqli_query($link, $sql);
		mysqli_close($link);
		$row=mysqli_fetch_array($ketqua);
		return $row;
	}
	
	public function load_danhmuc_sanpham($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaDM = $row['MaDM'];
				$TenDM = $row['TenDM'];
				if($MaDM == 1)
				{
					echo '<li data-filter=".BinhTra">'.$TenDM.'</li>';
				}
				elseif($MaDM== 2)
				{
					echo '<li data-filter=".GomSu">'.$TenDM.'</li>';
				}
				elseif($MaDM== 3)
				{
					echo '<li data-filter=".LangDong">'.$TenDM.'</li>';
				}
				elseif($MaDM== 4)
				{
					echo '<li data-filter=".SonMai">'.$TenDM.'</li>';;
				}
				elseif($MaDM== 5)
				{
					echo '<li data-filter=".ThuPhap">'.$TenDM.'</li>';;
				}				
				
				else
				{
					echo 'không tồn tại danh mục';	
				}
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}

	public function load_sanpham($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tensp = $row['tensp'];
				$gia = $row['gia'];
				$hinh = $row['hinh'];
				$id_danhmuc = $row['id_danhmuc'];
			}
		}else{
			echo 'Không có dữ liệu';
				}
		
	}
	public function laycot($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		$giaitri='';
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row[0];
				$giaitri=$id;	
			}	
			
		}
		return $giaitri;
	}	
	public function loadds_danhmuc($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
		echo'
			<form action="" method="post">
			<table width="846" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="8" width="100%">QUẢN LÝ DANH MỤC</th>
			</tr>
			<tr>
				<td width="75" height="63" align="center"><strong>STT</strong></td>
				<td width="470" align="center"><strong>Tên danh mục</strong></td>
				<td width="60" align="center" colspan="4"><strong>Chức Năng</strong></td>
			</tr>';
			  	$dem=1;
				while($row=mysqli_fetch_array($ketqua))
				{
					$MaDM = $row['MaDM'];
					$TenDM = $row['TenDM'];
					echo'
					<tr>
						<td align="center" height="50" colspan=""2><a href="?id='.$MaDM.'">'.$dem.'</a></td>
						<td style="font-size: 18px; padding-left: 10px;"><a href="?id='.$MaDM.'" colspan="2">'.$TenDM.'</a></td>
						<td align="center"><button style="background-color: #f44336; color: white;" type="submit" name="nut" id="nut" value="Xóa">Xóa</button><td>
						<td align="center"><button style="background-color: #008CBA; color: white;" type="submit" name="nut" id="nut" value="Sửa">Sửa</button><td>
					</tr>';
				  $dem++;
				}
			echo'
			<tr>
				<td align="center" colspan="8" style="font-size: 25px" height="75"><button style="background-color: #4CAF50; color: white;" type="submit" name="nut" id="nut" value="Thêm Danh Mục">Thêm Danh Mục</button><td>
			</tr>
			</table>
			</form>';	
			}
		else
		{
			echo 'Không có dữ liệu';
		}
		
	}
	
	
	
	public function myupfile($name,$tmp_name,$folder)
	{
		if($name!='' && $tmp_name!='' && $folder!='')
		{
			$newname=$folder."/".$name;
			if(move_uploaded_file($tmp_name,$newname))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
	
	public function loadcompo_danhmuc($sql,$idchon)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			echo'<select name="MaDM" id="MaDM">';
			echo '<option>Chọn loại sản phẩm</option>';
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaDM = $row['MaDM'];
				$TenDM = $row['TenDM'];
				if($MaDM==$idchon)
				{
					echo'<option value="'.$MaDM.'" selected="selected">'.$TenDM.'</option>';
				}
				else
				{
					echo'<option value="'.$MaDM.'">'.$TenDM.'</option>';
				}
				
			}	
			echo'</select>';
		}
		else
		{
			echo ' khong co du lieu';
		}
	}

	public function themxoasua($sql)
	{
		$link=$this -> connect();
		if(mysqli_query( $link,$sql))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function get_ttdonhang($id)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, "select * from donhang where MaDH='".$id."'");
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
		$rowdh=mysqli_fetch_array($ketqua);
		$link = $this->connect();
        $ketqua = mysqli_query($link, "select * from trangthaidh");
      	mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$selected="";
				if($rowdh['TrangThai']==$row['MaTTDH']){
					$selected="selected";
				}
				echo "<option ".$selected." value='".$row['MaTTDH']."'>".$row['TenTTDH']."</option>";
			}	
			
		}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		
	}
}
?>