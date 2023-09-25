<?php
include ('../../config/config.php');
$tendanhmucbaiviet=$_POST["tendanhmuc_baiviet"];
$thutu =$_POST["thutu"];
if(isset($_POST['themdanhmucbv']))
{ //them san pham 
   $sql_them = "INSERT INTO tbl_danhmucbaiviet(tendanhmuc_baiviet,thutu) VALUE('".$tendanhmucbaiviet."','".$thutu."')";
   mysqli_query($mysqli,$sql_them);
   header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}elseif(isset($_POST['suadanhmucbv'])){
   // sua san pham 
   $sql_update = "UPDATE tbl_danhmucbaiviet  SET tendanhmuc_baiviet='".$tendanhmucbaiviet."', thutu='".$thutu."' WHERE id_danhmucbaiviet='$_GET[idbaiviet]'";
   mysqli_query($mysqli,$sql_update);
   header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');

}else{
   //xoa san pham
   $id=$_GET['idbaiviet'];
   echo "$id";
   $sql_xoa = "DELETE FROM tbl_danhmucbaiviet WHERE id_danhmucbaiviet= '".$id."'";
   if (mysqli_query($mysqli, $sql_xoa)) {
      echo "Xóa danh mục thành công";
      header('Location: ../../index.php?action=quanlydanhmucbaiviet&query=them');
  } else {
      echo "Lỗi khi xóa sản phẩm: " . mysqli_error($mysqli);
  }
  
}
