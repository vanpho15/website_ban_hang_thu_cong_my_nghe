<?php
include("class/cls_product.php");
$p=new tmdt();
$id_danhmuc=$_REQUEST['id'];
$p->themxoasua('delete from danhmucsp where MaDM="'.$id_danhmuc.'"');
header("Location: dsdm.php");
?>
</body>
</html>