<?php


echo $_SESSION['xacnhan'];
echo $_SESSION['email'];
if (isset($_POST['doimatkhau'])) {
  

    $taikhoan = $_SESSION['email'];
    $matkhau_moi =  md5($_POST['password_moi']);
    $xacnhan = $_POST['xacnhan'];

    if ($xacnhan != $_SESSION['xacnhan']) {
        echo '<p class="error-message">Mã xác nhận không đúng.</p>';
    } else {
        $sql_update = mysqli_query($mysqli, "UPDATE tbl_dangky SET matkhau='" . $matkhau_moi . "' WHERE email='" . $taikhoan . "'");
        echo '<p class="success-message">Mật khẩu đã được thay đổi thành công.</p>';
        unset($_SESSION['xacnhan']);
    }
}

if (isset($_POST['guilaima'])) {
    include('config.php');

    $code_xn = rand(100000, 999999);
   
    $tieude = "AHSHOP MÃ XÁC NHẬN!";
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
            <p>Mã xác nhận của bạn là: $code_xn</p>
        </div>
    ";
    $maildathang = $_SESSION['email'];

    $guiEmail = new GuiGmail();
    $guiEmail->DatHang($tieude, $noidung, $maildathang);
    $_SESSION['xacnhan'] = $code_xn;
    header('Location:index.php?quanly=matkhaumoi');
    ob_end_flush();
}
?>

<style>
    /* Định dạng cho phần nội dung "Đổi Mật Khẩu" */
    h3 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333; /* Màu chữ cho tiêu đề */
    }

    .error-message {
        color: red;
        font-weight: bold;
    }

    .success-message {
        color: green;
        font-weight: bold;
    }

    /* Form đổi mật khẩu */
    form.tbldoimatkhau {
        max-width: 400px;
        margin: 0 auto;
        background-color: #f8f8f8; /* Màu nền cho form */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng form */
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

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #d67d05; /* Màu cam đất */
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease; /* Hiệu ứng chuyển đổi màu nền và đổ bóng */
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Đổ bóng nút */
    }

    input[type="submit"]:hover {
        background-color: #c46100; /* Màu cam đậm khi di chuột qua */
        transform: scale(1.05);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); /* Đổ bóng đậm khi di chuột qua */
    }
</style>

<p style="color: green;">Mã xác nhận đã được gửi về Gmail của bạn !!!</p>

<form class="tbldoimatkhau" action="" autocomplete="off" method="POST">
    <table class="table-doimatkhau">
        <tr>
            <td colspan="3">
                <h3>Đổi mật khẩu</h3>
            </td>
        </tr>
        <tr>
            <td>Nhập mã xác nhận:</td>
            <td colspan="2"><input type="text" name="xacnhan" placeholder="Xác nhận mật khẩu mới..." required></td>
        </tr>
        <tr>
            <td>Mật khẩu mới:</td>
            <td colspan="2"><input type="password" name="password_moi" placeholder="Mật khẩu mới..." required></td>
        </tr>
        <tr>
            <td colspan="1">
                <input type="submit" name="guilaima" value="Gửi lại mã">
            </td>
            <td colspan="2">
                <input type="submit" name="doimatkhau" value="Đổi mật khẩu">
            </td>
        </tr>
    </table>
</form>
