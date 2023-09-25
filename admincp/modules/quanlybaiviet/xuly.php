<?php
include ('../../config/config.php');
$tenbaiviet=$_POST["tenbaiviet"];

//xu ly hinh anh
$hinhanh=$_FILES['hinhanh']['name'];
$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
$hinhanh=time().'_'.$hinhanh;

$tomtat =$_POST["tomtat"];
$noidung =$_POST["noidung"];
$tinhtrang =$_POST["tinhtrang"];
$danhmuc =$_POST["danhmuc"];





if(isset($_POST['thembaiviet']))
{ //them san pham 
   $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
   VALUE('".$tenbaiviet."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
   mysqli_query($mysqli,$sql_them);

   move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
   header('Location:../../index.php?action=quanlybaiviet&query=them');

}elseif(isset($_POST['suabaiviet'])){
   // sua san pham 

   if($hinhanh!=''){
     
      $sql_update = "UPDATE tbl_baiviet  SET tenbaiviet='".$tenbaiviet."', 
       hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_baiviet='$_GET[idbaiviet]'";
     
       $sql="SELECT * FROM tbl_baiviet WHERE id_baiviet = '$_GET[idbaiviet]' LIMIT 1";
      move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    //loi khi sua   
      $query=mysqli_query($mysqli,$sql);
      while($row = mysqli_fetch_array($query)){
       // can sua
          unlink('uploads/'.$row['hinhanh']);
      }
   }else{
      $sql_update = "UPDATE tbl_baiviet  SET tenbaiviet='".$tenbaiviet."',
   
      tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."'  WHERE id_baiviet='$_GET[idbaiviet]'";
   }
 
   mysqli_query($mysqli,$sql_update);
   
   header('Location:../../index.php?action=quanlybaiviet&query=them');

}else{
   //xoa san pham
   $id=$_GET['idbaiviet'];
   $sql="SELECT * FROM tbl_baiviet WHERE id_baiviet = '$id' LIMIT 1";
   $query=mysqli_query($mysqli,$sql);
   while($row = mysqli_fetch_array($query)){
    // can sua
       unlink('uploads/'.$row['hinhanh']);
   }
   echo "$id";
   $sql_xoa = "DELETE FROM tbl_baiviet WHERE id_baiviet= '".$id."'";
   if (mysqli_query($mysqli, $sql_xoa)) {
      echo "Xóa sản phẩm thành công";
      header('Location: ../../index.php?action=quanlybaiviet&query=them');
  } else {
      echo "Lỗi khi xóa sản phẩm: " . mysqli_error($mysqli);
  }
  
}

?>