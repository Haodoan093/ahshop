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
        width: 80%;
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
        background-color: mediumaquamarine;
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
<?php
 if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('$message');</script>";
}
?> 

<body>
    <table border="1" width="50%" style="border-collapse: collapse;">
        <form name="myForm" method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data" onsubmit="return validateForm()">
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="tensanpham" required></td>
            </tr>
            <tr>
                <td>Mã sản phẩm</td>
                <td><input type="text" name="masp" required></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="giasp" required></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" name="soluong" required></td>
            </tr>
            <tr>
                <td>Giảm giá</td>
                <td><input type="number" name="giamgia" ></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinhanh" ></td>
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td><textarea rows="4" name="tomtat" required></textarea></td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td><textarea rows="4" name="noidung" required></textarea></td>
            </tr>
            <tr>
                <td>Danh mục sản phẩm</td>
                <td>
                    <select name="danhmuc" required>
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Loại hàng</td>
                <td>
                    <select name="loaihang">
                        <option value="1">Mới</option>
                        <option value="0">Giảm giá</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <select name="tinhtrang">
                        <option value="1">Kích hoạt</option>
                        <option value="2">Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
            </tr>
        </form>
    </table>

    <script>
        function validateForm() {
            var tensanpham = document.forms["myForm"]["tensanpham"].value;
            var masp = document.forms["myForm"]["masp"].value;
            var giasp = document.forms["myForm"]["giasp"].value;
            var soluong = document.forms["myForm"]["soluong"].value;
            var hinhanh = document.forms["myForm"]["hinhanh"].value;
            var tomtat = document.forms["myForm"]["tomtat"].value;
            var noidung = document.forms["myForm"]["noidung"].value;
            if ( hinhanh == "" ) {
                alert("Vui long tải hình ảnh !");
                return false;
            }
            if (tensanpham == "" || masp == "" || giasp == "" || soluong == "" || hinhanh == "" || tomtat == "" || noidung == "") {
                alert("Vui lòng nhập đầy đủ tin");
                return false;
            }
          
        }
    </script>
</body>