<style>
    /* Add decorative styles to the progress steps */


    /* Style the table header and rows */
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
        margin-bottom: 10px;
        background-color: #FF5733;
        color: #fff;
        padding: 10px 125px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-momo {
        margin-bottom: 10px;
        background-color: #F08080;
        color: #fff;
        padding: 10px 20px;
        /* Reduced padding for a more compact button */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        /* Uppercase text */
        transition: background-color 0.3s;
        /* Add a smooth transition effect for the background color */
    }

    /* Optional: Add hover effect to change background color on hover */
    .btn-momo:hover {
        background-color: #EEB4B4;
        /* Change to a slightly different color on hover */
    }


    /* Optional: Increase the bottom margin for better spacing between buttons */
    .btn-momo+.btn-momo {
        margin-top: 10px;
    }


    .btn.btn-danger:hover {
        background-color: #FF3C00;
    }
</style>
<div class="container">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">


        <div class="step done"> <span>Giỏ hàng</a></span> </div>

        <div class="step done"> <span>vận chuyển</a></span> </div>
        <div class="step current"> <span>Thanh toán</a><span> </div>
        <div class="step"> <span>Lịch sử đơn hàng</a><span> </div>

    </div>

    <form action="pages/main/xulythanhtoan.php" method="POST">
        <div class="row">
            <?php
            $id_dangky =  $_SESSION['id_khachhang'];
            $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
            $count = mysqli_num_rows($sql_get_vanchuyen);

            // Kiểm tra và lấy thông tin vận chuyển
            if ($count > 0) {
                $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
                $name = $row_get_vanchuyen['name'];
                $phone = $row_get_vanchuyen['phone'];
                $address = $row_get_vanchuyen['address'];
                $note = $row_get_vanchuyen['note'];
            } else {
                // Nếu không tìm thấy dữ liệu vận chuyển
                $name = "";
                $phone = "";
                $address = "";
                $note = "";
            }

            ?>
            <div class="col-md-8">
                <h4>Thông tin</h4>
                <ul>
                    <li>Name : <b><?php echo $name; ?></b></li>
                    <li>Phone : <b><?php echo $phone; ?></b></li>
                    <li>Address : <b><?php echo $address; ?></b></li>
                    <li>Note : <b><?php echo $note; ?></b></li>
                </ul>
                <table style="width:100% ;text-align:center;border-collapse:collapse; " border="1">
                    <tr>
                        <th>ID</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>

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

                            </tr>
                        <?php
                        } ?>
                        <tr>
                            <td colspan="8">
                                <p style="float: left;">Tổng tiền : <?php echo number_format($tongtien, 0, ',', '.') . 'vnd'; ?></p>


                                <div style="clear:both;"></div>

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
            <style>
                .col-md-4.hinhthucthanhtoan .form-check {
                    margin: 11px;
                }
            </style>


            <div class="col-md-4 hinhthucthanhtoan">
                <h4>Phương thức thanh toán</h4>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Thanh toán khi nhận hàng
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios5" value="chuyenkhoan">
                    <label class="form-check-label" for="exampleRadios5">
                        Chuyển khoản
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" 0 id="exampleRadios3" value="vnpay">
                    <img src="images/vnpay.jpg" height="40" width="40" alt="">
                    <label class="form-check-label" for="exampleRadios3">
                        VNpay
                    </label>
                </div>
    </form>

   
    <p>Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'vnd'; ?></p>
    <input type="submit" value="Thanh toán ngay" name="redirect" id="redirect" class="btn btn-danger">
    <div id="paypal-button-container"></div>
    <p id="result-message"></p>


    <img src="images/momo.jpg" height="40" width="40" alt="">
    <form class="" action="pages/main/xulythanhtoanmomo.php" method="POST" target="_blank" enctype="application/x-www-form-urlencoded">

        <input type="submit" value="Thanh toán MOMO QRCODE" name="momo" class="btn-momo">

    </form>

    <form class="" action="pages/main/xulythanhtoanmomo_atm.php" method="POST" target="_blank" enctype="application/x-www-form-urlencoded">

        <input type="submit" value="Thanh toán MOMO ATM" name="momo" class="btn-momo">

    </form>
</div>
</div>

</div>