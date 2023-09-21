
<?php
    session_start();
    include('config/config.php');
    if (isset($_POST['dangnhap'])){
        $taikhoan=$_POST['username'];
        $matkhau=md5($_POST['password']); //ma khoa mat khau thanh md5
        $sql="SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' Limit 1";
        $row=mysqli_query($mysqli,$sql);// bien ket noi co so du lieu
        $count= mysqli_num_rows($row);

        if ($count>0){
            $_SESSION['dangnhap']=$taikhoan;
            header("Location:index.php");
        }else{
         
            echo "<script>alert('Tai khoan hoac Mat khau khong dung, Vui long kiem tra lai ')</script>";
            header("Location:login.php");
           
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admincp</title>
    <style>
        body {
            background: #2C3E50; /* Màu nền cho toàn bộ trang */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper-login {
            width: 400px;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
            transition: transform 0.2s;
        }

        .wrapper-login:hover {
            transform: scale(1.05);
        }

        .wrapper-login h3 {
            color: #3498DB;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .table-login {
            width: 100%;
        }

        .table-login tr td {
            padding: 10px;
        }

        .table-login tr td:first-child {
            font-weight: bold;
            color: #333;
        }

        .table-login tr td input[type="text"],
        .table-login tr td input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #3498DB;
            background-color: #f2f2f2;
            font-size: 14px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .table-login tr td input[type="text"]:focus,
        .table-login tr td input[type="password"]:focus {
            background-color: #fff;
            border-color: #E74C3C;
        }

        .table-login tr td input[type="submit"] {
            background-color: #3498DB;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .table-login tr td input[type="submit"]:hover {
            background-color: #2980B9;
        }
    </style>
</head>
<body>
    <div class="wrapper-login">
        <form action="" autocomplete="off" method="POST">
            <table class="table-login">
                <tr>
                    <td colspan="2">
                        <h3>Đăng nhập Admin</h3>
                    </td>
                </tr>
                <tr>
                    <td>Tài khoản:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="dangnhap" value="Đăng nhập">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
</body>
</html>
