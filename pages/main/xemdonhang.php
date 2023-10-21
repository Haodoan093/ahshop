<?php
      $sql_donhang= "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham
      AND tbl_cart_details.code_cart='$_GET[code]' ORDER BY tbl_cart_details.id_cart_details DESC";
      $query_donhang = mysqli_query($mysqli,$sql_donhang);
  ?>
 <style>
    /* Reset default margin and padding for better consistency */
    body, h1, p, ul, li {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #fff;
    }

    p {
        font-size: 24px;
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
        color: #333;
    }

    /* Style for the table */
    .styled-table {
        width: 90%;
        margin: 20px auto;
        background-color: #fff;
        border-collapse: collapse;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .styled-table th, .styled-table td {
        padding: 10px;
        border: 1px solid #ddd;
        font-size: 16px;
        text-align: center;
    }

    .styled-table th {
        background-color:#79CDCD;
        color: #333;
    }

    .styled-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Style for the total row */
    .styled-table td[colspan="6"] {
        text-align: right;
        font-weight: bold;
        background-color: #f2f2f2;
    }
</style>


  <p style="color: #fff;">Đơn hàng</p>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
               
              
            </tr>
           
        </thead>
        <tbody>
            <?php
            $i = 0;
            $tongtien=0;
            while ($row = mysqli_fetch_array($query_donhang)) {
                $i++;
                $tongtien+=$row['soluongmua']*$row['giasp'];
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['code_cart']; ?></td>
                <td><?php echo $row['tensanpham']; ?></td>
                <td><img src="admincp\modules\quanlysp\uploads\<?php echo $row['hinhanh'] ?>" width="150px"></td>
                <td><?php echo $row['soluongmua']; ?></td>
                <td> <?php echo number_format($row['giasp'],0,',','.').'VND'?></td>
                <td><?php echo number_format($row['soluongmua']*$row['giasp'],0,',','.').'VND'; ?></td>
              
               
            </tr>
           
            <?php
            }
            ?>
             <tr>
            <td colspan="7">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'VND'; ?></td>
         
            </tr>
        </tbody>
    </table>
