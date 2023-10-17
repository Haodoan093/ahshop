<?php
$sql_lietke_donhang = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
$query_lietke_donhang = mysqli_query($mysqli, $sql_lietke_donhang);
?>
<style>
    /* Reset default margin and padding for better consistency */
    body,
    h1,
    h2,
    p,
    ul,
    li {
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
        font-weight: bold;
        color: #333;
    }

    /* Style for the table */
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        /* Viền bảng */
    }

    .styled-table th,
    .styled-table td {
        padding: 15px;
        border: 1px solid #ddd;
        font-size: 14px;
        text-align: center;
    }

    .styled-table th {
        background-color: #555555;
        color: #fff;
    }

    /* Style for edit and delete buttons */
    .edit-button,
    .delete-button {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
        transition: background-color 0.3s ease, color 0.3s ease;
        color: #fff;
        margin-right: 10px;
    }

    .edit-button {
        background-color: #800080;
        /* Màu nền cho button "Sửa" */
    }

    .edit-button:hover {
        background-color: #4b004b;
    }

    .as {

        text-decoration: none;
        color: green;
    }

    .delete-button:hover {
        background-color: #333;
    }

    /* Center "Quản lý" column */
    .center-column {
        text-align: center;
    }
    .button-style {
    display: inline-block;
    padding: 3px 10px;
    text-align: center;
    text-decoration: none; /* Loại bỏ gạch chân */
    border-radius: 4px;
   
    background-color: green; /* Màu nền cho button "Đơn hàng mới" */
    color: #fff; /* Màu chữ trắng */
    transition: background-color 0.3s ease, color 0.3s ease;
    margin-right: 6px;
}

.button-style:hover {
    background-color: #4b004b;
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
           
            <th>Ngày đặt</th>
            <th>Tình trạng</th>
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
               

                <td><?php echo $row['cart_date']; ?></td>
                <td class="as">
                    <?php if ($row['cart_status'] == 1) {
                        echo '<a class="button-style" href="modules/quanlydonhang/xuly.php?cart_status=0&code=' . $row['code_cart'] . '">Đơn hàng mới</a>';
                    } else {
                        echo ' <a class="button-style" href="">Đã xử lý</a>';
                    }
                    ?>
                </td>
                <td>


                    <a class="as" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
                </td>
                <td>


                    <a class="as" href="modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_cart'] ?>">In đơn hàng</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>