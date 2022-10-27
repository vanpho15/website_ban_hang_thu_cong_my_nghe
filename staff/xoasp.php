<?php
include("class/cls_product.php");
$p=new tmdt();
$MaSPxoa=$_REQUEST['id'];
$p->themxoasua('delete from sanpham where MaSP="'.$MaSPxoa.'"');
header("Location: dssp.php");

?>
</body>
</html>