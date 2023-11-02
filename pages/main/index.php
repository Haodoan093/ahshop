<?php
if (isset($_GET['trang'])) {
  $page = $_GET['trang'];
} else {
  $page = 1;
}
$_SESSION['trang'] = $page;

$where = "";
if ($page == '' || $page == 1) {
  $begin = 0;
} else {
  $begin = ($page * 16) - 16;
}
if (isset($_GET['sapxep']) && $_GET['sapxep'] == 0) {

  $where = " ORDER BY tbl_sanpham.giasp ASC";
  $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.giasp ASC LIMIT $begin,16";
  $query_pro = mysqli_query($mysqli, $sql_pro);
} else if (isset($_GET['sapxep']) && $_GET['sapxep'] == 1) {

  $where = " ORDER BY tbl_sanpham.giasp DESC";
  $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.giasp DESC LIMIT $begin,16";
  $query_pro = mysqli_query($mysqli, $sql_pro);
} else if (isset($_GET['tinhtrang'])) {
  $where = " WHERE tbl_sanpham.loaihang='$_GET[tinhtrang]' ORDER BY tbl_sanpham.id_sanpham DESC";
  $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.loaihang='$_GET[tinhtrang]' ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,16";
  $query_pro = mysqli_query($mysqli, $sql_pro);
} else {
  $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,16";
  $query_pro = mysqli_query($mysqli, $sql_pro);
}
//loc loai




?>

<style>
  /* Định dạng dòng chia trang */
  /* Định dạng dòng chia trang */
  ul.list_phantrang {
    list-style-type: none;
    margin: 0;
    padding: 9px;
    text-align: center;
    /* Căn giữa theo chiều ngang */
  }

  /* Định dạng mỗi mục trong dòng chia trang */
  ul.list_phantrang li {
    display: inline;
    margin-right: 5px;
    /* Khoảng cách giữa các mục */
  }

  /* Định dạng các liên kết trong mục */
  ul.list_phantrang li a {
    text-decoration: none;
    /* Loại bỏ gạch chân mặc định của liên kết */
    padding: 5px 10px;
    /* Kích thước khoảng trống xung quanh văn bản trong mục */
    border: 1px solid #ccc;
    /* Viền xung quanh mục */
    background-color: #f0f0f0;
    /* Màu nền của mục */
    color: #333;
    /* Màu văn bản */
  }

  /* Định dạng liên kết khi rê chuột qua */
  ul.list_phantrang li a:hover {
    background-color: #333;
    /* Màu nền thay đổi khi rê chuột qua */
    color: #fff;
    /* Màu văn bản thay đổi khi rê chuột qua */
  }

  /* Highlight the selected page */
  ul.list_phantrang li a.selected {
    background-color: #333;
    color: #fff;
  }
</style>
<h3>Sản phẩm mới nhất</h3>
<?php

$t = $_SESSION['trang'];
?>
<div class="dropdown-center text-end">
  <button class="btn btn-secondary bg-white dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Giá
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" name="tangdan" href="?sapxep=0&trang=<?php echo $t ?>">Tăng dần</a></li>
    <li><a class="dropdown-item" name="giamdan" href="?sapxep=1&trang=<?php echo $t ?>">Giảm dần</a></li>
    <li><a class="dropdown-item" name="giamdan" href="?">Bỏ sắp xếp</a></li>
  </ul>
</div>
<div class="dropdown-center text-end">
  <button class="btn btn-secondary bg-white dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Tình trạng
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" name="tinhtrang" href="?tinhtrang=1&trang=<?php echo $t ?>">Mới</a></li>
    <li><a class="dropdown-item" name="tinhtrang" href="?tinhtrang=0&trang=<?php echo $t ?>">Giảm giá</a></li>
    <li><a class="dropdown-item" name="tinhtrang" href="?">Tất cả</a></li>
  </ul>
</div>

<ul class="product_list">
  <?php while ($row = mysqli_fetch_array($query_pro)) {
    if($row['loaihang'] == 1 & $row['giamgia'] != 0) {
      $goc=$row['giasp']/(1-$row['giamgia']/100);
  ?>
    <li>
      <div class="card" style="position: relative;">
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
          <img class="img img-responsive rounded-1" with="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
          <p class="title_product"><?php echo $row['tensanpham'] ?></p>
          <p class="price_product">Giá : <?php echo number_format($row['giasp'], 0, ',', '.') . 'VND' ?> </p>
          <p class="price_product">Giá gốc : <?php echo number_format($goc, 0, ',', '.') . 'VND' ?> </p>
          <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
          </p>
        </a>
        <div class="sale" style="position: absolute;top: -7%;left: -7%;width: 125px;/* height: 108px; ">
          <img width="100%" src="data:image/PNG;base64,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" alt="">
        </div>
        <div class="buy" style="position: absolute;top: 92%;left: 81%;"><i class="fa-solid fa-cart-shopping fa-beat-fade"></i></div>
      </div>
    </li>
  <?php }else{ ?>
    <li>
      <div class="card" style="position: relative;">
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
          <img class="img img-responsive rounded-1" with="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
          <p class="title_product"><?php echo $row['tensanpham'] ?></p>
          <p class="price_product">Giá : <?php echo number_format($row['giasp'], 0, ',', '.') . 'VND' ?> </p>
          <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
          </p>
        </a>
        <div class="sale" style="position: absolute;top: -7%;left: -7%;width: 125px;/* height: 108px; ">
          <img width="100%" src="" alt="">
        </div>
        <div class="buy" style="position: absolute;top: 92%;left: 81%;"><i class="fa-solid fa-cart-shopping fa-beat-fade"></i></div>
      </div>
    </li><?php 
}} ?>
</ul>
<div style="clear:both;"></div>
<?php
$sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham" . $where);
$row_count = mysqli_num_rows($sql_trang);

$trang = ceil($row_count / 16);
?>

<ul class="list_phantrang">
  <?php
  for ($i = 1; $i <= $trang; $i++) {
    $selectedClass = $i == $page ? 'selected' : ''; // Add 'selected' class if $i is the current page
  ?>
    <li><a class="<?php echo $selectedClass; ?>" href="index.php?trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php
  }
  ?>
</ul>










<?php ?>