
<?php
    session_start();
    include('config/config.php');
    if (isset($_POST['dangnhap'])){
        $taikhoan=$_POST['username'];
        $matkhau=md5($_POST['password']); //ma khoa mat khau thanh md5
        $sql="SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' Limit 1";
        $row=mysqli_query($mysqli,$sql);// bien ket noi co so du lieu
        $count= mysqli_num_rows($row);
		$status = mysqli_fetch_array($row);
        if ($count>0){
            $_SESSION['dangnhap']=$taikhoan;
			$_SESSION['status']=$status['admin_status'];
            header("Location:index.php?status=".$_SESSION['status']);
        }else{
         
          
			header('Location:login.php?message=Vui lòng kiểm tra lại !');
           
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="style_login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="style_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="style_login/vendor/daterangepicker/daterangepicker.css">
<!--=============================================style_login/==================================================-->
	<link rel="stylesheet" type="text/css" href="style_login/csss/util.css">
	<link rel="stylesheet" type="text/css" href="style_login/csss/main.css">
    <title>login Admincp</title>

</head>
<body>
<?php
  if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('$message');</script>";
  }
  ?>
<div class="limiter">
		<div class="container-login100" style="background-image: url('style_login/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					login Admin
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5 " method="POST">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required> 
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						
						<input type="submit" name="dangnhap" value="Đăng nhập" class="login100-form-btn">
					</div>
					<div class="col-12">
                      <p class="small mb-0" style="text-align: center;margin-top: 5px;"> <a href="pages-register.php">Tạo tài khoản</a></p>
                    </div>
				</form>
			</div>
		</div>
	</div>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
</body>
</html>
