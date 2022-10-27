<?php

include('header.php');
require_once 'class/config.php';
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
  
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo= [
        'email' => $google_account_info['email'],
        'token' => $google_account_info['id'],
        'full_name' => $google_account_info['name'],
        'picture' => $google_account_info['picture'],
    ];
    $conn = mysqli_connect('localhost', 'root', '', 'myngheviet') or die('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM taikhoan where Username = '{$userinfo['email']}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $Username=$userinfo['email'];
        $Password=$userinfo['token'];
        $PhanQuyen=0;
        if($p->mylogin_google($Username,$Password,$PhanQuyen )==1)
		{
			$unique_id=$_SESSION['unique_id'];
            echo "
            <script>
            location.reload();
                window.location.href= 'index.php';
            </script>
            ";

		}
		else
		{
		echo 'Đăng Nhập Không Thành Công';
		}
    } else {
            $PhanQuyen= 0;
            $unique_id=rand(time(), 100000000);
            $sql = "INSERT INTO `taikhoan` (`Username`, `Password`, `PhanQuyen`, `MaKH`, `unique_id`, `TrangThai`) VALUES ('{$userinfo['email']}', '{$userinfo['token']}', '$PhanQuyen', NULL, '$unique_id', 'Online')";
            $result = mysqli_query($conn, $sql);
            if($result){
            $Username=$userinfo['email'];
            $Password=$userinfo['token']; 
            $sql="INSERT INTO `khachhang` (`MaKH`, `HoTen`, `DiaChi`, `SDT`, `Email`, `Hinh`) VALUES (NULL, '{$userinfo['full_name']}', '', '', '{$userinfo['email']}', '{$userinfo['picture']}')";
            $result = mysqli_query($conn, $sql);
            }else{
            echo 'not login google';
            die();
            }
    }
        $_SESSION['Username']=$Username;
        $_SESSION['Password']=$Password;
        $_SESSION['unique_id']= $unique_id;
        echo "
            <script>
            location.reload();
                window.location.href= 'index.php';
            </script>
            ";
        exit();
  }
?>
<style>
    .list-category_col li:hover{
    background-color: white;
    
}
.list-category_col li a{
    color: white;
}
.list-category_col li:hover a{
    text-decoration: none;
    color: #000;
}
.bestselling__product-list{
    overflow: hidden;
}
.newselling__product-list{
    overflow: hidden;
}


    </style>
    <body>
        
        <div class="main">
            <div class="banner_category container">
                <div class="category row form-group">
                    <div class="list-category col-md-3 ">
                        <div class="category-header">
                            <i class="category-header__icon ti-view-list-alt"></i>
                            Danh mục
                        </div>
                        <ul class="list-category_col">
                                <!--  
                                    <ul class="subnav">
                                        <a href="#"><li>Merchandies</li></a>
                                        <a href="#"><li>Merchandies</li></a>
                                        <a href="#"><li>Merchandies</li></a>
                                    </ul>-->
                                <?php
                                    $q->load_danhmuc_sanpham("select * from danhmucsp order by TenDM asc");
                                ?>
                            <li><img src="./img/logo1.jpg" alt=""></li>
                        </ul>
                        
                    </div>
                    <div class="slide-banner col-md-9 ">
                        <div class="row form-group">
                            <div class="col-md-8 ">
                                <div class="search-container">
                                 <form action="list_product.php" method="get">
                                    <input type="text" name="search" value="<?php $_GET['search']; ?>" placeholder="Nhập sản phẩm bạn muốn tìm">
                                    <button type="submit" name="submit" class="btn btn-warning" value="Tìm Kiếm"><i class="ti-search"></i></button>
                                </form>
                                  </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="search-phone">
                                    <div class="search_phone-icon"><i class="ti-headphone-alt"></i></div>
                                    <span><b>Hỗ trợ 24/7:</b></span>
                                    <h5>+8408123456</h5>
                                    
                                    </div>
                                </div>
                        </div>
                        <div class="slide">
                            <article class="lever3">
                                <div class="huong">
                                    <i class=" trai ti-arrow-circle-left" onclick="Back();"></i>
                                    <i class=" phai ti-arrow-circle-right" onclick="Next();"></i>
                                </div>
                                <div class="lv3">
                                    <img src="./img/banner1.png">
                                    <img src="./img/banner2.jpg">
                                    <img src="./img/banner3.jpg">
                                </div>
                            </article>
                            <script>
                            var KichThuoc = document.getElementsByClassName("lever3")[0].clientWidth;
                            var ChuyenSlide = document.getElementsByClassName("lv3")[0];
                            var Img = ChuyenSlide.getElementsByTagName("img");
                            var Max = KichThuoc * Img.length;
                            Max -= KichThuoc;
                            var Chuyen = 0;
            
                            function Next() {
                                if (Chuyen < Max) Chuyen += KichThuoc;
                                else Chuyen = 0;
                                ChuyenSlide.style.marginLeft = '-' + Chuyen + 'px';
                            }
            
                            function Back() {
                                if (Chuyen == 0) Chuyen = Max;
                                else Chuyen -= KichThuoc;
                                ChuyenSlide.style.marginLeft = '-' + Chuyen + 'px';
                            }
            
                            setInterval(function() {
                                Next();
                            }, 2500);
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <section class="bestselling">
                <div class="container">
                    <div class="row form-group">
                        <div class="bestselling__heading-wrap">
                            <img src="./img/bestselling.png" alt="Sản phẩm bán chạy"
                             class="bestselling__heading-img">
                            <div class="slideanim bestselling__heading">Top sản phẩm bán chạy</div>
                        </div>
                    </div>

                </div>
                    <div class="row form-group bestselling__product-list ">
                        <div class="bestselling__product col-md-2">
                            <div class="bestselling__product-img-box">
                                <img src="./img/gio-may-tre.png" alt="Biểu tượng thất truyền" class="bestselling__product-img">
                            </div>
                            <div class="bestselling__product-text">
                                <h5 class="bestselling__product-title">
                                    <a href="#" class="bestselling__product-link">Biểu tượng thất truyền</a>
                                </h5>
        
                                <div class="bestselling__product-rate-wrap">
                                    <i class="fas fa-star bestselling__product-rate"></i>
                                    <i class="fas fa-star bestselling__product-rate"></i>
                                    <i class="fas fa-star bestselling__product-rate"></i>
                                    <i class="fas fa-star bestselling__product-rate"></i>
                                    <i class="fas fa-star bestselling__product-rate"></i>
                                </div>
        
                                <span class="bestselling__product-price">
                                    147.000đ
                                </span>
        
                                <div class="bestselling__product-btn-wrap">
                                    <button class="bestselling__product-btn">Xem hàng</button>
                                </div>
                            </div>
                        </div>
                            <div class="bestselling__product col-md-2">
                                <div class="bestselling__product-img-box">
                                    <img src="./img/gio-may-tre.png" alt="Biểu tượng thất truyền" class="bestselling__product-img">
                                </div>
                                <div class="bestselling__product-text">
                                    <h5 class="bestselling__product-title">
                                        <a href="#" class="bestselling__product-link">Biểu tượng thất truyền</a>
                                    </h5>
            
                                    <div class="bestselling__product-rate-wrap">
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                    </div>
            
                                    <span class="bestselling__product-price">
                                        147.000đ
                                    </span>
            
                                    <div class="bestselling__product-btn-wrap">
                                        <button class="bestselling__product-btn">Xem hàng</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bestselling__product col-md-2">
                                <div class="bestselling__product-img-box">
                                    <img src="./img/gio-may-tre.png" alt="Biểu tượng thất truyền" class="bestselling__product-img">
                                </div>
                                <div class="bestselling__product-text">
                                    <h5 class="bestselling__product-title">
                                        <a href="#" class="bestselling__product-link">Biểu tượng thất truyền</a>
                                    </h5>
            
                                    <div class="bestselling__product-rate-wrap">
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                    </div>
            
                                    <span class="bestselling__product-price">
                                        147.000đ
                                    </span>
            
                                    <div class="bestselling__product-btn-wrap">
                                        <button class="bestselling__product-btn">Xem hàng</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bestselling__product col-md-2">
                                <div class="bestselling__product-img-box">
                                    <img src="./img/gio-may-tre.png" alt="Biểu tượng thất truyền" class="bestselling__product-img">
                                </div>
                                <div class="bestselling__product-text">
                                    <h5 class="bestselling__product-title">
                                        <a href="#" class="bestselling__product-link">Biểu tượng thất truyền</a>
                                    </h5>
            
                                    <div class="bestselling__product-rate-wrap">
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                    </div>
            
                                    <span class="bestselling__product-price">
                                        147.000đ
                                    </span>
            
                                    <div class="bestselling__product-btn-wrap">
                                        <button class="bestselling__product-btn">Xem hàng</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bestselling__product col-md-2">
                                <div class="bestselling__product-img-box">
                                    <img src="./img/gio-may-tre.png" alt="Biểu tượng thất truyền" class="bestselling__product-img">
                                </div>
                                <div class="bestselling__product-text">
                                    <h5 class="bestselling__product-title">
                                        <a href="#" class="bestselling__product-link">Biểu tượng thất truyền</a>
                                    </h5>
            
                                    <div class="bestselling__product-rate-wrap">
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                    </div>
            
                                    <span class="bestselling__product-price">
                                        147.000đ
                                    </span>
            
                                    <div class="bestselling__product-btn-wrap">
                                        <button class="bestselling__product-btn">Xem hàng</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bestselling__product col-md-2">
                                <div class="bestselling__product-img-box">
                                    <img src="./img/gio-may-tre.png" alt="Biểu tượng thất truyền" class="bestselling__product-img">
                                </div>
                                <div class="bestselling__product-text">
                                    <h5 class="bestselling__product-title">
                                        <a href="#" class="bestselling__product-link">Biểu tượng thất truyền</a>
                                    </h5>
            
                                    <div class="bestselling__product-rate-wrap">
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                        <i class="fas fa-star bestselling__product-rate"></i>
                                    </div>
            
                                    <span class="bestselling__product-price">
                                        147.000đ
                                    </span>
            
                                    <div class="bestselling__product-btn-wrap">
                                        <button class="bestselling__product-btn">Xem hàng</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <script>
                    // Basic initialization is like this:
                    // $('.your-class').slick();

                    // I added some other properties to customize my slider
                    // Play around with the numbers and stuff to see
                    // how it works.
                    $('.bestselling__product-list').slick({
                        infinite: true,
                        slidesToShow: 5, // Shows a three slides at a time
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        // When you click an arrow, it scrolls 1 slide at a time
                        arrows: false, // Adds arrows to sides of slider
                        dots: false // Adds the dots on the bottom
                        });
                        </script>
            </section>
            <div class="introduce">
                    <div class="row form-group">
                        <div class="slideanim introduce_header">
                            MANG LẠI GIÁ TRỊ CHO CỘNG ĐỒNG
                        </div>
                    </div>
                    <div class="introduce__body row form-group">
                        <div class="col-md-1"></div>
                        <div class="slideanim introduce__video col-md-5">
                            
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/M8C62_wdCx4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="slideanim introduce__content col-md-5">
                            <p>" Tại sao chúng ta phải chi trả rất nhiều cho sản phẩm nhập khẩu cùng loại từ các nước khác như từ Trung Quốc, Thái Lan,… trong khi những người thợ thủ công Việt đã tạo ra rất nhiều sản phẩm tinh tế, mang đậm bản sắc văn hóa Việt và xuất khẩu đi rất nhiều nước ở Châu Âu, Mỹ và Nhật Bản? "</p>
                            <p>" Chúng tôi chuyên cung cấp đa dạng các mặt hàng thủ công mỹ nghệ được sản xuất bởi những nghệ nhân tài hoa tại các làng nghề truyền thống nổi tiếng trên khắp Việt Nam. "</p>
                        </div>
                        <div class="col-md-1"></div>
             </div>
             <script>
                const slideanim = document.querySelectorAll('.slideanim')
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        const { target } = entry;
                        target.classList.toggle('active', entry.isIntersecting)
                    })
                }, {})

                slideanim.forEach(slideanim => {
                    observer.observe(slideanim)
                })
             </script>
            </div>
            <section class="newselling">
                <div class="container">
                    <div class="row form-group">
                        <div class="newselling__heading-wrap">
                            <img src="./img/bestselling.png" alt="Sản phẩm mới nhất"
                            class="newselling__heading-img">
                            <div class="newselling__heading">Sản phẩm mới nhất</div>
                        </div>
                        
                    </div>
                </div>
                    <div class="row form-group newselling__product-list">
                        <?php
                       
                        $q->load_sanpham_new("select * from sanpham order by MaSP desc");
                        
                        ?>
                    </div>
                    <div class="sclick">
                    <script>
                    // Basic initialization is like this:
                    // $('.your-class').slick();

                    // I added some other properties to customize my slider
                    // Play around with the numbers and stuff to see
                    // how it works.
                    $('.newselling__product-list').slick({
                        infinite: true,
                        slidesToShow: 5, // Shows a three slides at a time
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 1000,
                        // When you click an arrow, it scrolls 1 slide at a time
                        arrows: false, // Adds arrows to sides of slider
                        dots: false // Adds the dots on the bottom
                        });
                        </script>

                    </div>
            </section>
        
            <?php
            include('footer.php');
            ?>