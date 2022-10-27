<?php
include('./class/tmdt.php');
$q = new quanly();
$MaDHxoa=$_REQUEST['iddh'];
                        if($q->themxoasua('delete from donhang where MaDH="'.$MaDHxoa.'" and TrangThai=1')==1){
                            header("Location:hoso.php");
                            echo '<script>
                            window.alert("Bạn đã hủy thành công đơn hàng!");
                        </script>';
                        
                        }else{
                            header("Location:hoso.php");
                            echo '<script>
                            alert("Đơn hàng của bạn không thể hủy vì đã được xác nhận");
                        </script>';
                        }

?>