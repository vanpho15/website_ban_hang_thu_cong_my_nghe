<?php
include("./class/config.php");
include("./class/tmdt.php");
$p=new quanly();
session_start();
error_reporting(0);
	if( isset($_SESSION['Username']) && isset($_SESSION['Password']))
	{
        $layid_sanpham = $_REQUEST['id']; 
		$id_binhluan=$_REQUEST['idbl'];
        $Username = $_SESSION['Username'];
        $p->themxoasua('delete from binhluan where MaBL="'.$id_binhluan.'" and Username ="'.$Username.'"');
        header("Location: ./Chitietsanpham.php?id=$layid_sanpham");
    }

?>