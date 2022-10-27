
<?php
include('header.php');
error_reporting(0);
if(!isset($_GET['page'])){
    $page=1;
} else {
    $page=$_GET['page'];
}
$per_page=9;
$order=$_GET['order'];
if($order==1){
    $sql_order="order by MaSP desc ";
} else if($order==2){
    $sql_order="order by DonGia desc";
}
else if($order==3){
  $sql_order="order by DonGia asc";
} else {
    $sql_order="order by DonGia asc";
}
$min_price=$_GET['minamount'];
$max_price=$_GET['maxamount'];
$where_price="";
if($min_price>0&&$max_price>0){
    $where_price="and DonGia between ".$min_price." and ".$max_price." ";
}
$layid_danhmuc = $_REQUEST['id'];
                            if($layid_danhmuc > 0)
                            {
                                $sql="select * from sanpham where MaDM='$layid_danhmuc'".$where_price;
                                $sql_thucthi="select * from sanpham where MaDM='$layid_danhmuc' ".$where_price.$sql_order." limit ".($page-1)*$per_page.",".$per_page;   
                            }
                            elseif(isset($_GET['submit']))
                            {
                                switch($_GET['submit'])
                                {
                                    case 'Tìm Kiếm':
                                    {
                                        if ($_GET["search"] != '') 
                                        {
                                            $search = $_GET['search'];
                                            $sql="select * from sanpham where (TenSP like '%$search%') OR (MoTa like '%$search%')".$where_price;
                                            $sql_thucthi="select * from sanpham where (TenSP like '%$search%') OR (MoTa like '%$search%') ".$where_price.$sql_order." limit ".($page-1)*$per_page.",".$per_page;
                                        } else{
                                            $sql="select * from sanpham where 1=1 ".$where_price;
                                             $sql_thucthi="select * from sanpham where 1=1 ".$where_price.$sql_order." limit ".($page-1)*$per_page.",".$per_page;
                                        }  
                                    }
                                }       
                            }
                            else
                            {
                                $sql="select * from sanpham where 1=1 ".$where_price;
                                $sql_thucthi="select * from sanpham where 1=1 ".$where_price.$sql_order." limit ".($page-1)*$per_page.",".$per_page;
                            }
                            //var_dump($sql."@@@".$sql_thucthi);die;
?>

    <!-- Breadcrumb Section Begin -->
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
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
    </style>
    <div  class="banner_category ">
                <div class="category row form-group">
                <div class="container">
                    <div class="list-category col-md-3 " >
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
                        <div class="sidebar__item">
                            <h4>Tùy Chọn Giá</h4>
                            <div class="price-range-wrap">
                            <form action="#" method="get">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="15000" data-max="500000">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount" name="minamount" value="<?php echo $_GET['minamount']; ?>">
                                        <input type="text" id="maxamount" name="maxamount" value="<?php echo $_GET['maxamount']; ?>">
                                        <input type="submit" id="search_price" name="search_price" value="Tìm kiếm">
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="slide-banner col-md-9 ">
                        <div class="row form-group">
                                <div class="search-container">
                                <form action="#" method="get">
                                    <input type="text" name="search" value="<?php echo $_GET['search']?>" placeholder="Nhập sản phẩm bạn muốn tìm">
                                    <button type="submit" name="submit" class="btn btn-warning" value="Tìm Kiếm"><i class="ti-search"></i></button>
                                </form>
                                </div> 
                        </div>
                        <div class="row form-group container">
                                <div class="col-md-6">
                                    <div class="filter__item">
                                        <form method="get">
                                                <div class="filter__sort">
                                                    <span>Sắp Xếp Theo</span>

                                                    <select name="select_order" id="select_order">
                                                        <option <?php if($_GET['order']==0) echo "selected"; ?> value="Tất Cả">Tất Cả</option>
                                                        <option <?php if($_GET['order']==1) echo "selected"; ?> value="Hàng Mới">Hàng Mới</option>
                                                        <option <?php if($_GET['order']==2) echo "selected"; ?> value="Giá Cao">Giá Cao</option>
                                                        <option <?php if($_GET['order']==3) echo "selected"; ?> value="Giá Thấp" >Giá Thấp</option>
                                                    </select>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="filter__found">
                                        <h6><span><?php 
                                        echo $q->tongsanpham($sql);?></span> sản phẩm được tìm thấy</h6>
                                    </div> 
                                </div>
                                <div class="col-md-3"></div>
                        </div>
                        
                            <div class="row form-group">
                            <?php
                            $q->load_sanpham_product($sql_thucthi);
                            ?>
                    </div>
                    </div>
                    </div>
                    
                    <div class="row form-group">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                    <div class="product__pagination">
                        <?php echo $q->paging($sql); ?>
                    </div>
                    </div>
                    <div class="col-md-5"></div>
                    </div>
                </div>
            </div>
    <!-- Product Section End -->
    <?php include('footer.php'); ?>