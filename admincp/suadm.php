<!DOCTYPE html>
<html lang="en">
<?php
include('config/config.php'); ?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sửa danh mục</title>
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

<body>

<?php
     
          include("header.php");
          ?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Thống kê</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Biểu mẫu</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

          <li>
            <a href="themsp.php">
              <i class="bi bi-circle"></i><span>Thêm sản phẩm</span>
            </a>
          </li>

          <!-- bai viet -->
          <li>
            <a href="themdm.php">
              <i class="bi bi-circle"></i><span>Thêm danh mục</span>
            </a>
          </li>

          <!-- Danh muc bai viet -->
          <li>
            <a href="thembv.php" >
              <i class="bi bi-circle"></i><span>Thêm bài viết</span>
            </a>
          </li>

          <!-- Danh muc san pham -->
          <li>
            <a href="themdmbv.php">
              <i class="bi bi-circle"></i><span>Thêm danh mục bài viết</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         
          <li>
            <a href="lietkesp.php">
              <i class="bi bi-circle"></i><span>Sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="lietkedm.php">
              <i class="bi bi-circle"></i><span>Danh mục sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="lietkebv.php ">
              <i class="bi bi-circle"></i><span>Bài viết</span>
            </a>
          </li>
          <li>
            <a href="lietkedmbv.php">
              <i class="bi bi-circle"></i><span>Danh mục bải viết</span>
            </a>
          </li>
          <?php
          if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
          ?>
            <li>
              <a href="lietkenv.php">
                <i class="bi bi-circle"></i><span>Nhân viên</span>
              </a>
            </li>
          <?php } ?>
          <li>
            <a href="lietkekh.php">
              <i class="bi bi-circle"></i><span>Khách hàng</span>
            </a>
          </li>
          <li>
            <a href="lietkedh.php">
              <i class="bi bi-circle"></i><span>Đơn hàng</span>
            </a>
          </li>
          <li>
            <a href="quanly.php">
              <i class="bi bi-circle"></i><span>Quản lý web</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Biều đồ</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.php">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.php">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.php">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Cá nhân</span>
        </a>
      </li><!-- End Profile Page Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Liên hệ</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.php">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->
  <?php
  if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('$message');</script>";
  }
  ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sửa danh mục</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
          <li class="breadcrumb-item">Quản lý</li>
          <li class="breadcrumb-item active">Sửa danh mục</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sửa danh mục</h5>
              <?php
      $sql_sua_danhmucsp= "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
      $query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
  ?>

<?php
          while($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
        ?>
                <!-- General Form Elements -->
                <form method="POST"  name="formdm" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>"onsubmit="return validateFormdmBV()">
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Tên bài viết</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $dong['tendanhmuc'] ?>"  name="tendanhmuc" class="form-control" required>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <button type="suabaiviet" name="suadanhmuc" class="btn btn-primary">Sửa</button>
                    </div>
                  </div>

                </form><!-- End General Form Elements -->
              <?php
              }
              ?>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Hao</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-php-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

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
 
 <script>
        function validateFormdm() {
            var tendm = document.forms["formdm"]["tendanhmuc"].value;
            var thutu = document.forms["formdm"]["thutu"].value;
            
            if (tendm === "" ||  thutu === "" ) {
                alert("Vui lòng nhập đầy đủ thông tin");
                return false;
            }
         
           
        }
    </script>

</body>

</html>