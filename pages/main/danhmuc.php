<?php



//get ten dnah muc
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);

if (isset($_GET['sapxep']) && $_GET['sapxep'] == 0) {

  $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.giasp ASC ";
  $query_pro = mysqli_query($mysqli, $sql_pro);
} else if (isset($_GET['sapxep']) && $_GET['sapxep'] == 1) {


  $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.giasp DESC ";
  $query_pro = mysqli_query($mysqli, $sql_pro);
}  else if (isset($_GET['tinhtrang'])) {
  $where = " WHERE tbl_sanpham.loaihang='$_GET[tinhtrang]' ORDER BY tbl_sanpham.id_sanpham DESC";
  $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]'  AND tbl_sanpham.loaihang='$_GET[tinhtrang]' ORDER BY tbl_sanpham.id_sanpham DESC";
  $query_pro = mysqli_query($mysqli, $sql_pro);
} else if (isset($_GET['uudai'])) {
  $where = " WHERE tbl_sanpham.giamgia='$_GET[uudai]' ORDER BY tbl_sanpham.id_sanpham DESC";
  $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]'  AND tbl_sanpham.giamgia='$_GET[uudai]' ORDER BY tbl_sanpham.id_sanpham DESC ";
  $query_pro = mysqli_query($mysqli, $sql_pro);
} else {
  $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC ";
  $query_pro = mysqli_query($mysqli, $sql_pro);
}


?>

<style>
  .loc {
    display: flex;
    /* Sử dụng flexbox để xếp hàng ngang */
    margin-bottom: 20px;
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
</style>
<h3>Danh mục sản phẩm : <?php echo $row_title['tendanhmuc'] ?></h3>
<?php

$t = $_SESSION['trang'];
?>
<div class="loc">
  <div class="dropdown-center text-end">
    <button class="btn btn-secondary bg-white dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Giá
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" name="tangdan" href="?quanly=danhmucsanpham&id=<?php echo $_GET["id"] ?>&sapxep=0&trang=<?php echo $t ?>">Tăng dần</a></li>
      <li><a class="dropdown-item" name="giamdan" href="?quanly=danhmucsanpham&id=<?php echo $_GET["id"] ?>&sapxep=1&trang=<?php echo $t ?>">Giảm dần</a></li>
      <li><a class="dropdown-item" name="giamdan" href="?quanly=danhmucsanpham&id=<?php echo $_GET["id"] ?>">Bỏ sắp xếp</a></li>
    </ul>
  </div>
  <div class="dropdown-center text-end">
    <button class="btn btn-secondary bg-white dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Tình trạng
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" name="tinhtrang" href="?quanly=danhmucsanpham&id=<?php echo $_GET["id"] ?>&tinhtrang=1&trang=<?php echo $t ?>">Mới</a></li>
      <li><a class="dropdown-item" name="tinhtrang" href="?quanly=danhmucsanpham&id=<?php echo $_GET["id"] ?>&tinhtrang=0&trang=<?php echo $t ?>">Giảm giá</a></li>
      <li><a class="dropdown-item" name="tinhtrang" href="?quanly=danhmucsanpham&id=<?php echo $_GET["id"] ?>&">Tất cả</a></li>
    </ul>
  </div>
  <div class="dropdown-center text-end">
    <button class="btn btn-secondary bg-white dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Ưu đãi
    </button>
    <ul class="dropdown-menu">
      <?php
     for ($discount = 10; $discount <= 90; $discount += 10) {
      echo '<li><a class="dropdown-item" name="uudai" href="?quanly=danhmucsanpham&id=' . $_GET["id"] . '&uudai=' . $discount . '&trang=' . $t . '">' . $discount . '%</a></li>';
  }
  
      ?>
      <li><a class="dropdown-item" name="uudai" href="?quanly=danhmucsanpham&id=<?php echo $_GET["id"] ?>&">Tất cả</a></li>
    </ul>
  </div>
</div>


<div class="sp">

<ul class="product_list">
  <?php while ($row = mysqli_fetch_array($query_pro)) {
    if ($row['loaihang'] == 1) {
      $goc = $row['giasp'] / (1 - $row['giamgia'] / 100);
  ?>
      <li>
        <div class="card" style="position: relative;">
          <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img class="img img-responsive rounded-1" with="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p class="price_product">Giá : <?php echo number_format($row['giasp'], 0, ',', '.') . 'VND' ?> </p>
            <?php if ($row['giamgia'] != 0) {
            ?>
              <p class="price_goc">Giá gốc : <?php echo number_format($goc, 0, ',', '.') . 'VND' ?> </p>
            <?php } ?>
          
          </a>
          <div class="sale" style="position: absolute;top: -7%;left: -7%;width: 125px;/* height: 108px; ">
            <img width="100%" src="images/new.png" alt="">
          </div>
          <div class="buy" style="position: absolute;top: 92%;left: 81%;"><i class="fa-solid fa-cart-shopping fa-beat-fade"></i></div>
        </div>
      </li>
    <?php } else {
      $goc = $row['giasp'] / (1 - $row['giamgia'] / 100);
    ?>
      <li>
        <div class="card" style="position: relative;">
          <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img class="img img-responsive rounded-1" with="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p class="price_product">Giá : <?php echo number_format($row['giasp'], 0, ',', '.') . 'VND' ?> </p>
            <?php if ($row['giamgia'] != 0) {
            ?>
              <p class="price_goc">Giá gốc : <?php echo number_format($goc, 0, ',', '.') . 'VND' ?> </p>
            <?php } ?>
          </a>
          <div class="sale" style="position: absolute;top: -6%;left: -13%;width: 125px;/* height: 108px; ">
            <img width="100%" src="images/sell.png" alt="">
          </div>
          <div class="buy" style="position: absolute;top: 92%;left: 81%;"><i class="fa-solid fa-cart-shopping fa-beat-fade"></i></div>
        </div>
      </li> <?php
          }
        } ?>
</ul>

</div>