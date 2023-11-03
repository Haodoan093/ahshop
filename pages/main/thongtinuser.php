<h3>Thông tin cá nhân</h3>
<?php
$sql_sua_tt = "SELECT * FROM tbl_dangky WHERE id_dangky='$_SESSION[id_khachhang]' LIMIT 1";
$query_sua_tt = mysqli_query($mysqli, $sql_sua_tt);

if (isset($_POST['capnhattt'])) {
    $tenkhachhang = $_POST['tensanpham'];
    $dienthoai = $_POST['masp'];
    $email = $_POST['giasp'];
    $diachi = $_POST['soluong'];
    
    $id_khachhang = $_SESSION['id_khachhang']; // Lấy ID khách hàng từ phiên đăng nhập

    $sql_update = "UPDATE tbl_dangky SET tenkhachhang='$tenkhachhang', dienthoai='$dienthoai', email='$email', diachi='$diachi' WHERE id_dangky='$id_khachhang'";
    $query_update = mysqli_query($mysqli, $sql_update);

    if ($query_update) {
        $message = "Cập nhật thông tin cá nhân thành công";
        header("Location: index.php?quanly=thongtincanhan&message=" . urlencode($message));
        $_SESSION['dangky']=$tenkhachhang;
    } else {
        $message = "Lỗi! Không thể cập nhật thông tin cá nhân";
        header("Location: index.php?quanly=thongtincanhan&message=" . urlencode($message));

    }
}

?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f3f3f3;
        margin: 0;
        padding: 0;
    }

    p {
        font-size: 24px;
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }

    table {
        border-collapse: collapse;
        width: 70%;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table td {
        padding: 10px;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    table input[type="text"],
    table input[type="file"],
    table textarea,
    table select {
        width: 100%;
        padding: 8px;
        margin: 4px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    table img {
        max-width: 150px;
        height: auto;
    }

    table .submit-button-container {
        text-align: center;
    }

    table input[type="submit"] {
        background-color: #ff69b4;
        /* Pink color */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    table input[type="submit"]:hover {
        background-color: #ff1493;
        /* Darker pink color on hover */
        transform: scale(1.05);
    }
</style>
<?php
 if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('$message');</script>";
}
?> 
<body>
    <table class="sua_sanpham" border="1" width=50% style="border-collapse: collapse;">
        <?php
        while ($row = mysqli_fetch_array($query_sua_tt)) {
        ?>

            <form name="myForm" method="POST" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
                <!-- khi gui du lieu dung POST,lay GET -->
                <tr>
                    <td>Họ và tên</td>
                    <td><input type="text" value="<?php echo $row['tenkhachhang'] ?>" name="tensanpham" required></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" value="<?php echo $row['dienthoai'] ?>" name="masp"required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" value="<?php echo $row['email'] ?>" name="giasp"required></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" value="<?php echo $row['diachi'] ?>" name="soluong"required></td>
                </tr>
             

       
              
            
                <tr>
                    <!-- nooi hai cot -->
                    <td colspan="2"><input type="submit" name="capnhattt" value="Cập nhật thông tin"></td>
                </tr>
            </form>

        <?php
        }
        ?>


    </table>


    <script>
        function validateForm() {
            var tenkh = document.forms["myForm"]["tenkhachhang"].value;
            var dt = document.forms["myForm"]["dienthoai"].value;
            var email = document.forms["myForm"]["email"].value;
            var diachi = document.forms["myForm"]["diachi"].value;
         
        
            if (tenkh == "" || dt == "" || email == "" || diachi == "" ) {
                alert("Vui lòng nhập đầy đủ tin");
                return false;
            }

        }
    </script>
</body>