<?php
include ('../../config/config.php');
$tensanpham=$_POST["tensanpham"];
$masp =$_POST["masp"];
$giasp =$_POST["giasp"];
$soluong =$_POST["soluong"];
$giamgia =$_POST["giamgia"];

//xu ly hinh anh
$hinhanh=$_FILES['hinhanh']['name'];
$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
$hinhanh=time().'_'.$hinhanh;

$tomtat =$_POST["tomtat"];
$noidung =$_POST["noidung"];
$tinhtrang =$_POST["tinhtrang"];
$loaihang =$_POST["loaihang"];
$danhmuc =$_POST["danhmuc"];

if($giamgia!=0){
   if($_GET["giamgiagoc"]!=$giamgia){
   $giasp=$giasp/(1-$_GET["giamgiagoc"]/100);
   $giasp = $giasp * (1 - $giamgia / 100);
   }
}else{
   if(isset($_GET["giamgiagoc"]))
   {
      $giasp=$giasp/(1-$_GET["giamgiagoc"]/100);
   }
      
  
}


function productExists($mysqli, $tensanpham, $masp)
{
    $sql = "SELECT * FROM tbl_sanpham WHERE tensanpham='$tensanpham' OR masp='$masp'";
    $result = mysqli_query($mysqli, $sql);
    return mysqli_num_rows($result) > 0;
}
function productExistsID($mysqli, $tensanpham, $masp, $id)
{
   $sql = "SELECT * FROM tbl_sanpham WHERE (tensanpham='$tensanpham' OR masp='$masp') AND id_sanpham!='$id'";
   $result = mysqli_query($mysqli, $sql);
   return mysqli_num_rows($result) > 0;
}
if(isset($_POST['themsanpham']))
{ //them san pham 
   if (productExists($mysqli, $tensanpham, $masp)) {
      header('Location: ../../index.php?action=quanlysanpham&query=them&message=Thông tin đã tồn tại !');
  } else {
   $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc,giamgia,loaihang) 
   VALUE('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."','".$giamgia."','".$loaihang."')";
   mysqli_query($mysqli,$sql_them);

   move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
   header('Location:../../index.php?action=quanlysanpham&query=them');
  }

}elseif(isset($_POST['suasanpham'])){
   // sua san pham 
$idsp=$_GET["idsanpham"];
   if (productExistsID($mysqli, $tensanpham, $masp,$idsp)) {
      header('Location:../../index.php?action=quanlysanpham&query=sua&idsanpham='.$idsp.'&message=Thông tin đã tồn tại !');

  } else {
   if($hinhanh!=''){
     
      $sql_update = "UPDATE tbl_sanpham  SET tensanpham='".$tensanpham."', masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',
   
      hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',giamgia='".$giamgia."',loaihang='".$loaihang."' WHERE id_sanpham='$_GET[idsanpham]'";
      $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
      move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    //loi khi sua   
      $query=mysqli_query($mysqli,$sql);
      while($row = mysqli_fetch_array($query)){
       // can sua
          unlink('uploads/'.$row['hinhanh']);
      }
   }else{
      $sql_update = "UPDATE tbl_sanpham  SET tensanpham='".$tensanpham."', masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',
   
      tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."'  WHERE id_sanpham='$_GET[idsanpham]'";
   }
 
   mysqli_query($mysqli,$sql_update);
   
   header('Location:../../index.php?action=quanlysanpham&query=them');
}

}else{
   //xoa san pham
   $id=$_GET['idsanpham'];
   $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
   $query=mysqli_query($mysqli,$sql);
   while($row = mysqli_fetch_array($query)){
    // can sua
       unlink('uploads/'.$row['hinhanh']);
   }
   echo "$id";
   $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham= '".$id."'";
   if (mysqli_query($mysqli, $sql_xoa)) {
      echo "Xóa sản phẩm thành công";
      header('Location: ../../index.php?action=quanlysanpham&query=them');
  } else {
      echo "Lỗi khi xóa sản phẩm: " . mysqli_error($mysqli);
  }
  
}
