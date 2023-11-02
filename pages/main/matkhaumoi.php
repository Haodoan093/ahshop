<?php
include('../../admincp/config/config.php');
require('../../mail/send/sendmail.php');
session_start();
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
    header('Location:../../index.php?quanly=dangky');
    ob_end_flush();
  }
}

if (isset($_POST['guilaima'])) {

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
  header('Location:../../index.php?quanly=matkhaumoi');
  ob_end_flush();
}
?>

<style>
  @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400');

  body {
    background-image: url('https://images.pexels.com/photos/3183132/pexels-photo-3183132.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
    background-size: 100%;
    background-position: center;
    /* Các thuộc tính khác cho body */
  }

  body,
  html {
    font-family: 'Source Sans Pro', sans-serif;
    background-color: #1d243d;
    padding: 0;
    margin: 0;
  }

  #particles-js {
    position: absolute;
    width: 100%;
    height: 100%;
  }

  .container {
    margin: 0;
    top: 50px;
    left: 50%;
    position: absolute;
    text-align: center;
    transform: translateX(-50%);
    background-color: rgb(33, 41, 66);
    border-radius: 9px;
    border-top: 10px solid #79a6fe;
    border-bottom: 10px solid #8BD17C;
    width: 400px;
    height: 500px;
    box-shadow: 1px 1px 108.8px 19.2px rgb(25, 31, 53);
    background-image: url('https://images.pexels.com/photos/775203/pexels-photo-775203.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
    background-size: cover;
    /* Đảm bảo hình nền trải dài khắp phần tử */
    background-position: center;
    /* Căn chỉnh hình ảnh vào giữa */


  }

  .box h4 {
    font-family: 'Source Sans Pro', sans-serif;
    color: #5c6bc0;
    font-size: 24px;
    margin-top: 94px;
    ;
  }

  .box h4 span {
    font-size: 24px;
    color: #dfdeee;
    font-weight: lighter;
  }

  .box h5 {
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 13px;
    color: #fff;
    letter-spacing: 1.5px;
    margin-top: -15px;
    margin-bottom: 70px;
  }

  .box input[type="text"],
  .box input[type="password"] {
    display: block;
    margin: 20px auto;

    border: 0;
    border-radius: 5px;
    padding: 14px 10px;
    width: 320px;
    outline: none;

    -webkit-transition: all .2s ease-out;
    -moz-transition: all .2s ease-out;
    -ms-transition: all .2s ease-out;
    -o-transition: all .2s ease-out;
    transition: all .2s ease-out;

  }

  ::-webkit-input-placeholder {
    color: #565f79;
  }

  .box input[type="text"]:focus,
  .box input[type="password"]:focus {
    border: 1px solid #79A6FE;

  }

  a {
    color: #5c7fda;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }

  label input[type="checkbox"] {
    display: none;
    /* hide the default checkbox */
  }

  /* style the artificial checkbox */
  label span {
    height: 13px;
    width: 13px;
    border: 2px solid #464d64;
    border-radius: 2px;
    display: inline-block;
    position: relative;
    cursor: pointer;
    float: left;
    left: 7.5%;
  }

  .btn1 {
    border: 0;
    background: #483c71;
    color: #dfdeee;
    border-radius: 100px;
    width: 340px;
    height: 49px;
    font-size: 16px;
    position: absolute;
    top: 79%;
    left: 8%;
    transition: 0.3s;
    cursor: pointer;
  }

  .btn1:hover {
    background: #5d33e6;
  }

  .rmb {
    position: absolute;
    margin-left: -24%;
    margin-top: 0px;
    color: #dfdeee;
    font-size: 13px;
  }

  .forgetpass {
    position: relative;
    float: right;
    right: 28px;
  }

  .dnthave {
    position: absolute;
    top: 92%;
    left: 24%;
  }

  [type=checkbox]:checked+span:before {
    /* <-- style its checked state */
    font-family: FontAwesome;
    font-size: 16px;
    content: "\f00c";
    position: absolute;
    top: -4px;
    color: #896cec;
    left: -1px;
    width: 13px;
  }

  .typcn {
    position: absolute;
    left: 339px;
    top: 282px;
    color: #3b476b;
    font-size: 22px;
    cursor: pointer;
  }

  .typcn.active {
    color: #7f60eb;
  }

  .error {
    background: #ff3333;
    text-align: center;
    width: 337px;
    height: 20px;
    padding: 2px;
    border: 0;
    border-radius: 5px;
    margin: 10px auto 10px;
    position: absolute;
    top: 31%;
    left: 7.2%;
    color: white;
    display: none;
  }

  .footer {
    position: relative;
    left: 0;
    bottom: 0;
    top: 605px;
    width: 100%;
    color: #78797d;
    font-size: 14px;
    text-align: center;
  }

  .footer .fa {
    color: #7f5feb;
    ;
  }

  input[type="submit"][name="guilaima"] {
    font-size: 12px;
    /* Điều chỉnh kích thước font thành chữ nhỏ */
    position: absolute;
    /* Đặt vị trí tuyệt đối */
    top: 10px;
    /* Cách trên 10px */
    right: 10px;
    /* Cách phải 10px */
  }
</style>

<p style="color: green;">Mã xác nhận đã được gửi về Gmail của bạn !!!</p>

<body id="particles-js"></body>
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" autocomplete="off" method="POST" onsubmit="return validateFormdmBV()">
      <h4>New<span> Password</span></h4>
      <h5>Điền mã xác nhận đã được gửi về email</h5>

      <input type="text" name="xacnhan" placeholder="Mã xác nhận" autocomplete="off">
      <i class="typcn typcn-eye" id="eye"></i>
      <input type="password" name="password_moi" placeholder="New passsword" id="pwd" autocomplete="off">



      <input type="submit" name="doimatkhau" value="Đặt mật khẩu" class="btn1">
      <input type="submit" name="guilaima" value="Gửi lại mã">
    </form>

  </div>
  <div class="footer">
    <span>Made with <i class="fa fa-heart pulse"></i> <a href="https://www.google.de/maps/place/Augsburger+Puppenkiste/@48.360357,10.903245,17z/data=!3m1!4b1!4m2!3m1!1s0x479e98006610a511:0x73ac6b9f80c4048f"><a href="https://codepen.io/lordgamer2354">By Hao Doan</a></span>
  </div>
</div>
<script>
        function validateFormdm() {
            var tendm = document.forms["form1"]["xacnhan"].value;
            var thutu = document.forms["form1"]["password_moi"].value;
            
            if (tendm === "" ||  thutu === "" ) {
                alert("Vui lòng nhập đầy đủ thông tin");
                return false;
            }
         
           
        }
    </script>
