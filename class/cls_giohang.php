<?php

	class giohang{
		public function connect()
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
		public function insert_giohang(){
			$link = $this->connect();
			$sql = "select * from sanpham where MaSP IN (".implode(",", array_keys($_SESSION["cart"])).")";
			$ketqua = mysqli_query($link, $sql);
			mysqli_close($link);
			$i = mysqli_num_rows($ketqua);
			$tongtien=0;
			if($i > 0)
			{
				while($row=mysqli_fetch_array($ketqua))
				{
					echo
					'
					<tr>
					<td class="shoping__cart__item">
						<img width="100px" src="img/'.$row['Hinh'].'" alt="">
						<h5>'.$row['TenSP'].'</h5>
					</td>
					<td class="shoping__cart__price">
					'.number_format($row['DonGia']).'
					</td>
					<td class="shoping__cart__quantity">
						<div class="quantity">
							<div class="pro-qty">
							<input  type="text" name="quantity['.$row['MaSP'].']" value="'.$_SESSION['cart'][$row['MaSP']].'"/>
							</div>
						</div>
					</td>
					<td class="shoping__cart__total">
						'.number_format($_SESSION['cart'][$row['MaSP']]*$row['DonGia']).'
					</td>
					<td class="shoping__cart__item__close">
						<a href="cart.php?action=delete&id='.$row['MaSP'].'">Xóa</a>
					</td>
				</tr>	
					';
					$tongtien +=$_SESSION['cart'][$row['MaSP']] * $row['DonGia'];
				}
				return $tongtien;
			}
			else
			{
				
			}
			
		}
		public function tongtien_giohang(){
            $link = $this->connect();
            $sql = "select * from sanpham where MaSP IN (".implode(",",array_keys($_SESSION["cart"])).")";
            $ketqua = mysqli_query($link, $sql);
            mysqli_close($link);
            $i = mysqli_num_rows($ketqua);
            $tongtien=0;
            if($i > 0)
            {
                while($row=mysqli_fetch_array($ketqua))
                {
                    $tongtien +=$_SESSION['cart'][$row['MaSP']] * $row['DonGia'];
                }
                return $tongtien;
            }
            else
            {
                
            }
            
        }

		public function chitiet_donhang(){
			$link = $this->connect();
			$sql = "select * from sanpham where MaSP IN (".implode(",", array_keys($_SESSION["cart"])).")";
			$ketqua = mysqli_query($link, $sql);
			mysqli_close($link);
			$i = mysqli_num_rows($ketqua);
			$tongtien=0;
			if($i > 0)
			{
				while($row=mysqli_fetch_array($ketqua))
				{
					echo
					'
					<table>
					<tr>
					<td width="90%">'.$row['TenSP'].'</td>
					<td>'.number_format($_SESSION['cart'][$row['MaSP']]*$row['DonGia']).'</td>
					</tr>
					</table>
					';
					$tongtien +=$_SESSION['cart'][$row['MaSP']] * $row['DonGia'];
				}
				echo '
				<li>Tổng tiền <span class="tongtien_sanpham">'.$tongtien.'</span></li>
				';
			}
			else
			{
				
			}
			
		}
		public function themxoasua($sql)
	{
		$link = $this->connect();
		if (mysqli_query($link, $sql)) {
			return 1;
		} else {
			return 0;
		}
	}
	public function dathang($HoTen,$SDT,$DiaChi,$Email,$tongtien, $Note){
			$link = $this->connect();
            $sql = "select * from sanpham where MaSP IN (".implode(",",array_keys($_SESSION["cart"])).")";
            $ketqua = mysqli_query($link, $sql);
            mysqli_close($link);
            $i = mysqli_num_rows($ketqua);
            $tongtien=0;
            if($i > 0)
            {
				
				$sql1="INSERT INTO `myngheviet`.`donhang` (`MaDH`,`HoTen` ,`SDT` ,`DiaChi` ,`Email` ,`TongTien` ,`Note` ,`DonHang`)VALUES ('NULL','$HoTen', '$SDT', '$DiaChi', '$Email', '$tongtien', '$Note', '')";
				if(mysqli_query($link, $sql1))
				{
					return 1;
				}
				else
				{
					return 0;
				}
            }
		
	}
}

?>