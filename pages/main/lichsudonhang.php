<?php
$id_khachhang = $_SESSION['id_khachhang'];
$sql_lietke_donhang = "SELECT * FROM tbl_cart,tbl_dangky,tbl_shipping WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_cart.id_khachhang='$id_khachhang' 
AND tbl_shipping.id_dangky='$id_khachhang'   ORDER BY tbl_cart.id_cart DESC";
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
        text-decoration: none;
        /* Loại bỏ gạch chân */
        border-radius: 4px;

        background-color: green;
        /* Màu nền cho button "Đơn hàng mới" */
        color: #fff;
        /* Màu chữ trắng */
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
            <th>Hình thức</th>

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
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>


                <td><?php echo $row['cart_date']; ?></td>
                <td class="as">
                    <?php if ($row['cart_status'] == 1) {
                        echo 'Đang xử lý';
                    } else {
                        echo 'Đã xử lý';
                    }
                    ?>
                </td>
                <td>


                    <a class="as" href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
                </td>
                <td>
                    <?php
                    if ($row['cart_payment'] == 'tienmat' || $row['cart_payment'] == 'chuyenkhoan') {
                    ?>
                        <?php echo $row['cart_payment']; ?>
                    <?php
                    } else {
                    ?>
                        <a class="as" href="index.php?quanly=lichsu&congthanhtoan=<?php echo $row['cart_payment'] ?>&code=<?php echo $row['code_cart'] ?>"><?php echo $row['cart_payment']; ?></a>
                    <?php
                    }

                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
if (isset($_GET['congthanhtoan'])) {
    $thanhtoan = $_GET['congthanhtoan'];
    $code_cart = $_GET['code'];
    echo '<h4 > Cổng thanh toán : ' . $_GET['congthanhtoan'] . '</h4>';
    if ($thanhtoan == 'momo') {
        $sql_momo = mysqli_query($mysqli, "SELECT * FROM tbl_momo WHERE code_cart='$code_cart' limit 1");
        $row_momo = mysqli_fetch_array($sql_momo);
?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Partner Code</th>
                    <th>Order Id</th>
                    <th>Amount</th>
                    <th>Order Info</th>
                    <th>Order Type</th>
                    <th>Trans Id</th>
                    <th>Pay Type</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row_momo['partnercode']; ?></td>
                    <td><?php echo $row_momo['order_id']; ?></td>

                    <td><?php echo number_format($row_momo['amount'], 0, ',', '.') . 'vnd'; ?></td>
                    <td><?php echo $row_momo['order_info']; ?></td>
                    <td><?php echo $row_momo['order_type']; ?></td>
                    <td><?php echo $row_momo['trans_id']; ?></td>
                    <td><?php echo $row_momo['pay_type']; ?></td>

                </tr>

            </tbody>
        </table>
    <?php
    } else {
        $sql_vnpay = mysqli_query($mysqli, "SELECT * FROM tbl_vnpay WHERE code_cart='$code_cart' limit 1");
        $row_vnpay = mysqli_fetch_array($sql_vnpay);
    ?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Bank Code</th>
                    <th>Bank Tranno</th>
                    <th>Amount</th>
                 
                    <th>Order Info</th>
                    <th>Tmncode</th>
                    <th>Pay Date</th>
                    <th>Transactionno</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row_vnpay['vnp_bankcode']; ?></td>
                    <td><?php echo $row_vnpay['vnp_banktranno']; ?></td>

                    <td><?php echo number_format($row_vnpay['vnp_amount'], 0, ',', '.') . 'vnd'; ?></td>
            
                    <td><?php echo $row_vnpay['vnp_orderInfo']; ?></td>
                    <td><?php echo $row_vnpay['vnp_tmncode']; ?></td>
                    <td><?php echo $row_vnpay['vnp_paydate']; ?></td>
                    <td><?php echo $row_vnpay['vnp_transactionno']; ?></td>

                </tr>

            </tbody>
        </table>
<?php
    }
} ?>