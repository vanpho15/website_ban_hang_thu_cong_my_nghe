<link rel="stylesheet" type="text/css" href="../css/home.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php
class quanly{
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
				$id = $row['MaDM'];
				$tendanhmuc = $row['TenDM'];
				echo
				'
					<li><a href="list_product.php?id='.$id.'" id="danhmuc-list">'.$tendanhmuc.'</a></li>	
				';
			}
		}
		else
		{
			
		}
	}
	public function load_sanpham_new($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaSP = $row['MaSP'];
				$TenSP = $row['TenSP'];
				$DonGia = $row['DonGia'];
				$Hinh = $row['Hinh'];
				$MaDM = $row['MaDM'];
					echo'
					<div class="newselling__product col-md-2">
                            <div class="newselling__product-img-box">
                                <img style=" height: 180px; " src="./img/'.$Hinh.'" alt="Biểu tượng thất truyền" class="newselling__product-img">
                            </div>
                            <div class="newselling__product-text">
                                <h5 class="newselling__product-title">
                                    <a href="#" class="newselling__product-link">'.$TenSP.'</a>
                                </h5>
        
                                <div class="newselling__product-rate-wrap">
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                </div>
        
                                <span class="newselling__product-price">
                              </span>
  								'.number_format($DonGia).'
        
                                <div class="newselling__product-btn-wrap">
								<button class="newselling__product-btn"><a href="Chitietsanpham.php?id='.$MaSP.'&iddm='.$MaDM.'">Xem hàng</a></button>
                                </div>
                            </div>
                     </div>
					';
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	public function load_sanpham_theodm($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaSP = $row['MaSP'];
				$TenSP = $row['TenSP'];
				$DonGia = $row['DonGia'];
				$Hinh = $row['Hinh'];
				$MaDM = $row['MaDM'];
					echo'
					<div class="newselling__product col-md-3">
                            <div class="newselling__product-img-box">
                                <img src="./img/'.$Hinh.'" alt="Biểu tượng thất truyền" class="newselling__product-img">
                            </div>
                            <div class="newselling__product-text">
                                <h5 class="newselling__product-title">
                                    <a href="#" class="newselling__product-link">'.$TenSP.'</a>
                                </h5>
        
                                <div class="newselling__product-rate-wrap">
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                </div>
        
                                <span class="newselling__product-price">
                              </span>
  								'.number_format($DonGia).'
        
                                <div class="newselling__product-btn-wrap">
                                    <button class="newselling__product-btn">Xem hàng</button>
                                </div>
                            </div>
                    </div>
					';
			}	
			
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	public function load_sanpham_product($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaSP = $row['MaSP'];
				$TenSP = $row['TenSP'];
				$DonGia = $row['DonGia'];
				$Hinh = $row['Hinh'];
				$MaDM = $row['MaDM'];
					
					echo'
					<div class="newselling__product col-md-4">
                            <div class="newselling__product-img-box">
                                <img style=" height: 180px; " src="./img/'.$Hinh.'" alt="Biểu tượng thất truyền" class="newselling__product-img">
                            </div>
                            <div class="newselling__product-text">
                                <h5 class="newselling__product-title">
                                    <a href="#" class="newselling__product-link">'.$TenSP.'</a>
                                </h5>
        
                                <div class="newselling__product-rate-wrap">
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                </div>
        
                                <span class="newselling__product-price">
                              </span>
  								'.number_format($DonGia).'
								  
                                <div class="newselling__product-btn-wrap">
								<form id = "add_cart" action="cart.php?action=add" method="POST">
								<button class="newselling__product-btn"><a href="Chitietsanpham.php?id='.$MaSP.'&iddm='.$MaDM.'">Xem hàng</a></button>
								</form>
                                   
                                </div>
                            </div>
                        </div>
					';
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	public function load_sanpham_lienquan($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaSP = $row['MaSP'];
				$TenSP = $row['TenSP'];
				$DonGia = $row['DonGia'];
				$Hinh = $row['Hinh'];
				$MaDM = $row['MaDM'];
					echo'
					<div class="newselling__product col-md-2">
                            <div class="newselling__product-img-box">
                                <img style=" height: 140px; " src="./img/'.$Hinh.'" alt="Biểu tượng thất truyền" class="newselling__product-img">
                            </div>
                            <div class="newselling__product-text">
                                <h5 class="newselling__product-title">
                                    <a href="#" class="newselling__product-link">'.$TenSP.'</a>
                                </h5>
        
                                <div class="newselling__product-rate-wrap">
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                    <i class="fas fa-star newselling__product-rate"></i>
                                </div>
        
                                <span class="newselling__product-price">
                              </span>
  								'.number_format($DonGia).'
								  
                                <div class="newselling__product-btn-wrap">
								<form id = "add_cart" action="cart.php?action=add" method="POST">
								<button class="newselling__product-btn"><a href="Chitietsanpham.php?id='.$MaSP.'">Xem hàng</a></button>
								</form>
                                   
                                </div>
                            </div>
                        </div>
					';
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	public function tongsanpham($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
		$num_rows = mysqli_num_rows($ketqua);
		return $num_rows;
	}
	
	public function paging($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
		$num_rows = mysqli_num_rows($ketqua);
		$page=$num_rows/12;
		if($num_rows%12>0){
			$page+=1;
		}
		$cur_page=$_GET['page'];
		for($i=1;$i<=$page;$i++){
			if($cur_page==$i)
				$selected_page="selected_page";
			else $selected_page="";
			echo '<a class="'.$selected_page.'" href="?page='.$i.'">'.$i.'</a>';
		}
	}
	public function load_sanpham_chitiet($sql)
	{
		$link=$this -> connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaSP = $row['MaSP'];
				$TenSP = $row['TenSP'];
				$DonGia = $row['DonGia'];
				$Hinh = $row['Hinh'];
				$MaDM = $row['MaDM'];
				$MoTa = $row['MoTa'];
					echo'
					<div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="img/'.$Hinh.'" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>'.$TenSP.'</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 đánh giá)</span>
                        </div>
                        <div class="product__details__price">'.number_format($DonGia).'</div>
                        <p>'.$MoTa.'</p>
						<form id = "add_cart" action="cart.php?action=add" method="POST">
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" id="quantity_chitiet" name="quantity['.$MaSP.']" value="1">
                                </div>
                            </div>
                        </div>
						<input class="primary-btn cart-btn cart-btn-right" type="submit" name="add_cart-click" value="Thêm giỏ hàng"/>
						</form>
                        <ul>
                            <li><b>Số lượng còn:</b> <span>Còn hàng</span></li>
							<li><b>Vận chuyển</b> <span>1 đến 3 ngày <samp>(tùy khu vực)</samp></span></li>
                            <li><b>Trọng lượng</b> <span>0.5 kg</span></li>
                            <li><b>Chia sẻ qua</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>';
			}	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	public function load_binhluan($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaBL = $row['MaBL'];
				$NoiDung = $row['NoiDung'];
				$Username = $row['Username'];
				$ThoiGian = $row['ThoiGian'];
				$HoTen = $row['HoTen'];
				$MaSP = $row['MaSP'];
				$Hinh = $row['Hinh'];
				echo
				'
				<div class="product-comment row form-group">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="comment-item">
                        <ul class = item-reviewer>
                            <div class="comment-item-user">
							<img src="./img/'.$Hinh.'" alt="" class="comment-item-user-img">
                                <li><b>'.$HoTen.'</b></li> 
                             </div>
                          
                           <br>
                            <li><h6>'.$ThoiGian.'</h6></li>
                            <li>
                               <h4>'.$NoiDung.'</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1"></div>
               </div>
				';
			}
		}
		else
		{
			
		}
	}
	public function load_binhluan_acount($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$MaBL = $row['MaBL'];
				$NoiDung = $row['NoiDung'];
				$Username = $row['Username'];
				$ThoiGian = $row['ThoiGian'];
				$HoTen = $row['HoTen'];
				$MaSP = $row['MaSP'];
				$Hinh = $row['Hinh'];
				echo
				'
				<div class="product-comment row form-group">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="comment-item">
                        <ul class = item-reviewer>
                            <div class="comment-item-user">
							<img src="./img/'.$Hinh.'" alt="" class="comment-item-user-img">
                                <li><b>'.$HoTen.'</b></li> 
                             </div>
                          
                           <br>
                            <li><h6>'.$ThoiGian.'</h6></li>
                            <li>
                               <h4>'.$NoiDung.'</h4>
                            </li>
							<li>
							<a href="xoabl.php?id='.$MaSP.'&idbl='.$MaBL.'">Xóa</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1"></div>
               </div>
				';
			}
		}
		else
		{
			
		}
	}

	public function themxoasua($sql)
	{
		$link = $this->connect();
		if(mysqli_query($link, $sql))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function huydh($sql)
	{
		$link = $this->connect();
		if(mysqli_query($link, $sql))
		{
			echo 'alert("Bạn đã hủy thành công đơn hàng!");';
			return 1;
		}
		else
		{
			echo 'alert("Đơn hàng của bạn không thể hủy vì đã được xác nhận");';
			return 0;
		}
	}
	public function load_hoso($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);

		if($i > 0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
				$HoTen = $row['HoTen'];
				$SDT = $row['SDT'];
				$DiaChi = $row['DiaChi'];
				$Email = $row['Email'];
				$Hinh = $row['Hinh'];
				echo'
				<div class="col-md-5 hoso-img">
					<img src="./img/'.$Hinh.'" alt="" class="">
                    </div>
                    <div class="col-md-7 hoso-body">
				<ul>
                            <li>Họ và tên: '.$HoTen.'</li>
                            <li>Địa chỉ: '.$DiaChi.' </li>
                            <li>SĐT: '.$SDT.' </li>
                            <li>Email: '.$Email.' </li>
                        </ul>
						</div>';
			}
	
		}
		else
		{
			echo 'không có dữ liệu';
		}
		
	}
	public function load_donhang_khachhang($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			$STT=1;
			while($row=mysqli_fetch_array($ketqua))
			{
				
				$MaDH = $row['MaDH'];
				$TongTien = $row['TongTien'];
				$PPThanhToan = $row['PPThanhToan'];
				$TrangThaiTT = $row['TrangThaiTT'];
				$TrangThai = $row['TrangThai'];
				$TenTTDH = $row['TenTTDH'];
				$NgayDatHang= $row['NgayDatHang'];
				echo'
				<tr>
                            <td>'.$STT.'</td>
                            <td>'.$MaDH.'</td>
                            <td>'.$TongTien.'</td>
                            <td>'.$PPThanhToan.'</td>
                            <td>'.$TrangThaiTT.'</td>
                            <td>'.$TenTTDH.'</td>
							<td>'.$NgayDatHang.'</td>
							<td><a href="hoso.php?iddh='.$MaDH.'"id="btn">Hủy đơn hàng</a><td>
							
							<td><a href="hoso.php?id='.$MaDH.'"><button type="button" class="btn btn-primary" id="myBtn">Xem chi tiết</button></a></td>
                        </tr>';
						
						$STT++;	
			}
			return 1;
	
		}
		else
		{
			return 0;
		}
		
	}
	public function load_ctdonhang($sql)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
		if($i > 0)
		{
			$STT=1;
			echo '
			<tr>
							<th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
				</tr>
			';
			while($row=mysqli_fetch_array($ketqua))
			{
				$TenSP = $row['TenSP'];
				$SoLuong = $row['SoLuong'];
				$DonGia = $row['DonGia'];
				$DiaChi = $row['DiaChi'];
				$SDT = $row['SDT'];
				echo'
				
				<tr>
                            <td>'.$TenSP.'</td>
                            <td>'.$SoLuong.'</td>
                            <td>'.$DonGia.'</td>						
                        </tr>';
						
						$STT++;	
			}
			echo '
			<tr><td colspan="3">'.$DiaChi.'</td></tr>
			<tr><td colspan="3">'.$SDT.'</td></tr>
			<tr><td colspan="3"><a href="hoso.php"><button type="button" class="btn btn-primary">Đóng</button></a></td></tr>';
			return 1;
	
		}
		else
		{
			return 0;
		}
		
	}
	public function get_hoso($id)
	{
		$link = $this->connect();
        $ketqua = mysqli_query($link, "select * from khachhang where Email='".$id."'");
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
	
}
?>