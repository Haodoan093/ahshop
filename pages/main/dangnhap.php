
<?php
   
    
    if (isset($_POST['dangnhap'])){
        $email=$_POST['email'];
        $matkhau=md5($_POST['password']); //ma khoa mat khau thanh md5
        $sql="SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' Limit 1";
        $row=mysqli_query($mysqli,$sql);// bien ket noi co so du lieu
        $count= mysqli_num_rows($row);

        if ($count>0){
            $row_date=mysqli_fetch_array($row);
            $_SESSION['dangky']=$row_date['tenkhachhang'];
            header("Location:index.php?quanly=giohang");
        }else{
           echo '<p style="color:red">Tai khoan hoac mat khau khong dung,
            Vui long kiem tra lai !!!</p>';
            
        
        }
    }

?>
<style>
/* CSS cho trang đăng nhập */
form.formdangnhap{
    padding-left: 150px;
}
.login-container {
    width: 90%;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #3498db; /* Màu nền */
    border: 2px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: box-shadow 0.3s ease; /* Animation cho đổ bóng */
}

.login-container:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.4); /* Đổ bóng tăng khi hover */
}

.login-container h3 {
    margin: 0;
    padding: 10px 0;
    background-color: #2F4F4F;
    color: white;
    text-align: center;
    border-radius: 10px 10px 0 0;
}

.login-table {
    width: 80%;
    text-align: left;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
  
    background-color: #fff; /* Màu nền cho bảng */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Hiệu ứng khi di chuột vào bảng */
    margin-left: 20px; /* Di chuyển sang phải 20px */
}

.login-table:hover {
    transform: translateX(10px); /* Di chuyển sang phải 10px khi hover */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Đổ bóng khi hover */
}

.login-table td {
    padding: 10px;
}

.login-table input[type="text"],
.login-table input[type="password"] {
    width: 90%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 10px;
    outline: none;
    background-color: #f5f5f5; /* Màu nền cho ô input */
    transition: background-color 0.3s ease; /* Hiệu ứng khi di chuột vào ô input */
}

.login-table input[type="text"]:hover,
.login-table input[type="password"]:hover {
    background-color: #e0e0e0; /* Màu nền khi hover ô input */
}

.login-table input[type="submit"] {
    background-color: #FF5733;
    color: white;
    border: none;
    padding: 12px 24px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.login-table input[type="submit"]:hover {
    background-color: #FF4500;
    transform: scale(1.05);
    transition: background-color 0.3s ease, transform 0.3s ease;
}

</style>




<form class="formdangnhap"  action="" autcomplete="off" method="POST">

<table border="1" class="login-table" style="text-align:center;">
    <tr>
    
        <td colspan="2"><h3>Đăng nhập </h3></td>
        
        </tr>
        <tr>
        <td>Tài khoản</td>
        <td><input type="text" name="email" placeholder="Email..."></td>
        
        </tr>
        <tr>
            <td>Mật khẩu</td> 
            <td><input type="password" name="password" placeholder="Password..."></td>
        </tr>
        <tr>
        
            <td colspan=2;><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>

    </table>
</form>

