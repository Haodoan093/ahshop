

<?php
if(isset($_GET['trang'])){
  $page=$_GET['trang' ];
}else{
  $page=1;
}
if($page == '' || $page ==1){
  $begin=0;
}else{
  $begin = ($page*16)-16;
}
  $sql_pro="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,16";
  $query_pro=mysqli_query($mysqli,$sql_pro);
?>

<style>
  /* Định dạng dòng chia trang */
/* Định dạng dòng chia trang */
ul.list_phantrang {
    list-style-type: none;
    margin: 0;
    padding: 9px;
    text-align: center; /* Căn giữa theo chiều ngang */
}

/* Định dạng mỗi mục trong dòng chia trang */
ul.list_phantrang li {
    display: inline;
    margin-right: 5px; /* Khoảng cách giữa các mục */
}

/* Định dạng các liên kết trong mục */
ul.list_phantrang li a {
    text-decoration: none; /* Loại bỏ gạch chân mặc định của liên kết */
    padding: 5px 10px; /* Kích thước khoảng trống xung quanh văn bản trong mục */
    border: 1px solid #ccc; /* Viền xung quanh mục */
    background-color: #f0f0f0; /* Màu nền của mục */
    color: #333; /* Màu văn bản */
}

/* Định dạng liên kết khi rê chuột qua */
ul.list_phantrang li a:hover {
    background-color: #333; /* Màu nền thay đổi khi rê chuột qua */
    color: #fff; /* Màu văn bản thay đổi khi rê chuột qua */
}
/* Highlight the selected page */
ul.list_phantrang li a.selected {
    background-color: #333;
    color: #fff;
}



</style>
<h3>Sản phẩm mới nhất</h3>
              <ul class="product_list">
                <?php while ($row = mysqli_fetch_array($query_pro)){
                ?>
                  <li> 
                      <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
                      <img class="img img-responsive rounded-1" with="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" > 
                          <p class ="title_product"><?php echo $row['tensanpham']?></p>
                          <p class="price_product">Giá : <?php echo number_format($row['giasp'],0,',','.').'VND'?> </p>
                          <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc']?></p></p>
                      </a>
                  </li>
                 <?php } ?>
              </ul>
              <div style="clear:both;"></div>
              <?php 
                 $sql_trang=mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
                 $row_count=mysqli_num_rows($sql_trang);
                 $trang = ceil($row_count/16);
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


            

            <?php
  $sql_bv="SELECT * FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY id_baiviet DESC";
  $query_bv=mysqli_query($mysqli,$sql_bv);



 
 
?>



<h3>TIN TỨC MỚI NHẤT</h3>
              <ul class="product_list">
                 
              <?php while ($row_bv = mysqli_fetch_array($query_bv)) {
               ?>
                  <li> 
                  <a href="index.php?quanly=baiviet&idbaiviet=<?php echo $row_bv['id_baiviet']?>">
                       <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']?>" > 
                       <p class ="title_product"><?php echo $row_bv['tenbaiviet']?></p>
                   
                        </a>
                  </li>

               <?php }
               ?>
                
              </ul>

              