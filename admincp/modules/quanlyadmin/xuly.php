<?php
include('../../config/config.php');
$ten = $_POST["tenadmin"];
$thongtin = $_POST["thongtin"];
$diachi = $_POST["diachi"];
$sodienthoai = $_POST["sodienthoai"];
$email = $_POST["email"];

//xu ly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;


function productExistsID($mysqli, $sodienthoai, $email, $id)
{
   $sql = "SELECT * FROM tbl_admin WHERE ( sodienthoai='$sodienthoai' OR email='$email')  AND id_admin!='$id'";
   $result = mysqli_query($mysqli, $sql);
   return mysqli_num_rows($result) > 0;
}
if (isset($_POST['capnhat'])) {
   // sua san pham 
   $idadmin = $_GET["id"];
   if (productExistsID($mysqli, $sodienthoai, $email, $idadmin)) {
      header('Location:../../users-profile.php?id=' . $idadmin . '&message=Thông tin đã tồn tại !');
   } else {
      if ($hinhanh != '') {

         $sql_update = "UPDATE tbl_admin  SET hoten='" . $ten . "', thongtin='" . $thongtin . "',diachi='" . $diachi . "',sodienthoai='" . $sodienthoai . "',email='" . $email . "',
   
      hinhanh='" . $hinhanh . "' WHERE id_admin='$_GET[id]'";
         $sql = "SELECT * FROM tbl_admin WHERE id_admin = '$_GET[id]' LIMIT 1";
         move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
         //loi khi sua   
         $query = mysqli_query($mysqli, $sql);
         while ($row = mysqli_fetch_array($query)) {
            // can sua
            unlink('uploads/' . $row['hinhanh']);
         }
      } else {
         $sql_update = "UPDATE tbl_admin  SET hoten='" . $ten . "', thongtin='" . $thongtin . "',diachi='" . $diachi . "',sodienthoai='" . $sodienthoai . "' WHERE id_sanpham='$_GET[idsanpham]'";
      }

      mysqli_query($mysqli, $sql_update);

      header('Location:../../users-profile.php');
   }
} else {
   //xoa san pham
   $id = $_GET['idnhanvien'];
   $sql = "SELECT * FROM tbl_admin WHERE id_admin = '$id' LIMIT 1";
   $query = mysqli_query($mysqli, $sql);
   while ($row = mysqli_fetch_array($query)) {
      // can sua
      unlink('uploads/' . $row['hinhanh']);
   }
   echo "$id";
   $sql_xoa = "DELETE FROM tbl_admin WHERE id_admin= '" . $id . "'";
   if (mysqli_query($mysqli, $sql_xoa)) {
      echo "Xóa sản phẩm thành công";
      header('Location: ../../lietkenv.php?');
   } else {
      echo "Lỗi khi xóa sản phẩm: " . mysqli_error($mysqli);
   }
}
