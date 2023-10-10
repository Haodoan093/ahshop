<?php
$sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_danhmucbaiviet.id_danhmucbaiviet ORDER BY id_baiviet ASC";
$query_lietke_bv = mysqli_query($mysqli, $sql_lietke_bv);
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
        background-color: #f2f2f2;
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
        background-color: #9c27b0;
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

    .text p {
        font-size: 14px;
    }

    .text {
        font-size: 14px;
    }
</style>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên bài viết</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Tóm tắt</th>
            <th>Trạng thái</th>
            <th>Quản lý</th>
        </tr>
    </thead>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_bv)) {
        $i++;
        ?>
        <tbody>
            <tr>
                <td>
                    <?php echo $i ?>
                </td>
                <td class="text">
                    <?php echo $row['tenbaiviet']; ?>
                </td>
                <td><img style="with:200px; height:100px" src="modules\quanlybaiviet\uploads\<?php echo $row['hinhanh'] ?>"
                        width="150px"></td>
                <td class="text" style="font-size:14px">
                    <?php echo $row['tendanhmuc_baiviet']; ?>
                </td>
                <td class="text" style="font-size:14px">
                    <?php echo $row['tomtat'] ?>
                </td>
                <td class="text">
                    <?php echo $row['tinhtrang'] == 1 ? "Kích hoạt" : "Ẩn"; ?>
                </td>
                <td>
                    <a class="btn btn-success"
                        href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a>
                    <a class="btn btn-danger"
                        href="modules\quanlybaiviet\xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>">Xóa</a>
                </td>
            </tr>
        </tbody>
        <?php
    }
    ?>
</table>