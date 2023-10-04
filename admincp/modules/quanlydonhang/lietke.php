<?php
      $sql_lietke_donhang= "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
      $query_lietke_donhang = mysqli_query($mysqli,$sql_lietke_donhang);
  ?>
 
 <style>
        /* Reset default margin and padding for better consistency */
        body, h1, h2, p, ul, li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }

        p {
            font-size: 24px;
            text-align: center;
            margin-top: 20px;
            font-weight: bold; /* Make text bold */
        }

        /* Style for the table */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .styled-table th, .styled-table td {
            padding: 15px; /* Increase padding for better spacing */
            border: 1px solid #ddd;
            font-size: 18px; /* Increase font size */
            text-align: center; /* Center align all cells */
        }

        .styled-table th {
            background-color: #f2f2f2;
        }

        /* Style for edit and delete links */
        .edit-link, .delete-link {
            display: inline-block;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
        }

        .edit-link {
            background-color: #800080; /* Purple for edit */
            color: #fff;
            margin-right: 10px;
        }

        .edit-link:hover {
            background-color: #4b004b; /* Darker purple on hover */
        }

        .delete-link {
            background-color: #000; /* Black for delete */
            color: #fff;
        }

        .delete-link:hover {
            background-color: #333; /* Darker black on hover */
        }

        /* Center "Quản lý" column */
        .center-column {
            text-align: center;
        }
 </style>
  <p>Danh sách đơn hàng</p>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Tình trạng</th>
                <th>Ngày đặt</th>
                <th>Quản lý</th>
                <th>In đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_donhang)) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['code_cart']; ?></td>
                <td><?php echo $row['tenkhachhang']; ?></td>
                <td><?php echo $row['diachi']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['dienthoai']; ?></td>
                <td><?php if($row['cart_status']==1){
                          echo '<a href="modules/quanlydonhang/xuly.php?cart_status=0&code='.$row['code_cart'].'">Đơn hàng mới</a>';
                       } else {
                        echo ' <a href="">Đã xử lý</a>';}
                    
                    ?></td>
                    <td><?php echo $row['cart_date']; ?></td>
                <td>
                   
                 
                    <a class="" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
                </td>
                <td>
             
                 
                   <a class="" href="modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_cart'] ?>">In đơn hàng</a>
               </td>
            </tr>
            <?php
            }
            ?>
        </tbody> 
    </table>
