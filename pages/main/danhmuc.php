
<?php



  //get ten dnah muc
  $sql_cate="SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id]' LIMIT 1";
  $query_cate=mysqli_query($mysqli,$sql_cate);
   $row_title = mysqli_fetch_array($query_cate);

if(isset($_GET['sapxep']) && $_GET['sapxep'] == 0) {
 
  $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.giasp ASC ";
  $query_pro = mysqli_query($mysqli, $sql_pro);

}else if(isset($_GET['sapxep']) && $_GET['sapxep'] == 1) {
 

  $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.giasp DESC ";
  $query_pro = mysqli_query($mysqli, $sql_pro);
}else{
  $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC ";
  $query_pro = mysqli_query($mysqli, $sql_pro);
}

 
 
?>


<h3>Danh mục sản phẩm : <?php  echo $row_title['tendanhmuc']?></h3>
<?php

$t=$_SESSION['trang'];
?>
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

              <ul class="product_list">
                 
              <?php while ($row_pro = mysqli_fetch_array($query_pro)) {
               ?>
                  <li> 
                  <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
                       <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>" > 
                       <p class ="title_product"><?php echo $row_pro['tensanpham']?></p>
                       <p class="price_product">Giá : <?php echo number_format($row_pro['giasp'],0,',','.').'VND'?> </p>
                        </a>
                  </li>

               <?php }
               ?>
                
              </ul>

              