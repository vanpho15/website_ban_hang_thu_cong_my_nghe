<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = "
SELECT *
FROM taikhoan
INNER JOIN nhanvien ON nhanvien.MaNV = taikhoan.Username
WHERE NOT taikhoan.unique_id = {$outgoing_id}
AND nhanvien.MaNV = taikhoan.Username";
$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "Không có nhân viên nào hiện đang online";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}
echo $output;