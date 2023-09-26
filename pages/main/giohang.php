

<p class="tentaikhoan">

   <?php if(isset( $_SESSION['dangky'])){
        echo 'Xin chào : ' . $_SESSION['dangky'];
      
   }


 ?>
</p>
<style>
    .tentaikhoan {
      
      
        top: 20px; /* Đặt khoảng cách từ trên xuống */
        background-color: #008800; /* Đặt màu nền */
        padding: 10px; /* Đặt khoảng cách bên trong */
        border-radius: 5px; /* Đặt góc bo tròn */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Đặt hiệu ứng bóng đổ */
        text-align: center; /* Căn giữa nội dung trong khung */
        font-size: 24px; /* Đặt kích thước font chữ lớn hơn */
        color: #fff; /* Đặt màu chữ */
        cursor: pointer; /* Đổi con trỏ chuột thành bàn tay khi chạm vào */
        transition: background-color 0.3s ease; /* Tạo hiệu ứng chuyển đổi màu nền */
    }

    .tentaikhoan:hover {
        background-color: #002200; /* Đổi màu nền khi di chuột vào */
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }

    .tentaikhoan.animated {
        animation: bounce 1s infinite; /* Tạo hiệu ứng animation */
    }
</style>


<table style="width:100% ;text-align:center;border-collapse:collapse; " border="1">
  <tr>
    <th>ID</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>
    <th>Quản lý</th>
    
  </tr>
 <?php 
   if(isset($_SESSION['cart'])){
      $i=0;
      $tongtien=0;
      foreach($_SESSION['cart'] as $cart_item){
         $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
         $tongtien+=$thanhtien;
         $i++;
         $_SESSION['tongtien']=$tongtien;
 ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $cart_item['masp']; ?></td>
    <td><?php echo $cart_item['tensanpham']; ?></td>
    <td><img width="150px" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']?>" > </td>
    <td>
      <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'];?>"><i class="fa-solid fa-plus"></i></a>
      <?php echo $cart_item['soluong']; ?>
      <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'];?>"><i class="fa-solid fa-minus"></i></a>
   </td>
    <td><?php echo number_format( $cart_item['giasp'],0,',','.'),'vnd'; ?></td>
    <td><?php echo number_format( $thanhtien,0,',','.').'vnd'; ?></td>
    <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'];?>">Xóa</a></td>
  </tr>
  <?php 
      } ?>
      <tr>
         <td colspan="8"><p style="float: left;">Tổng tiền : <?php echo number_format( $tongtien,0,',','.').'vnd'; ?></p>
          
           <p style="float: right;"><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
           <div style="clear:both;" ></div>
           <?php
              if(isset($_SESSION['dangky'])){?>
            
                <p><a href="pages/main/thanhtoan.php">Đặt hàng</a></p>
          <?php
              }else{
                ?>
                <p><a href="index.php?quanly=dangky">Đặt hàng</a></p>
         <?php
              }
           ?>
        
         </td>
      </tr>
    
   <?php
   }else{   ?>
            <tr>
            <td colspan="8"> <p>Hiện tại giỏ hàng trống</p></td>
            </tr>
   
   <?php   } ?>
</table>