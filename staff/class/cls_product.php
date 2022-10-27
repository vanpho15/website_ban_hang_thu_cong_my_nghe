<?php
class tmdt
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
				$MaSP= $row['MaSP'];
				$TenSP = $row['TenSP'];
				$MoTa = $row['MoTa'];
				$DonGia = $row['DonGia'];
				$GiaKM= $row['GiaKM'];
				$Hinh = $row['Hinh'];
				$MaDM = $row['MaDM'];
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
				$MaDM=$row[0];
				$giaitri=$MaDM;	
			}	
			
		}
		return $giaitri;
	}	
	public function getdanhmuc($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
      	mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				echo "<option value='".$row[1]."'>".$row[0]."</option>";
			}	
			
		}
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
					$TenDM= $row['TenDM'];
					echo'
					<tr>
						<td align="center" height="50" colspan=""2><a href="?id='.$MaDM.'">'.$dem.'</a></td>
						<td style="font-size: 18px; padding-left: 10px;"><a href="suadm.php?id='.$MaDM.'" colspan="2">'.$TenDM.'</a></td>
						<td align="center"><a href="xoadm.php?id='.$MaDM.'">Xóa</a><td>
						<td align="center"><a href="suadm.php?id='.$MaDM.'">Sửa</a><td>
					</tr>';
				  $dem++;
				}
			echo'
			</table>
			</form>';	
			}
		else
		{
			echo 'Không có dữ liệu';
		}
		
	}
	
	public function loadds_sanpham($sql)
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
					$MaSP= $row['MaSP'];
					$TenSP = $row['TenSP'];
					$MoTa = $row['MoTa'];
					$DonGia = $row['DonGia'];
					$GiaKM= $row['GiaKM'];
					$Hinh = $row['Hinh'];
					$MaDM = $row['MaDM'];
						echo'
					<tr>
						<td><a href="?id='.$MaSP.'">'.$dem.'</a></td>
						<td><a href="?id='.$MaSP.'"><img width ="150px" src="../img/'.$Hinh.'"></a></td>
						<td><a href="suasp.php?id='.$MaSP.'" colspan="2">'.$TenSP.'</a></td>
						<td><a href="?id='.$MaSP.'">'.$MoTa.'</a></td>
						<td><a href="?id='.$MaSP.'">'.$DonGia.'</a></td>
						<td><a href="?id='.$MaSP.'">'.$GiaKM.'</a></td>
						<td><input type="hidden" name="txtid" value="'.$MaDM.'">'.$MaDM.'</td>
						<td><a href="xoasp.php?id='.$MaSP.'">Xóa</a></td>
						<td><a href="suasp.php?id='.$MaSP.'">Sửa</a></button></td>
					</tr>';
				  $dem++;
				}
			echo'
			</table>
			</form>';	
			}
		else
		{
			echo 'Không có dữ liệu';
		}
		
	}	
	public function get_sanpham($id)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, "select * from sanpham where MaSP='".$id."'");
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
		return $row=mysqli_fetch_array($ketqua);
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		
	}	
	public function get_dmsanpham_edit($id)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, "select * from sanpham where MaSP='".$id."'");
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
		$rowsp=mysqli_fetch_array($ketqua);
		$link = $this->connect();
        $ketqua = mysqli_query($link, "select * from danhmucsp");
      	mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$selected="";
				if($rowsp['MaDM']==$row['MaDM']){
					$selected="selected";
				}
				echo "<option ".$selected." value='".$row['MaDM']."'>".$row['TenDM']."</option>";
			}	
			
		}
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
}
?>