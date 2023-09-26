
<?php
  $sql_bv="SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc='$_GET[idbv]' ORDER BY id_baiviet DESC";
  $query_bv=mysqli_query($mysqli,$sql_bv);


  //get ten dnah muc
  $sql_cate="SELECT * FROM tbl_danhmucbaiviet WHERE id_danhmucbaiviet='$_GET[idbv]' LIMIT 1";
  $query_cate=mysqli_query($mysqli,$sql_cate);
   $row_title = mysqli_fetch_array($query_cate);
 
 
?>



<h3>Bài viết : <?php  echo $row_title['tendanhmuc_baiviet']?></h3>
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

              