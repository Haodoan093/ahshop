<h3></h3>
<?php
session_start();
require('../../mail/send/sendmail.php');

include('../../admincp/config/config.php');
if (isset($_POST['guima'])) {
  $code_xn = rand(0, 999999);
  $taikhoan = $_POST['email'];

  $sql = "SELECT * FROM tbl_dangky WHERE email='" . $taikhoan . "' LIMIT 1";
  $row = mysqli_query($mysqli, $sql);
  $count = mysqli_num_rows($row);

  if ($count > 0) {
    $_SESSION['email'] = $taikhoan;
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
    header('Location:../../index.php?quanly=matkhaumoi');
    ob_end_flush();
  } else {
    echo '<p class="error-message">Tài khoản không tồn tại. Vui lòng kiểm tra lại.</p>';
  }
}
?>
<style>
  @import url('https://rsms.me/inter/inter-ui.css');

  ::selection {
    background: #2D2F36;
  }

  ::-webkit-selection {
    background: #2D2F36;
  }

  ::-moz-selection {
    background: #2D2F36;
  }

  body {
    background-image: url('https://images.pexels.com/photos/92906/pexels-photo-92906.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center top;
    /* Điều chỉnh vị trí theo nhu cầu */
  }



  .page {
    background-image: url('https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    /* Điều chỉnh vị trí theo nhu cầu */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    /* Sử dụng chiều cao 40% của viewport */

  }

  /* ... (các phần còn lại của CSS) */

  @media (max-width: 767px) {
    .page {
      height: auto;
      margin-bottom: 20px;
      padding-bottom: 20px;
    }
  }

  .container {
    display: flex;
    height: 320px;
    margin: 0 auto;
    width: 640px;
  }

  @media (max-width: 767px) {
    .container {
      flex-direction: column;
      height: 630px;
      width: 320px;
    }
  }

  .left {
    background: white;
    height: calc(100% - 40px);
    top: 20px;
    position: relative;
    width: 50%;
  }

  @media (max-width: 767px) {
    .left {
      height: 100%;
      left: 20px;
      width: calc(100% - 40px);
      max-height: 270px;
    }
  }

  .login {
    font-size: 50px;
    font-weight: 900;
    margin: 50px 40px 40px;
  }

  .eula {
    color: #999;
    font-size: 14px;
    line-height: 1.5;
    margin: 40px;
  }

  .right {
    background: #474A59;
    box-shadow: 0px 0px 40px 16px rgba(0, 0, 0, 0.22);
    color: #F1F1F2;
    position: relative;
    width: 50%;
  }

  @media (max-width: 767px) {
    .right {
      flex-shrink: 0;
      height: 100%;
      width: 100%;
      max-height: 350px;
    }
  }

  svg {
    position: absolute;
    width: 320px;
  }

  path {
    fill: none;
    stroke: url(#linearGradient);
    ;
    stroke-width: 4;
    stroke-dasharray: 240 1386;
  }

  .form {
    margin: 40px;
    position: absolute;
  }

  label {
    color: #c2c2c5;
    display: block;
    font-size: 14px;
    height: 16px;
    margin-top: 20px;
    margin-bottom: 5px;
  }

  input {
    background: transparent;
    border: 0;
    color: #f2f2f2;
    font-size: 20px;
    height: 30px;
    line-height: 30px;
    outline: none !important;
    width: 100%;
  }

  input::-moz-focus-inner {
    border: 0;
  }

  #submit {
    color: #707075;
    margin-top: 40px;
    transition: color 300ms;
  }

  #submit:focus {
    color: #f2f2f2;
  }

  #submit:active {
    color: #d0d0d2;
  }
</style>
<form class="tbldoimatkhau" action="" autocomplete="off" method="POST">


  <div class="page">
    <div class="container">
      <div class="left">
        <div class="login">Forgot password</div>
        <div class="eula">Hãy kiểm tra email sau khi gửi mã</div>
      </div>
      <div class="right">
        <svg viewBox="0 0 320 300">
          <defs>
            <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992" x2="307" y2="193.49992" gradientUnits="userSpaceOnUse">
              <stop style="stop-color:#ff00ff;" offset="0" id="stop876" />
              <stop style="stop-color:#ff0000;" offset="1" id="stop878" />
            </linearGradient>
          </defs>
          <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
        </svg>
        <div class="form">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required>
          <input type="submit" name="guima" id="submit" value="Gửi mã xác nhận">
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  var current = null;
  document.querySelector('#email').addEventListener('focus', function(e) {
    if (current) current.pause();
    current = anime({
      targets: 'path',
      strokeDashoffset: {
        value: 0,
        duration: 700,
        easing: 'easeOutQuart'
      },
      strokeDasharray: {
        value: '240 1386',
        duration: 700,
        easing: 'easeOutQuart'
      }
    });
  });
  document.querySelector('#password').addEventListener('focus', function(e) {
    if (current) current.pause();
    current = anime({
      targets: 'path',
      strokeDashoffset: {
        value: -336,
        duration: 700,
        easing: 'easeOutQuart'
      },
      strokeDasharray: {
        value: '240 1386',
        duration: 700,
        easing: 'easeOutQuart'
      }
    });
  });
  document.querySelector('#submit').addEventListener('focus', function(e) {
    if (current) current.pause();
    current = anime({
      targets: 'path',
      strokeDashoffset: {
        value: -730,
        duration: 700,
        easing: 'easeOutQuart'
      },
      strokeDasharray: {
        value: '530 1386',
        duration: 700,
        easing: 'easeOutQuart'
      }
    });
  });
</script>