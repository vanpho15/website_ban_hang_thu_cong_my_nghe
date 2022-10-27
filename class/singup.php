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
	function cruser($Username ,$Password,$Email,$SDT)
	{
        $Password = md5($Password);
		$link = $this->connect();
			$sql1 = "select Username, Password from taikhoan where Username !='$Username' limit 1";
			$ketqua1 = mysqli_query($link, $sql);
			$i = mysqli_num_rows($ketqua);
			if ($i == 1) {
				$sql="INSERT INTO taikhoan ('Username', 'Password','SDT', 'DiaChi') VALUES ('$Username', '$password', '$ten', '$hodem')";
				$ketqua=mysql_query($sql,$link);
				return 1;
			} else {
				return 0;
			}
			
	
	}
}