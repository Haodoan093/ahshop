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
          background-color: #f2f2f2;
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
          background-color: #9c27b0;
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
  </style>
  <table>
      <tr>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Giá sản phẩm</th>
          <th>Số lượng</th>
          <th>Mã sản phẩm</th>
          <th>Danh mục</th>
          <th>Tóm tắt</th>
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
              <td><?php echo $row['masp']; ?></td>
              <td><?php echo $row['tendanhmuc']; ?></td>
              <td><?php echo $row['tomtat'] ?></td>
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