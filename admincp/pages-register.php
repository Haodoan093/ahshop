<!DOCTYPE html>
<html lang="en">
<?php

include('config/config.php');
if (isset($_POST['dangky'])) {
    $tenadmin = $_POST['tenadmin'];
    $email = $_POST['email'];

    $dienthoai = $_POST['dienthoai'];
    $username = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $status=2;

    // Kiểm tra xem email hoặc số điện thoại đã tồn tại trong cơ sở dữ liệu
    $check_query = mysqli_query($mysqli, "SELECT * FROM tbl_admin WHERE email = '" . $email . "' OR sodienthoai = '" . $dienthoai . "' OR username = '" . $username . "' ");
    if (mysqli_num_rows($check_query) > 0) {
      header('Location:pages-register.php?message=Thông tin đã tồn tại !');
    } else {
        if (isset($_POST['email']) && !empty($_POST['email'])) {

            // Nếu không có dòng nào trùng, thực hiện câu lệnh INSERT
            $sql_dangky = mysqli_prepare($mysqli, "INSERT INTO tbl_admin (hoten, email, sodienthoai, username, password, admin_status) VALUES (?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($sql_dangky, "ssssss", $tenadmin, $email, $dienthoai, $username, $matkhau, $status);
            

            if (mysqli_stmt_execute($sql_dangky)) {
                echo '<p style="color: green; font-size: 20px;">Bạn đã đăng ký thành công</p>';

                $_SESSION['id_admin'] = mysqli_insert_id($mysqli);
  

                header('Location:login.php?message=Đăng ký thành công !');
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
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Đăng ký</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php
  if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('$message');</script>";
  }
  ?>
<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Admin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Tạo tài khoản</h5>
                    <p class="text-center small">Nhập chi tiết cá nhân của bạn để tạo tài khoản</p>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Họ và tên</label>
                      <input type="text" name="tenadmin" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Số điện thoại</label>
                      <input type="text" name="dienthoai" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your phone number!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Tên đăng nhập</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mật khẩu</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

              
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="dangky" type="submit">Tạo tài khoản</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Bạn đã có tài khoản ? <a href="login.php">Đăng nhập</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>