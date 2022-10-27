<?php
    include('header.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trang Chủ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
        <link rel="stylesheet" type="text/css" href="./css/index.css">
        <link rel="stylesheet" type="text/css" href="./css/cart.css">
        <link rel="stylesheet" type="text/css" href="./css/responsive.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="./js/jquery-3.6.0.min.js"></script>
        <script src="./js/bootstrap.js"></script>
        <link rel="stylesheet" href="./font/themify-icons-font/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        <div class="main">
            <?php
            include './class/db.php';
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart']= array();
            }
            if(isset($_GET['action'])){
                function update_cart($add= false){
                    foreach($_POST['quantity'] as $id => $quantity){
                        if($quantity == 0){
                            unset($_SESSION["cart"][$_GET['id']]);
                        }else{
                            if($add){
                                $_SESSION['cart'][$id] += $quantity;
                            }else{
                                $_SESSION['cart'][$id]= $quantity;
                            }
                        }
                        
                    }
                }
                    switch($_GET['action']){
                        case "add":
                            update_cart(true);
                            break;
                        case "delete":
                            if(isset($_GET['id'])){
                                unset($_SESSION["cart"][$_GET['id']]);
                            }
                        break;
                        case "submit":
                            if(isset($_POST['update_click'])){
                                update_cart();
                            }elseif(isset($_POST['order_click'])){
                                
                                }
                        break;
                    }
            }
            
            ?>
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <form id = "cart-form" action="cart.php?action=submit" method="POST">
                        <table>
                            <thead>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Xóa</th>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($_SESSION['cart'])){
                                    $giohang->insert_giohang();
                                }
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="list_product.php" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                        <input class="primary-btn cart-btn cart-btn-right" type="submit" name="update_click" value="Cập nhật"/>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng tiền giỏ hàng</h5>
                        <ul>
                            <li>Tạm tính <span class="tongtien_sanpham"><?php if(!empty($_SESSION['cart'])){
                                     echo number_format($giohang->tongtien_giohang());
                                }
                           ?></span></li>
                            <li>Tổng tiền <span class="tongtien_sanpham"><?php if(!empty($_SESSION['cart'])){
                                     echo number_format($giohang->tongtien_giohang());
                                }
                           ?></span></li>
                        </ul>
                        <a href="Thanhtoan.php" class="primary-btn">Thanh toán</a>
                    </div>
                </div>
            </div>
            </form>
            </div>
            </div>
            </div>
        </div>
    </section>
            <?php
            include('footer.php');
            ?>
        </div>
    </body>
</html>