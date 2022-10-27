<?php
	session_start();
	error_reporting(0);
	if(isset( $_SESSION['Username']) && isset($_SESSION['Password'])&& $_SESSION['PhanQuyen']==1 )
	{
		header('location:./index.php');
	}
	else
	{
	include('class/clslogin.php');
	$p = new login();
	}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						<b>Đăng Nhập Quản Trị</b>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "<?php echo 'Không được để trống' ?>">
						<input class="input100" type="text" name="email" placeholder="Tài Khoản">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "<?php echo 'Không được để trống' ?>">
						<input class="input100" type="password" name="password" placeholder="Mật Khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="btn_submit" name="btn_submit" value="Đăng nhập">
							<b>Đăng Nhập</b>
						</button>
					</div>
					<br><br><br />
                    	<?php
						  switch($_POST['btn_submit'])
						  {
							case 'Đăng nhập':
							{
								$Username = $_POST["email"];
								$Password = $_POST["password"];
								$PhanQuyen = 1 ;
								if (empty($_POST["email"])) {
									echo'Không được để trống username';
								  } else {
									if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $Username)) {
									  echo "Username không đúng định dạng của email"; 
										}else{
											if (empty($_POST["password"])) {
												echo'Mật khẩu không được để trống';
											  } else {
												if (!preg_match("/^[A-Za-z0-9]{1,10}$/", $Password)) {
												  echo'Mật khẩu chỉ là số hoặc chữ không được chứa kí tự đặc biệt'; 
												}else{
													if($p->mylogin($Username,$Password,$PhanQuyen )==1)
														{
															header('location:index.php');
														}
														else
														{
															echo 'Đăng Nhập Không Thành Công';
														}
												}
											  }
									}
								  }
									break;
								}
								
						 }
					  ?>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>