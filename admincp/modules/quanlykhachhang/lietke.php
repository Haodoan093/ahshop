<?php
    $sql_lietke_user = "SELECT * FROM tbl_dangky ORDER BY id_dangky ASC";
    $query_lietke_user = mysqli_query($mysqli, $sql_lietke_user);
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
  </style>
  <table>
      <tr>
          <th>ID</th>
          <th>Tên khách hàng</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th>Mật khẩu</th>
          <th>Địa chỉ</th>
        
          <th>Quản lý</th>
      </tr>
      <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_user)) {
            $i++;
        ?>
          <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row['tenkhachhang']; ?></td>
              <!-- <td><img src="modules\quanlysp\uploads\<?php echo $row['hinhanh'] ?>" width="150px"></td> -->
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['dienthoai'] ?></td>
              <td><?php echo $row['matkhau'] ?></td>
              <td><?php echo $row['diachi']; ?></td>
              
              <td>
                  <a class="edit-button" href="?action=quanlykhachhang&query=xem&idkhachhang=<?php echo $row['id_dangky'] ?>">Xem</a>
                  <a class="delete-button" href="modules\quanlykhachhang\xuly.php?idkhachhang=<?php echo $row['id_dangky'] ?>">Xóa</a>
              </td>
          </tr>
      <?php
      
        }
        ?>
  </table>