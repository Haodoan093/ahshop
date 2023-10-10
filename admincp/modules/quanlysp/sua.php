<?php
$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f3f3f3;
        margin: 0;
        padding: 0;
    }

    p {
        font-size: 24px;
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }

    table {
        border-collapse: collapse;
        width: 70%;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table td {
        padding: 10px;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    table input[type="text"],
    table input[type="file"],
    table textarea,
    table select {
        width: 100%;
        padding: 8px;
        margin: 4px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    table img {
        max-width: 150px;
        height: auto;
    }

    table .submit-button-container {
        text-align: center;
    }

    table input[type="submit"] {
        background-color: #ff69b4;
        /* Pink color */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    table input[type="submit"]:hover {
        background-color: #ff1493;
        /* Darker pink color on hover */
        transform: scale(1.05);
    }
</style>


<table class="sua_sanpham" border="1" width=50% style="border-collapse: collapse;">
    <?php
    while ($row = mysqli_fetch_array($query_sua_sp)) {
    ?>
        <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
            <!-- khi gui du lieu dung POST,lay GET -->
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
            </tr>
            <tr>
                <td>Mã sản phẩm</td>
                <td><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
            </tr>

            <tr>
                <td>Danh mục sản phẩm</td>
                <td>
                    <select name="danhmuc">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {


                        ?>
                                <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                            }
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinhanh">
                    <img src="modules\quanlysp\uploads\<?php echo $row['hinhanh'] ?>" width="150px">
                </td>
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td> <textarea rows="100" name="tomtat"> <?php echo $row['tomtat'] ?></textarea></td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td> <textarea rows="100" name="noidung"><?php echo $row['noidung'] ?></textarea></td>
            </tr>

            <tr>
                <td>Tình trạng</td>
                <td>
                    <select name="tinhtrang">
                        <?php
                        if ($row['tinhtrang'] == 1) {

                        ?>
                            <option value="1" selected>Kích hoạt</option>
                            <option value="2">Ẩn</option>
                        <?php
                        } else {


                        ?>
                            <option value="1">Kích hoạt</option>
                            <option value="2" selected>Ẩn</option>
                        <?php
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <!-- nooi hai cot -->
                <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
            </tr>
        </form>

    <?php
    }
    ?>


</table>