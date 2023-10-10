
<style>
    /* Reset default margin and padding for better consistency */
    body,
    h1,
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
    }

    /* Style for the table */
    table {
        border-collapse: collapse;
        width: 100%;
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

    /* Style for the submit button */
    table input[type="submit"] {
        background-color: #28a745;
        /* Green color for the button */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        /* Smooth transition for background color and transform */
    }

    table input[type="submit"]:hover {
        background-color: #218838;
        /* Darker green color on hover */
        transform: scale(1.05);
        /* Slightly scale up the button on hover */
    }
</style>

<table border="1" width=50% style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
        <!-- khi gui du lieu dung POST,lay GET -->
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="masp"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="giasp"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td> <textarea rows="100" name="tomtat"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td> <textarea rows="100" name="noidung"></textarea></td>
        </tr>

        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                    <?php
                    }
                    ?>
            </td>
        </tr>

        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <option value="1">Kích hoạt</option>
                    <option value="2">Ẩn</option>
            </td>
        </tr>
        <tr>
            <!-- nooi hai cot -->
            <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </form>




</table>