<?php
include ('../../config/config.php');
$tenloaisp=$_POST["tendanhmuc"];
$thutu =$_POST["thutu"];

function dmExists($mysqli, $tendanhmuc)
{
   $sqlbv = "SELECT * FROM tbl_danhmuc WHERE tendanhmuc='$tendanhmuc'";
   $result = mysqli_query($mysqli, $sqlbv);
   return mysqli_num_rows($result) > 0;
}
function dmExistsID($mysqli, $tendanhmuc, $id)
{
   $sqlbv = "SELECT * FROM tbl_danhmuc WHERE tendanhmuc='$tendanhmuc' AND id_danhmuc!='$id'";
   $result = mysqli_query($mysqli, $sqlbv);
   return mysqli_num_rows($result) > 0;
}
if(isset($_POST['themdanhmuc']))
{ //them san pham 
   if (dmExists($mysqli, $tenloaisp)) {
      header('Location: ../../themdm.php?message=Thông tin đã tồn tại !');
   } else {
   $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
   mysqli_query($mysqli,$sql_them);
   header('Location:../../lietkedm.php');
   }
}elseif(isset($_POST['suadanhmuc'])){
   // sua san pham 
   $iddm=$_GET["iddanhmuc"];
   if (dmExistsID($mysqli, $tenloaisp,$iddm)) {
      header('Location: ../../suadm.php?iddanhmuc='.$iddm.'&message=Thông tin đã tồn tại !');
   } else {
   $sql_update = "UPDATE tbl_danhmuc  SET tendanhmuc='".$tenloaisp."', thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
   mysqli_query($mysqli,$sql_update);
   header('Location:../../lietkedm.php');
   }

}else{
   //xoa san pham
   $id=$_GET['iddanhmuc'];
   echo "$id";
   $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc= '".$id."'";
   if (mysqli_query($mysqli, $sql_xoa)) {
      echo "Xóa sản phẩm thành công";
      header('Location:../../lietkedm.php');
  } else {
      echo "Lỗi khi xóa sản phẩm: " . mysqli_error($mysqli);
  }
  
}

?>