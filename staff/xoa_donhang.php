<?php
include("../class/config.php");
include("class/cls_giohang.php");
$giohang=new giohang();
$MaDHxoa=$_REQUEST['id'];
$giohang->themxoasua('delete from donhang where MaDH="'.$MaDHxoa.'"');
header("Location:dsdonhang.php");
?>
</body>
</html>

