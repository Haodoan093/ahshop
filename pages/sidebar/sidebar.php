<?php
ob_start(); // Bắt đầu bộ đệm đầu ra
?>
<div class="sidebar" style="border: 1px solid black;">
<h4 style="text-align: center;">Danh mục</h4>
  <ul class="list_sidebar" style="border: 1px;">
    <?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
    while ($row = mysqli_fetch_array($query_danhmuc)) {
    ?>
      <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>" class="red-button" style="text-align:center;color:black;"><?php echo $row['tendanhmuc'] ?></a></li>
    <?php } ?>
  </ul>
  <h4 style="text-align: center;">Bài viết</h4>
  <ul class="list_sidebar">
    <?php
    $sql_danhmuc_bv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
    $query_danhmuc_bv = mysqli_query($mysqli, $sql_danhmuc_bv);
    while ($rowbv = mysqli_fetch_array($query_danhmuc_bv)) {
    ?>
      <li><a href="index.php?quanly=danhmucbaiviet&idbv=<?php echo $rowbv['id_danhmucbaiviet']?>" class="red-button" style="text-align:center;color:black"><?php echo $rowbv['tendanhmuc_baiviet'] ?></a></li>
    <?php } ?>
  </ul>
</div>
<?php

?>
