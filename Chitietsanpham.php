<?php include('header.php'); ?>

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
               	<?php
				$layid_sanpham = $_REQUEST['id']; 
				$q->load_sanpham_chitiet("select * from sanpham where MaSP='$layid_sanpham'");
				?>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Các sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $layid_dm = $_REQUEST['iddm']; 
                $q->load_sanpham_lienquan("select * from sanpham where MaDM='$layid_dm' and MaSP != '$layid_sanpham'");
                ?>
            </div>
        </div>
    </section>
    <secsion class="commant">
    <div class="customer-reviews row form-group">
                <div class="col-md-1"></div>
                <div class="col-md-10 ">
                    <h3 >Bình luận sản phẩm</h3>
                    <form id ="formgroupcomment" method="post">                    
                        <div class="form-group">
                            <label>Nội dung:</label>
                            <textarea name="comm_details" required="" rows="8" id ='formcontent' class="form-control"></textarea>     
                        </div>
                        <button type="submit" class="site-btn" name="nut" id="nut" value="Gửi">Gửi</button>
                    </form> 
                    <?php
                    if(isset($_SESSION['Username'])&&isset($_SESSION['Password'])){
                        switch($_POST['nut'])
                        {
                            case 'Gửi':
                            {
                                $Username=$_SESSION['Username'];
                                $NoiDung=$_POST['comm_details'];
                                $layid_sanpham = $_REQUEST['id'];
                                date_default_timezone_set("Asia/Ho_Chi_Minh");
                                $time_now=getdate();// get ngày giờ tuần hiện tại
                                $show_date= $time_now['mday'].'/'.$time_now['mon'].'/'.$time_now['year'];
                                $id_binhluan=$_REQUEST['idbl'];
                                $Username = $_SESSION['Username'];
                                    if($NoiDung!='')
                                    {
                                                if($giohang->themxoasua("INSERT INTO `binhluan`(`MaBL`, `NoiDung`, `MaSP`, `ThoiGian`, `Username`) VALUES ('NULL','$NoiDung','$layid_sanpham','$show_date','$Username');")==1)
                                                {
                                                    echo "thành công";
                                                }
                                                else
                                                {
                                                    echo'Bình luận không thành công';
                                                }
                        
                                    }
                                    else
                                    {
                                    }
                                    break;
                                }
                        }

                    }else{

                    }
                    ?>
    </div>
                </div>
                <div class="col-md-1"></div>
               </div>
    </session>
        <?php
        if(isset($_SESSION['Username'])){
            $acount= $_SESSION['Username'];
            $q->load_binhluan_acount("select * from binhluan INNER JOIN khachhang on khachhang.Email = binhluan.Username INNER JOIN sanpham on sanpham.MaSP=binhluan.MaSP where binhluan.MaSP = '$layid_sanpham' and binhluan.Username ='$acount'ORDER BY MaBL DESC
            ");
            $q->load_binhluan("select * from binhluan INNER JOIN khachhang on khachhang.Email = binhluan.Username INNER JOIN sanpham on sanpham.MaSP=binhluan.MaSP where binhluan.MaSP = '$layid_sanpham' and binhluan.Username !='$acount'ORDER BY MaBL DESC");
        }else{
        $q->load_binhluan("select * from binhluan INNER JOIN khachhang on khachhang.Email = binhluan.Username INNER JOIN sanpham on sanpham.MaSP=binhluan.MaSP where binhluan.MaSP = '$layid_sanpham'ORDER BY MaBL DESC");
        }
        ?>
    </div>
    <!-- Related Product Section End -->
<?php include('footer.php'); ?>