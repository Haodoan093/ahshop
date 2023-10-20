<style>
  /* Định dạng thanh tiêu đề tên tài khoản */
  .tentaikhoan {
    background-color: #008800;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .tentaikhoan:hover {
    background-color: #002200;
  }



  table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
  }

  table,
  th,
  td {
    border: 1px solid #ccc;
  }

  th,
  td {
    padding: 10px;
  }

  th {
    background-color: #000;
    color: #fff;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:nth-child(odd) {
    background-color: #fff;
  }

  /* Style the payment options */
  .form-check {
    margin-bottom: 10px;
  }

  .form-check-label {
    font-weight: bold;
  }

  /* Style the submit button */
  .btn.btn-danger {
    background-color: #FF5733;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
  }

  .btn.btn-danger:hover {
    background-color: #FF3C00;
  }



  /* Định dạng nút "Mua" */
  .mua-button {
    background-color: #008800;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 50%;
    /* Biến đổi thành hình nút tròn */
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .mua-button:hover {
    background-color: #002200;
  }

  /* Định dạng nút "Xóa" */
  .xoa-button {
    background-color: #ff0000;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 50%;
    /* Biến đổi thành hình nút tròn */
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .xoa-button:hover {
    background-color: #cc0000;
  }

  /* Định dạng nút "Xóa tất cả" */
  .xoa-tat-ca-button {
    background-color: #ff0000;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 50%;
    /* Biến đổi thành hình nút tròn */
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  a {
    text-decoration: none;
  }

  .xoa-tat-ca-button:hover {
    background-color: #cc0000;
  }
</style>
<div class="container">
  <?php 
if(isset($_SESSION['id_khachhang'])){
?>
  <div class="row">
    <div class="col-md-12">
      <div class="arrow-steps clearfix">
        <div class="step current"> <span>Giỏ hàng</a></span> </div>
        <div class="step"> <span>vận chuyển</span> </div>
        <div class="step"> <span>Thanh toán</a><span> </div>
        <div class="step"> <span>Lịch sử đơn hàng</a><span> </div>
      </div>
    </div>
    <?php } ?>
    <p class="tentaikhoan" class="col-md-12">
      <?php if (isset($_SESSION['dangky'])) {
        echo 'Xin chào : ' . $_SESSION['dangky'];
      } ?>
    </p>
    <div class="col-md-12">
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
        if (isset($_SESSION['cart'])) {
          $i = 0;
          $tongtien = 0;
          foreach ($_SESSION['cart'] as $cart_item) {
            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
            $tongtien += $thanhtien;
            $i++;
            $_SESSION['tongtien'] = $tongtien;
        ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $cart_item['masp']; ?></td>
              <td><?php echo $cart_item['tensanpham']; ?></td>
              <td><img width="150px" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>"> </td>
              <td>
                <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']; ?>"><i class="fa-solid fa-plus"></i></a>
                <?php echo $cart_item['soluong']; ?>
                <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']; ?>"><i class="fa-solid fa-minus"></i></a>
              </td>
              <td><?php echo number_format($cart_item['giasp'], 0, ',', '.'), 'vnd'; ?></td>
              <td><?php echo number_format($thanhtien, 0, ',', '.') . 'vnd'; ?></td>
              <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']; ?>">Xóa</a></td>
            </tr>
          <?php
          } ?>
          <tr>
            <td colspan="8">
              <p style="float: left;">Tổng tiền : <?php echo number_format($tongtien, 0, ',', '.') . 'vnd'; ?></p>

              <p style="float: right;"><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
              <div style="clear:both;"></div>
              <?php
              if (isset($_SESSION['dangky'])) { ?>

                <p><a href="index.php?quanly=vanchuyen">Mua</a></p>
                <!-- <p><a href="pages/main/thanhtoan.php">Hình thức vận chuyển</a></p> -->
              <?php
              } else {
              ?>
                <p><a href="index.php?quanly=dangky">Đăng ký </a></p>
              <?php
              }
              ?>

            </td>
          </tr>

        <?php
        } else {   ?>
          <tr>
            <td colspan="8">
              <p>Hiện tại giỏ hàng trống</p>
            </td>
          </tr>

        <?php   } ?>
      </table>
    </div>
  </div>
</div>