  <?php
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham ASC";
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
    ?>
  <style>
      table {
          width: 90%;
          border-collapse: collapse;
          margin: 20px auto;
      }

      table,
      th,
      td {
          border: 1px solid #333;
      }

      th,
      td {
          padding: 10px;
          /* Tăng độ dày của ô hiển thị nội dung */
          text-align: center;
          /* Căn giữa văn bản */
      }

      th {
          background-color: #555555;
          color: #fff;
      }

      img {
          max-width: 150px;
          height: auto;
      }

      .edit-button,
      .delete-button {
          display: inline-block;
          padding: 5px 10px;
          border: none;
          cursor: pointer;
          text-align: center;
          text-decoration: none;
          margin: 5px;
          border-radius: 5px;
          font-weight: bold;
      }

      .edit-button {
          background-color: #4CAF50;
          color: white;
      }

      .delete-button {
          background-color: darkturquoise;
          color: white;
      }

      .edit-button:hover,
      .delete-button:hover {
          transform: scale(1.1);
          transition: transform 0.2s;
      }

      /* Định dạng văn bản */
      .product-info {
          font-weight: bold;
      }

      /* Định dạng trạng thái */
      .status-active {
          color: #008000;
      }

      .status-hidden {
          color: #FF0000;
      }
      .button-container {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
    margin-right: 50px;
  }
  .loc {
    display: flex;
    /* Sử dụng flexbox để xếp hàng ngang */
    margin-bottom: 20px;
    margin-left: 60px;
  }
  .dropdown-menu li {
  background-color: #555555; /* Đặt màu nền theo ý muốn */
}
.dropdown-menu a {
  color: #fff; /* Đặt màu chữ theo ý muốn */
}

  </style>
  
  <div class="button-container">
      <a class="edit-button" href="?action=quanlysanpham&query=themsp">Thêm sản phẩm</a>
  </div>
  <div class="loc">
  <div class="dropdown text-end">
    <button class="btn btn-secondary bg-white dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Giá
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" name="tangdan" href="?sapxep=0&trang=<?php echo $t ?>">Tăng dần</a></li>
      <li><a class="dropdown-item" name="giamdan" href="?sapxep=1&trang=<?php echo $t ?>">Giảm dần</a></li>
      <li><a class="dropdown-item" name="giamdan" href="?">Bỏ sắp xếp</a></li>
    </ul>
  </div>

  <div class="dropdown-center text-end">
    <button class="btn btn-secondary bg-white dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Tình trạng
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" name="tinhtrang" href="?tinhtrang=1&trang=<?php echo $t ?>">Mới</a></li>
      <li><a class="dropdown-item" name="tinhtrang" href="?tinhtrang=0&trang=<?php echo $t ?>">Giảm giá</a></li>
      <li><a class="dropdown-item" name="tinhtrang" href="?">Tất cả</a></li>
    </ul>
  </div>
 
  <div class="dropdown-center text-end">
    <button class="btn btn-secondary bg-white dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Bán chạy
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" name="tinhtrang" href="?tinhtrang=1&trang=<?php echo $t ?>">Bán chạy nhất</a></li>
      
      <li><a class="dropdown-item" name="tinhtrang" href="?">Tất cả</a></li>
    </ul>

  </div>

</div>

  <table>
      <tr>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Giá sản phẩm</th>
          <th>Số lượng</th>
          <th>Giảm giá</th>
          <th>Đã bán</th>
          <th>Mã sản phẩm</th>
          <th>Danh mục</th>
          <th>Tóm tắt</th>
          <th>Loại hàng</th>
          <th>Trạng thái</th>
          <th>Quản lý</th>
      </tr>
      <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_sp)) {
            $i++;
        ?>
          <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row['tensanpham']; ?></td>
              <td><img src="modules\quanlysp\uploads\<?php echo $row['hinhanh'] ?>" width="150px"></td>
              <td><?php echo $row['giasp']; ?></td>
              <td><?php echo $row['soluong'] ?></td>
              <td><?php echo $row['giamgia'] . '%' ?></td>
              <td><?php echo $row['daban']; ?></td>
              <td><?php echo $row['masp']; ?></td>
              <td><?php echo $row['tendanhmuc']; ?></td>
              <td><?php echo $row['tomtat'] ?></td>
              <td><?php echo $row['loaihang'] == 1 ? "Mới" : "Giảm giá"; ?></td>
              <td><?php echo $row['tinhtrang'] == 1 ? "Kích hoạt" : "Ẩn"; ?></td>
              <td>
                  <a class="edit-button" href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
                  <a class="delete-button" href="modules\quanlysp\xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a>
              </td>
          </tr>
      <?php

        }
        ?>
  </table>