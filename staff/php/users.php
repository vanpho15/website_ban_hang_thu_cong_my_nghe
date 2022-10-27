<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = "
SELECT *
FROM taikhoan
INNER JOIN khachhang ON khachhang.Email = taikhoan.Username
WHERE NOT taikhoan.unique_id = {$outgoing_id}
AND khachhang.Email = taikhoan.Username";
$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "Không có khách hàng nào";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}
echo $output;