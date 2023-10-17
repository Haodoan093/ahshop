<style>

    /* Add decorative styles to the progress steps */


/* Style the table header and rows */
table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
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

</style>
</style>
<div class="container">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step done "> <span> Giỏ hàng</a></span> </div>

        <div class="step current"> <span>vận chuyển</a></span> </div>
        <div class="step  "> <span>Thanh toán</a><span> </div>
        <div class="step"> <span>Lịch sử đơn hàng</a><span> </div>


    </div>
    <?php
    if (isset($_POST['themvanchuyen'])) {

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky =  $_SESSION['id_khachhang'];
        if (empty($name) || empty($phone) || empty($address) ) {
            echo '<script>alert("Vui lòng điền đầy đủ thông tin");</script>';
        } else {
            $sql_vanchuyen = mysqli_query($mysqli, "INSERT INTO tbl_shipping(name, phone, address, note,id_dangky) VALUES ('$name', '$phone', '$address', '$note','$id_dangky')");
            if ($sql_vanchuyen) {
                echo '<script>alert("Thêm thông tin vận chuyển thành công");</script>';
            }
        }
     } elseif (isset($_POST['capnhatvanchuyen'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky =  $_SESSION['id_khachhang'];
        if (empty($name) || empty($phone) || empty($address) ) {
            echo '<script>alert("Vui lòng điền đầy đủ thông tin");</script>';
        } else {
            // Sửa câu lệnh SQL
            $sql_update_vanchuyen = mysqli_query($mysqli, "UPDATE tbl_shipping SET name='$name', phone='$phone', address='$address', note='$note' WHERE id_dangky='$id_dangky'");
    
            if ($sql_update_vanchuyen) {
                echo '<script>alert("Cập nhật thông tin vận chuyển thành công");</script>';
            } else {
                echo '<script>alert("Có lỗi xảy ra khi cập nhật thông tin vận chuyển");</script>';
            }
        }
    }
    
    
    ?>
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
        <div class="col-md-12">
            <form action="" autocomplete="off" method="POST">
                <div class="form-group">
                    <label for="email">Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Phone</label>
                    <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Address</label>
                    <input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Note</label>
                    <input type="text" name="note" class="form-control">
                </div>
                <?php
                if ($name == '' && $phone == '') {


                ?>
                    <button type="submit" name="themvanchuyen" class="btn btn-primary">Vận chuyển</button>
                <?php
                } else if ($name != '' && $phone != '') {

                ?>
                    <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật vận chuyển</button>
                <?php
                }

                ?>


                
            </form>
        </div>
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
            <style>

            </style>

            <!-- end Responsive Arrow Progress Bar -->
            <!-- <div class="nav clearfix">
      <a href="#" class="prev">Previous</a> |
      <a href="#" class="next pull-right">Next</a>
    </div> -->
    </div>
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
                <?php
                if (isset($_SESSION['dangky'])) { ?>

                    <p><a href="index.php?quanly=thanhtoant">Thanh toán</a></p>
                <?php
                } else {
                ?>
                    <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
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