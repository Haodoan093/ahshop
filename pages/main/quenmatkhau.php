<h3></h3>
<?php

if (isset($_POST['guima'])) {
    $code_xn = rand(0, 999999);
    $taikhoan = $_POST['email'];
   
    $sql = "SELECT * FROM tbl_dangky WHERE email='" . $taikhoan . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);

    if ($count > 0) {
        $_SESSION['email']=$taikhoan;
        $tieude = "AHSHOP MÃ XÁC NHẬN !";

        $noidung = "
            <style>
              .guimail {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
              }
              p {
                margin: 0;
              }
            </style>
              <div class='guimail'>
                
                <p>Mã xác nhận của bạn là : $code_xn</p>
              
              </div>
            ";
        $maildathang = $_POST['email'];
        // Tạo một đối tượng từ lớp GuiGmail và gọi phương thức đatHang() để gửi email
        $guiEmail = new GuiGmail();
        $guiEmail->DatHang($tieude, $noidung, $maildathang);
        $_SESSION['xacnhan'] = $code_xn;
        header('Location:index.php?quanly=matkhaumoi');
        ob_end_flush();
    } else {
        echo '<p class="error-message">Tài khoản không tồn tại. Vui lòng kiểm tra lại.</p>';
    }
}
?>
<style>
    /* Định dạng cho phần nội dung "Đổi Mật Khẩu" */
    h3 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
        /* Màu chữ cho tiêu đề */
    }

    .error-message {
        color: red;
        font-weight: bold;
    }

    /* Form đổi mật khẩu */
    form.tbldoimatkhau {
        max-width: 400px;
        margin: 0 auto;

        background-color: #f8f8f8;
        /* Màu nền cho form */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Đổ bóng form */
    }

    .table-doimatkhau {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table-doimatkhau td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .table-doimatkhau td:first-child {
        width: 40%;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #d67d05;
        /* Màu cam đất */
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
        /* Hiệu ứng chuyển đổi màu nền và đổ bóng */
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Đổ bóng nút */
    }

    input[type="submit"]:hover {
        background-color: #c46100;
        /* Màu cam đậm khi di chuột qua */
        transform: scale(1.05);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        /* Đổ bóng đậm khi di chuột qua */
    }
</style>
<form class="tbldoimatkhau" action="" autocomplete="off" method="POST">
    <table class="table-doimatkhau">
        <tr>
            <td colspan="2">
                <h3>Quên mật khẩu</h3>
            </td>
        </tr>
        <tr>
            <td>Tài khoản:</td>
            <td><input type="text" name="email" placeholder="Email..."></td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" name="guima" value="Gửi mã xác nhận">
            </td>
        </tr>
    </table>
</form>