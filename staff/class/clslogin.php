<?php
class login
{
	private function connect()
	{
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myngheviet";
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		if (!$conn) {
			echo "Database connection error" . mysqli_connect_error();
			exit();
		} else {
			mysqli_select_db($conn, $dbname);
			mysqli_set_charset($conn, 'UTF8');
			return $conn;
		}
	}
	function mylogin($Username, $Password, $PhanQuyen)
	{
		$Password = md5($Password);
		$link = $this->connect();
		$sql = "select Username, Password, PhanQuyen, unique_id, TrangThai from taikhoan where Username ='$Username' and Password ='$Password' and PhanQuyen = '$PhanQuyen' limit 1";
		$sql1 = mysqli_query($link, "SELECT * FROM taikhoan WHERE Username = '{$Username}'");
		$ketqua = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($sql1);
		$i = mysqli_num_rows($ketqua);
		if ($i == 1) {
			$status = "Online";
			$sql2 = mysqli_query($link, "UPDATE taikhoan SET TrangThai = '{$status}' WHERE unique_id = {$row['unique_id']}");		
			while ($row = mysqli_fetch_array($ketqua)) {
				$Username = $row['Username'];
				$Password = $row['Password'];
				$unique_id = $row['unique_id'];
				$PhanQuyen = $row['PhanQuyen'];
				//*//
				session_start();
				$_SESSION['Username'] = $Username;
				$_SESSION['Password'] = $Password;
				$_SESSION['PhanQuyen'] = $PhanQuyen;
				$_SESSION['unique_id'] = $unique_id;
			}
			return 1;
		} else {
			return 0;
		}
	}
	function confirmlogin($id,$email,$password)
	{
		$link=$this->connect();
		$sql="select id from tk_admin where id='$id' and email='$email' and password='$password' limit 1";
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		if($i!=1)
		{
			header('location:../Login_admin.php');
		}
	}

}
?>