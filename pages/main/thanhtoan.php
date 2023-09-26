<h3>thanh toan</h3>
<?php
session_start();
include("../../admincp/config/config.php");
require ('../../mail/send/sendmail.php');

$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0, 9999);
$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('" . $id_khachhang . "','" . $code_order . "',1)  ";
$cart_query = mysqli_query($mysqli, $insert_cart);


if ($insert_cart) {
   //them gio hang chi tiet
   foreach ($_SESSION['cart'] as $key => $value) {
      $id_sanpham = $value['id'];
      $soluong = $value['soluong'];
      $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
      mysqli_query($mysqli, $insert_order_details);
   }
   $tieude = "AHSHOP CẢM ƠN !";

   $noidung = "
   <style>
     .guimail {
       font-family: Arial, sans-serif;
       background-color: #f2f2f2;
       padding: 20px;
       border-radius: 5px;
       box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
     }
     p {
       margin: 0;
     }
   </style>
     <div class='guimail'>
       <p>CẢM ƠN BẠN ĐÃ ĐẶT HÀNG</p>
       <p>Mã đơn hàng : $code_order</p>
       <p>Đơn hàng sẽ được giao sớm nhất</p>
     </div>
   ";
   $tong=$_SESSION['tongtien'];
   foreach($_SESSION['cart'] as $key=>$val){
      $noidung.="<ul>
      <li>".$val['tensanpham']."</li>
      <li>".$val['masp']."</li>
      <li>Giá : ".number_format($val['giasp'],0,',','.').' VND'."</li>
      <li>Số lượng :".$val['soluong']."</li>
      <li>Tổng tiền : ".number_format($tong,0,',','.').' VND'."</li>
      
      
      </ul>";


   }
   $maildathang=$_SESSION['email'];
   // Tạo một đối tượng từ lớp GuiGmail và gọi phương thức đatHang() để gửi email
   $guiEmail = new GuiGmail();
   $guiEmail->DatHang($tieude,$noidung,$maildathang);
}
unset($_SESSION['cart']);
header('Location:camon.php');
ob_end_flush(); 
?>