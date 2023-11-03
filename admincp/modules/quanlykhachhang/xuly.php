<?php
include ('../../config/config.php');

 //xoa san pham
    $id=$_GET['idkhachhang'];
    $sql="SELECT * FROM tbl_dangky WHERE id_dangky = '$id' LIMIT 1";
    $query=mysqli_query($mysqli,$sql);
  
    echo "$id";
    $sql_xoa = "DELETE FROM tbl_dangky WHERE id_dangky= '".$id."'";
    if (mysqli_query($mysqli, $sql_xoa)) {
  
       header('Location: ../../index.php?action=quanlykhachhang&query=xemkhachhang');
    
   } else {
       echo "Lỗi khi xóa sản phẩm: " . mysqli_error($mysqli);
   }




