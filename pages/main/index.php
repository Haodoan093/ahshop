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
}else if (isset($_GET['uudai'])) {
  $where = " WHERE tbl_sanpham.giamgia='$_GET[uudai]' ORDER BY tbl_sanpham.id_sanpham DESC";
  $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.giamgia='$_GET[uudai]' ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,16";
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

  .price_goc {
    text-align: center;
    text-decoration: line-through;
    /* Gạch ngang giá gốc */
    color: #999;
    /* Màu chữ của giá gốc */
    font-size: 16px;
    /* Kích thước chữ của giá gốc */
    margin-top: 5px;
    /* Khoảng cách từ giá gốc đến giá sản phẩm */
  }

  .loc {
    display: flex;
    /* Sử dụng flexbox để xếp hàng ngang */
    margin-bottom: 20px;
  }
</style>
<h3>Sản phẩm mới nhất</h3>
<?php

$t = $_SESSION['trang'];
?>
<div class="loc">
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
  <div class="dropdown-center text-end">
    <button class="btn btn-secondary bg-white dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Ưu đãi
    </button>
    <ul class="dropdown-menu">
      <?php
      for ($discount = 10; $discount <= 90; $discount += 10) {
        echo '<li><a class="dropdown-item" name="uudai" href="?uudai=' . $discount . '&trang=' . $t . '">' . $discount . '%</a></li>';
      }
      ?>
      <li><a class="dropdown-item" name="uudai" href="?">Tất cả</a></li>
    </ul>
  </div>

</div>


<ul class="product_list">
  <?php while ($row = mysqli_fetch_array($query_pro)) {
    if ($row['loaihang'] == 1 & $row['giamgia'] != 0) {
      $goc = $row['giasp'] / (1 - $row['giamgia'] / 100);
  ?>
      <li>
        <div class="card" style="position: relative;">
          <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img class="img img-responsive rounded-1" with="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p class="price_product">Giá : <?php echo number_format($row['giasp'], 0, ',', '.') . 'VND' ?> </p>
            <p class="price_goc">Giá gốc : <?php echo number_format($goc, 0, ',', '.') . 'VND' ?> </p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
            </p>
          </a>
          <div class="sale" style="position: absolute;top: -7%;left: -7%;width: 125px;/* height: 108px; ">
            <img width="100%" src="images/new.png" alt="">
          </div>
          <div class="buy" style="position: absolute;top: 92%;left: 81%;"><i class="fa-solid fa-cart-shopping fa-beat-fade"></i></div>
        </div>
      </li>
    <?php } else if ($row['loaihang'] == 1) {
    ?>
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
            <img width="100%" src="images/new.png" alt="">
          </div>
          <div class="buy" style="position: absolute;top: 92%;left: 81%;"><i class="fa-solid fa-cart-shopping fa-beat-fade"></i></div>
        </div>
      </li>
    <?php } else if ($row['giamgia'] != 0) {
      $goc = $row['giasp'] / (1 - $row['giamgia'] / 100);
    ?>
      <li>
        <div class="card" style="position: relative;">
          <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img class="img img-responsive rounded-1" with="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p class="price_product">Giá : <?php echo number_format($row['giasp'], 0, ',', '.') . 'VND' ?> </p>
            <p class="price_goc">Giá gốc : <?php echo number_format($goc, 0, ',', '.') . 'VND' ?> </p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
            </p>
          </a>
          <div class="sale" style="position: absolute;top: -6%;left: -13%;width: 125px;/* height: 108px; ">
            <img width="100%" src="images/sell.png" alt="">
          </div>
          <div class="buy" style="position: absolute;top: 92%;left: 81%;"><i class="fa-solid fa-cart-shopping fa-beat-fade"></i></div>
        </div>
      </li> <?php } else { ?>
      <li>
        <div class="card" style="position: relative;">
          <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img class="img img-responsive rounded-1" with="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p class="price_product">Giá : <?php echo number_format($row['giasp'], 0, ',', '.') . 'VND' ?> </p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
            </p>
          </a>
          <div class="sale" style="position: absolute;top: -6%;left: -13%;width: 125px;/* height: 108px; ">
            <img width="100%" src="images/sell.png" alt="">
          </div>
          <div class="buy" style="position: absolute;top: 92%;left: 81%;"><i class="fa-solid fa-cart-shopping fa-beat-fade"></i></div>
        </div>
      </li><?php
          }
        } ?>
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