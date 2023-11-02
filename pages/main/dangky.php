<?php
session_start();


include('../../admincp/config/config.php');
if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];

    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = md5($_POST['matkhau']);

    // Kiểm tra xem email hoặc số điện thoại đã tồn tại trong cơ sở dữ liệu
    $check_query = mysqli_query($mysqli, "SELECT * FROM tbl_dangky WHERE email = '" . $email . "' OR dienthoai = '" . $dienthoai . "'");
    if (mysqli_num_rows($check_query) > 0) {
        echo '<p style="color: red; font-size: 20px;">Email hoặc số điện thoại đã tồn tại. Vui lòng chọn thông tin khác.</p>';
        echo '<p style="color: red; font-size: 20px;">' . $email . '</p>';
    } else {
        if (isset($_POST['email']) && !empty($_POST['email'])) {

            // Nếu không có dòng nào trùng, thực hiện câu lệnh INSERT
            $sql_dangky = mysqli_prepare($mysqli, "INSERT INTO tbl_dangky (tenkhachhang, email, dienthoai, diachi, matkhau) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($sql_dangky, "sssss", $tenkhachhang, $email, $dienthoai, $diachi, $matkhau);

            if (mysqli_stmt_execute($sql_dangky)) {
                echo '<p style="color: green; font-size: 20px;">Bạn đã đăng ký thành công</p>';

                $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
                $_SESSION['dangky'] = $tenkhachhang;
                $_SESSION['email'] = $email;

                header('Location:../../index.php');
                ob_end_flush();
            } else {
                echo '<p style="color: red; font-size: 20px;">Có lỗi xảy ra khi đăng ký. Vui lòng thử lại sau.</p>';
            }

            mysqli_stmt_close($sql_dangky); // Process email data
        } else {
            echo '<p style="color: red; font-size: 20px;">Có lỗi xảy ra khi đăng ký email. Vui lòng thử lại sau.</p>';
        }
    }
}


if (isset($_POST['dangnhap'])) {
    $email = $_POST['emaillogin'];
    $matkhau = md5($_POST['password']); //ma khoa mat khau thanh md5
    $sql = "SELECT * FROM tbl_dangky WHERE email='" . $email . "' AND matkhau='" . $matkhau .  "' Limit 1";
    $row = mysqli_query($mysqli, $sql); // bien ket noi co so du lieu
    $count = mysqli_num_rows($row);

    if ($count > 0) {
        $row_date = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_date['tenkhachhang'];
        $_SESSION['email'] = $email;
        $_SESSION['id_khachhang'] = $row_date['id_dangky'];

        header("Location:../../index.php");
        ob_end_flush();
    } else {
        echo '<p style="color:red">Tai khoan hoac mat khau khong dung,
Vui long kiem tra lai !!!</p>';
    }
}
if (isset($_POST['quenmatkhau'])) {
    header("Location:../../index.php?quanly=quenmatkhau");
    ob_end_flush();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Style the background container */
        .background-container {
            background-image: url('https://images.pexels.com/photos/6799816/pexels-photo-6799816.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Center the form in the middle of the screen */
        .form-structor {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            height: 550px;
            width: 350px;
            position: relative;
            overflow: hidden;
        }





        .form-structor::after {
            content: '';
            opacity: 0.8;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-repeat: no-repeat;
            background-position: left bottom;
            background-size: 500px;
            background-image: url('https://images.pexels.com/photos/13952205/pexels-photo-13952205.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load');
        }

        .form-structor .signup {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            width: 65%;
            z-index: 5;
            -webkit-transition: all .3s ease;
        }

        .form-structor .signup.slide-up {
            top: 5%;
            -webkit-transform: translate(-50%, 0%);
            -webkit-transition: all .3s ease;
        }

        .form-structor .signup.slide-up .form-holder,
        .form-structor .signup.slide-up .submit-btn {
            opacity: 0;
            visibility: hidden;
        }

        .form-structor .signup.slide-up .form-title {
            font-size: 1em;
            cursor: pointer;
        }

        .form-structor .signup.slide-up .form-title span {
            margin-right: 5px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all .3s ease;
        }

        .form-structor .signup .form-title {
            color: #fff;
            font-size: 1.7em;
            text-align: center;
        }

        .form-structor .signup .form-title span {
            color: rgba(0, 0, 0, 0.4);
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all .3s ease;
        }

        .form-structor .signup .form-holder {
            border-radius: 15px;
            background-color: #fff;
            overflow: hidden;
            margin-top: 50px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all .3s ease;
        }

        .form-structor .signup .form-holder .input {
            border: 0;
            outline: none;
            box-shadow: none;
            display: block;
            height: 30px;
            line-height: 30px;
            padding: 8px 15px;
            border-bottom: 1px solid #eee;
            width: 100%;
            font-size: 12px;
        }

        .form-structor .signup .form-holder .input:last-child {
            border-bottom: 0;
        }

        .form-structor .signup .form-holder .input::-webkit-input-placeholder {
            color: rgba(0, 0, 0, 0.4);
        }

        .form-structor .signup .submit-btn {
            background-color: rgba(0, 0, 0, 0.4);
            color: rgba(256, 256, 256, 0.7);
            border: 0;
            border-radius: 15px;
            display: block;
            margin: 15px auto;
            padding: 15px 45px;
            width: 100%;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all .3s ease;
        }

        .form-structor .signup .submit-btn:hover {
            transition: all .3s ease;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .form-structor .login {
            position: absolute;
            top: 20%;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            z-index: 5;
            -webkit-transition: all .3s ease;
        }

        .form-structor .login::before {
            content: '';
            position: absolute;
            left: 50%;
            top: -20px;
            -webkit-transform: translate(-50%, 0);
            background-color: #fff;
            width: 200%;
            height: 250px;
            border-radius: 50%;
            z-index: 4;
            -webkit-transition: all .3s ease;
        }

        .form-structor .login .center {
            position: absolute;
            top: calc(50% - 10%);
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            width: 65%;
            z-index: 5;
            -webkit-transition: all .3s ease;
        }

        .form-structor .login .center .form-title {
            color: #000;
            font-size: 1.7em;
            text-align: center;
        }

        .form-structor .login .center .form-title span {
            color: rgba(0, 0, 0, 0.4);
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all .3s ease;
        }

        .form-structor .login .center .form-holder {
            border-radius: 15px;
            background-color: #fff;
            border: 1px solid #eee;
            overflow: hidden;
            margin-top: 50px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all .3s ease;
        }

        .form-structor .login .center .form-holder .input {
            border: 0;
            outline: none;
            box-shadow: none;
            display: block;
            height: 30px;
            line-height: 30px;
            padding: 8px 15px;
            border-bottom: 1px solid #eee;
            width: 100%;
            font-size: 12px;
        }

        .form-structor .login .center .form-holder .input:last-child {
            border-bottom: 0;
        }

        .form-structor .login .center .form-holder .input::-webkit-input-placeholder {
            color: rgba(0, 0, 0, 0.4);
        }

        .form-structor .login .center .submit-btn {
            background-color: #6B92A4;
            color: rgba(256, 256, 256, 0.7);
            border: 0;
            border-radius: 15px;
            display: block;
            margin: 15px auto;
            padding: 15px 45px;
            width: 100%;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all .3s ease;
        }

        .form-structor .login .center .submit-btn:hover {
            transition: all .3s ease;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .form-structor .login.slide-up {
            top: 90%;
            -webkit-transition: all .3s ease;
        }

        .form-structor .login.slide-up .center {
            top: 10%;
            -webkit-transform: translate(-50%, 0);
            -webkit-transition: all .3s ease;
        }

        .form-structor .login.slide-up .form-holder,
        .form-structor .login.slide-up .submit-btn {
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all .3s ease;
        }

        .form-structor .login.slide-up .form-title {
            font-size: 1em;
            margin: 0;
            padding: 0;
            cursor: pointer;
            -webkit-transition: all .3s ease;
        }

        .form-structor .login.slide-up .form-title span {
            margin-right: 5px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all .3s ease;
        }

        /* CSS cho nút "Quên mật khẩu" */
        .form-structor .login .center .submit-btn[name="quenmatkhau"] {
            background-color: transparent;
            /* Xóa màu nền */
            color: #6B92A4;
            /* Màu chữ cho nút */
            border: 0;
            border-radius: 0;
            /* Xóa viền bo góc */
            display: inline-block;
            /* Hiển thị như nút một dòng */
            margin: 10px auto;
            /* Duy trì khoảng cách từ trên xuống */
            padding: 0;
            /* Loại bỏ lề và đệm */
            font-size: 12px;
            /* Điều chỉnh kích thước chữ */
            font-weight: normal;
            /* Điều chỉnh độ đậm */
            cursor: pointer;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all 0.3s ease;
        }

        /* CSS cho nút "Quên mật khẩu" khi di chuột qua */
        .form-structor .login .center .submit-btn[name="quenmatkhau"]:hover {
            transition: all 0.3s ease;
            background-color: transparent;
            /* Màu nền khi di chuột qua */
            color: #6B92A4;
            /* Màu chữ khi di chuột qua */
        }
    </style>
</head>

<body>
    <div class="background-container">
        <div class="tbldangky">

        </div>


        <div class="form-structor">
            <form class="tbldangky" action="" method="POST" onsubmit="return validateForm();">
                <div class="signup">
                    <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
                    <div class="form-holder">
                        <input type="text" name="hovaten" class="input" placeholder="Name" required/>
                        <input type="email" name="email" class="input" placeholder="Email" required/>
                        <input type="text" name="dienthoai" class="input" placeholder="Phone Number" required/>
                        <input type="text" name="diachi" class="input" placeholder="Address" required/>
                        <input type="text" name="matkhau" class="input" placeholder="Password" required/>
                    </div>
                    <button class="submit-btn" name="dangky">Sign up</button>
                </div>
            </form>
            <form class="tbldangnhap" action="" method="POST" >
                <div class="login slide-up">
                    <div class="center">
                        <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                        <div class="form-holder">
                            <input type="email" name="emaillogin" class="input" placeholder="Email" />
                            <input type="password" class="input" name="password" placeholder="Password" />
                        </div>
                       
                        <button class="submit-btn" name="quenmatkhau" > Forgot password</button>
                        <button class="submit-btn" name="dangnhap" onclick="return validateFormLogin();">Log in</button>

                    </div>
                </div>
            </form>

        </div>

    </div>
    <script>
        const loginBtn = document.getElementById('login');
        const signupBtn = document.getElementById('signup');
        const loginForm = document.querySelector('.login');
        const signupForm = document.querySelector('.signup');

        loginBtn.addEventListener('click', () => {
            loginForm.classList.remove('slide-up');
            signupForm.classList.add('slide-up');
        });

        signupBtn.addEventListener('click', () => {
            loginForm.classList.add('slide-up');
            signupForm.classList.remove('slide-up');
        });

        function validateForm() {
            // Get the values of the input fields
            var name = document.getElementsByName("hovaten")[0].value;
            var email = document.getElementsByName("email")[0].value;
            var dienthoai = document.getElementsByName("dienthoai")[0].value;
            var diachi = document.getElementsByName("diachi")[0].value;
            var matkhau = document.getElementsByName("matkhau")[0].value;

            if (name === '' || email === '' || dienthoai === '' || diachi === '' || matkhau === '') {
                alert('Please fill in all fields.');
                return false;
            }
        }

        function validateFormLogin() {
            // Get the values of the input fields

            var email = document.getElementsByName("emaillogin")[0].value;

            var matkhau = document.getElementsByName("password")[0].value;
            var quenmk = document.getElementsByName("quenmatkhau")[0].value;

            if (email === '' || matkhau === '') {
                alert('Please fill in all .');
                return false;
            }
        }

     
    </script>
</body>

</html>