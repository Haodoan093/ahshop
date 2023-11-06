<?php
include ('../../config/config.php');
$tendanhmucbaiviet=$_POST["tendanhmuc_baiviet"];
$thutu =$_POST["thutu"];


function dmbaivietExists($mysqli, $tendanhmuc)
{
   $sqlbv = "SELECT * FROM tbl_danhmucbaiviet WHERE tendanhmuc_baiviet='$tendanhmuc'";
   $result = mysqli_query($mysqli, $sqlbv);
   return mysqli_num_rows($result) > 0;
}
function dmbaivietExistsID($mysqli, $tendanhmuc, $id)
{
   $sqlbv = "SELECT * FROM tbl_danhmucbaiviet WHERE tendanhmuc_baiviet='$tendanhmuc' AND id_danhmucbaiviet!='$id'";
   $result = mysqli_query($mysqli, $sqlbv);
   return mysqli_num_rows($result) > 0;
}
if(isset($_POST['themdanhmucbv']))
{ //them san pham 
   if (dmbaivietExists($mysqli, $tendanhmucbaiviet)) {
      header('Location: ../../themdmbv.php?message=Thông tin đã tồn tại !');
   } else {
   $sql_them = "INSERT INTO tbl_danhmucbaiviet(tendanhmuc_baiviet) VALUE('".$tendanhmucbaiviet."')";
   mysqli_query($mysqli,$sql_them);
   header('Location:../../lietkedmbv.php');
   }
}elseif(isset($_POST['suadanhmucbv'])){
   // sua san pham 
   $iddm=$_GET["idbaiviet"];
   if (dmbaivietExistsID($mysqli, $tendanhmucbaiviet,$iddm)) {
      header('Location: ../../suadmbv.php?idbaiviet='.$iddm.'&message=Thông tin đã tồn tại !');
   } else {
   $sql_update = "UPDATE tbl_danhmucbaiviet  SET tendanhmuc_baiviet='".$tendanhmucbaiviet."', thutu='".$thutu."' WHERE id_danhmucbaiviet='$_GET[idbaiviet]'";
   mysqli_query($mysqli,$sql_update);
   header('Location:../../lietkedmbv.php');
   }
}else{
   //xoa san pham
   $id=$_GET['idbaiviet'];
   echo "$id";
   $sql_xoa = "DELETE FROM tbl_danhmucbaiviet WHERE id_danhmucbaiviet= '".$id."'";
   if (mysqli_query($mysqli, $sql_xoa)) {
      echo "Xóa danh mục thành công";
      header('Location:../../lietkedmbv.php');
  } else {
      echo "Lỗi khi xóa sản phẩm: " . mysqli_error($mysqli);
  }
  
}
