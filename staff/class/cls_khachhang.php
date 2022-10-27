<?php
class khachhang
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

    public function loadds_khachhangsua($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<form action="" method="post">
			<table width="100%" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="12" width="100%">DANH SÁCH KHÁCH HÀNG</th>
			</tr>
			<tr style= "font-size: 1rem;">
				<td width="5%" align="center"><strong>STT</strong></td>
				<td width="15%" align="center"><strong>Mã Khách Hàng</strong></td>
				<td width="6%" align="center"><strong>Tên Khách Hàng</strong></td>
				<td width="7%" align="center"><strong>Địa Chỉ</strong></td>
				<td width="22%" align="center"><strong>SĐT</strong></td>
				<td width="11%" align="center"><strong>Eamil</strong></td>
				
			</tr>';
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				
				$MaKH = $row['MaKH'];
				$HoTen = $row['HoTen'];
				$DiaChi = $row['DiaChi'];
				$SDT = $row['SDT'];
				$Email = $row['Email'];
				echo '
					<tr>
						<td align="center" height="50"><a href="?id=' . $MaKH . '">' . $dem . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaKH . '">' . $HoTen . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaKH . '">' . $DiaChi . '</a></td>	
						<td align="center" height="50"><a href="?id=' . $MaKH . '">' . $DiaChi . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaKH . '">' . $SDT . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaKH . '">' . $Email . '</a></td>
						<input type="hidden" name="id_product" value="' . $MaKH . '">
						<td align="center" colspan="4">
						<a class="btn btn-success" href="suathongtinKH.php?id=' . $MaKH . '" role="button">Cập Nhập danh sách khách hàng</a>
						<td>
					</tr>';
				$dem++;
			}
			echo '
			</table>
			</form>';
		}
	}


        public function loadds_khachhang($sql)
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
                        $MaKH = $row['MaKH'];
                        $HoTen = $row['HoTen'];
                        $DiaChi = $row['DiaChi'];
                        $SDT = $row['SDT'];
                        $Email = $row['Email'];
						$Hinh = $row['Hinh'];
                        echo'
                        <tr>
                            <td><a href="">'.$dem.'</a></td>
							<td><a href=""><img width ="150px" src="../img/'.$Hinh.'"></a></td>
                            <td><a href="">'.$HoTen.'</a></td>
                            <td><a href="">'.$SDT.'</a></td>
                            <td><a href="">'.$DiaChi.'</a></td>						
                            <td><a href="">'.$Email.'</a></td>
                            <td><a href="xemthongtinKH.php?id='.$MaKH.'">XEM</a><td>
                        </tr>';
                            $dem++;
                    }	
            }
             else
            {
                 echo 'Không có dữ liệu';
            }
        }
		

		public function load_chitietKH($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaKH = $row['MaKH'];
				$HoTen = $row['HoTen'];
				$DiaChi = $row['DiaChi'];
				$SDT = $row['SDT'];
				$Email = $row['Email'];
				echo '
                <tr>
                    <td class="row-1">Mã khách hàng:</td>
                    <td>' . $MaKH . '</td>
                </tr>
                <tr>
                    <td class="row-1">Họ và tên:</td>
                    <td>' . $HoTen . '</td>
                </tr>
                <tr>
                    <td class="row-1">Địa chỉ:</td>
                    <td>' . $DiaChi . '</td>
                </tr>
                <tr>
                    <td class="row-1">Số điện thoại:</td>
                    <td>' . $SDT . '</td>
                </tr>
                <tr>
                    <td class="row-1">Email:</td>
                    <td>' . $Email . '</td>
                </tr>
                
            ';
			}
		} else {
			echo ' khong co du lieu';
		}
	}

		public function laycot($sql)
	{
		$link = $this->connect();;
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		$giaitri='';
		if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaKH=$row[0];
				$giaitri=$MaKH;	
			}	
			
		}
		return $giaitri;
	}	
}

?>