<?php
include('../../config/config.php');
$tenbaiviet = $_POST["tenbaiviet"];

//xu ly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;

$tomtat = $_POST["tomtat"];
$noidung = $_POST["noidung"];
$tinhtrang = $_POST["tinhtrang"];
$danhmuc = $_POST["danhmuc"];



function baivietExists($mysqli, $tenbaiviet)
{
   $sqlbv = "SELECT * FROM tbl_baiviet WHERE tenbaiviet='$tenbaiviet'";
   $result = mysqli_query($mysqli, $sqlbv);
   return mysqli_num_rows($result) > 0;
}
function baivietExistsID($mysqli, $tenbaiviet, $id)
{
   $sqlbv = "SELECT * FROM tbl_baiviet WHERE tenbaiviet='$tenbaiviet' AND id_baiviet!='$id'";
   $result = mysqli_query($mysqli, $sqlbv);
   return mysqli_num_rows($result) > 0;
}

if (isset($_POST['thembaiviet'])) { //them san pham 
   if (baivietExists($mysqli, $tenbaiviet)) {
      header('Location: ../../thembv.php?message=Thông tin đã tồn tại !');
   } else {
      $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
   VALUE('" . $tenbaiviet . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "','" . $tinhtrang . "','" . $danhmuc . "')";
      mysqli_query($mysqli, $sql_them);

      move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
      header('Location: ../../lietkebv.php?message=Thêm thành công!');
   }
} elseif (isset($_POST['suabaiviet'])) {
   // sua san pham 
   $idbv = $_GET["idbaiviet"];
   if (baivietExists($mysqli, $tenbaiviet)) {
      header('Location: ../../suabv.php?idbaiviet=' . $idbv . '&message=Thông tin đã tồn tại !');
   } else {
      if ($hinhanh != '') {

         $sql_update = "UPDATE tbl_baiviet  SET tenbaiviet='" . $tenbaiviet . "', 
       hinhanh='" . $hinhanh . "',tomtat='" . $tomtat . "',noidung='" . $noidung . "',tinhtrang='" . $tinhtrang . "',id_danhmuc='" . $danhmuc . "' WHERE id_baiviet='$_GET[idbaiviet]'";

         $sql = "SELECT * FROM tbl_baiviet WHERE id_baiviet = '$_GET[idbaiviet]' LIMIT 1";
         move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
         //loi khi sua   
         $query = mysqli_query($mysqli, $sql);
         while ($row = mysqli_fetch_array($query)) {
            // can sua
            unlink('uploads/' . $row['hinhanh']);
         }
      } else {
         $sql_update = "UPDATE tbl_baiviet  SET tenbaiviet='" . $tenbaiviet . "',
   
      tomtat='" . $tomtat . "',noidung='" . $noidung . "',tinhtrang='" . $tinhtrang . "',id_danhmuc='" . $danhmuc . "'  WHERE id_baiviet='$_GET[idbaiviet]'";
      }

      mysqli_query($mysqli, $sql_update);

      header('Location: ../../lietkebv.php?message=Sửa thành công!');
   }
} else {
   //xoa san pham
   $id = $_GET['idbaiviet'];
   $sql = "SELECT * FROM tbl_baiviet WHERE id_baiviet = '$id' LIMIT 1";
   $query = mysqli_query($mysqli, $sql);
   while ($row = mysqli_fetch_array($query)) {
      // can sua
      unlink('uploads/' . $row['hinhanh']);
   }
   echo "$id";
   $sql_xoa = "DELETE FROM tbl_baiviet WHERE id_baiviet= '" . $id . "'";
   if (mysqli_query($mysqli, $sql_xoa)) {
      echo "Xóa sản phẩm thành công";
      header('Location: ../../lietkebv.php');
   } else {
      echo "Lỗi khi xóa sản phẩm: " . mysqli_error($mysqli);
   }
}
