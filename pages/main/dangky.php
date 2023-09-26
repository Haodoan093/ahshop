<?php
if(isset($_POST['dangky'])){
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = md5($_POST['matkhau']);

    // Kiểm tra xem email hoặc số điện thoại đã tồn tại trong cơ sở dữ liệu
    $check_query = mysqli_query($mysqli, "SELECT * FROM tbl_dangky WHERE email = '".$email."' OR dienthoai = '".$dienthoai."'");
    if (mysqli_num_rows($check_query) > 0) {
        echo '<p style="color: red; font-size: 20px;">Email hoặc số điện thoại đã tồn tại. Vui lòng chọn thông tin khác.</p>';
    } else {
        // Nếu không có dòng nào trùng, thực hiện câu lệnh INSERT
        $sql_dangky = mysqli_prepare($mysqli, "INSERT INTO tbl_dangky (tenkhachhang, email, dienthoai, diachi, matkhau) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($sql_dangky, "sssss", $tenkhachhang, $email, $dienthoai, $diachi, $matkhau);
        
        if (mysqli_stmt_execute($sql_dangky)) {
            echo '<p style="color: green; font-size: 20px;">Bạn đã đăng ký thành công</p>';
            
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['email'] = $email;
            
            header('Location:index.php?quanly=giohang');
        } else {
            echo '<p style="color: red; font-size: 20px;">Có lỗi xảy ra khi đăng ký. Vui lòng thử lại sau.</p>';
        }
        
        mysqli_stmt_close($sql_dangky);
    }
}
?>

<p>Đăng ký</p>

<style>
            /* CSS cho trang đăng ký */
            body {
                background-color: #f2f2f2; /* Màu nền cho trang */
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            p {
                font-size: 24px;
                text-align: center;
                margin-top: 20px;
                color: #333;
            }

        

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                font-size: 16px;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #ddd;
            }

            input[type="text"] {
                width: 90%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                font-size: 14px;
                margin-bottom: 10px;
            }

            input[type="submit"] {
                background-color: #d67d05; /* Màu cam đất */
                color: #fff;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                font-size: 16px;
                border-radius: 3px;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }

            input[type="submit"]:hover {
                background-color: #c46100; /* Màu cam đậm khi di chuột qua */
                transform: scale(1.05);
            }
            /* CSS cho nút "Đăng nhập" */
            .login-link {
                text-align: center;
                font-size: 16px;
                background-color: #528B8B;
                padding: 10px 20px;
                border-radius: 3px;
                display: inline-block;
                margin: 10px;
                transition: background-color 0.3s ease, transform 0.3s ease, color 0.3s ease; /* Thêm transition cho màu nền và màu chữ */
            }

            .login-link a {
                color: white;
                text-decoration: none;
            }

           
            .login-link:hover {
                background-color: #000; /* Màu nền thay đổi khi di chuột qua */
                transform: scale(1.05); /* Phóng to nút khi di chuột qua */
                color: #fff; /* Màu chữ thay đổi khi di chuột qua */
                transition: background-color 0.3s ease, transform 0.3s ease, color 0.3s ease; /* Thêm transition cho màu nền và màu chữ */
            }

            /* Thêm animation cho form khi di chuột vào */
            form.tbldangky {
                /* ... (Mã CSS hiện tại của bạn) */
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                max-width: 500px;
                margin: 0 auto;
                background-color: #fff; /* Màu nền cho form */
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng form */
            }

            form.tbldangky:hover {
                transform: scale(1.02); /* Phóng to form khi di chuột vào */
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Đổ bóng form khi di chuột vào */
            }

</style>

<form class="tbldangky" action="" method="POST">

            <table border="1" style="border-collapse:collapse">

                    <tr>
                        <td>Họ và tên</td>
                        <td  colspan="2"><input type="text" name="hovaten"></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td colspan="2"> <input type="text" name="email"></td>
                    </tr>

                    <tr>
                        <td>Điện thoại</td>
                        <td  colspan="2"><input type="text" name="dienthoai"></td>
                    </tr>

                    <tr>
                        <td>Địa chỉ</td>
                        <td  colspan="2"><input type="text" name="diachi"></td>
                    </tr>

                    <tr>
                        <td>Mật khẩu</td>
                        <td  colspan="2"><input type="text" name="matkhau"></td>
                    </tr>

                    <tr>
                    
                        <td  class="login-link"><a href="index.php?quanly=dangnhap">Đăng nhập</a></td>
                        <td colspan="2" style="text-align:center;"><input type="submit" name="dangky" value="Đăng ký"></td>

                    </tr>

            </table>
</form>
