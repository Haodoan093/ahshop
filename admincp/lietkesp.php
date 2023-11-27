<!DOCTYPE html>
<html lang="en">
<?php include('config/config.php'); ?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Quản lý sản phẩm</title>
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
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Biểu mẫu</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
            <a href="thembv.php">
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
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
     
          <li>
            <a href="lietkesp.php" class="active">
              <i class="bi bi-circle"></i><span>Sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="lietkedm.php"  >
              <i class="bi bi-circle"></i><span>Danh mục sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="lietkebv.php " >
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
            <a href="lietkekh.php" >
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
          <i class="bi bi-bar-chart"></i><span>Biểu đồ</span><i class="bi bi-chevron-down ms-auto"></i>
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

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Bảng Sản Phẩm</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
          <li class="breadcrumb-item">Quản lý</li>
          <li class="breadcrumb-item active">Sản phẩm</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sản Phẩm</h5>
              <?php
              $sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham ASC";
              $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
              ?>
              <!-- Table with stripped rows -->
              <table class="table datatable ">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Mã</th>

                    <th scope="col">Tên</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Sales</th>
                    <th scope="col">Đã bán</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Trạng thái</th>
             
          
                 
                    <th scope="col">Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  while ($row = mysqli_fetch_array($query_lietke_sp)) {
                    $i++;
                  ?>
                    <tr>
                      <th scope="row"><?php echo $i ?></th>
                      <td><?php echo $row['masp']; ?></td>
                      <td><?php echo $row['tensanpham']; ?></td>
                      <td><img src="modules\quanlysp\uploads\<?php echo $row['hinhanh'] ?>" width="100px"></td>
                      <td><?php echo $row['soluong'] ?></td>
                      <td><?php echo $row['giasp']; ?></td>
                      <td><?php echo $row['tendanhmuc']; ?></td>
                      <td><?php echo $row['giamgia'] . '%' ?></td>
              <td><?php echo $row['daban']; ?></td>
              <td><?php echo $row['loaihang'] == 1 ? "Mới" : "Giảm giá"; ?></td>
              <td><?php echo $row['tinhtrang'] == 1 ? "Kích hoạt" : "Ẩn"; ?></td>
             
                      <td>
                        <a class="edit-button" href="suasp.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
                        <a class="delete-button" href="modules\quanlysp\xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a>
                      </td>
                    </tr>
                  <?php

                  }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>DCHao093</span></strong>. All Rights Reserved
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

</body>

</html>