<?php
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
    unset($_SESSION['dangnhap']);
    header('Location: login.php');
}
?>

<style>
    .admincp_list {
        list-style-type: none;
        margin: 0;
        padding: 0;
        background-color: #333;
        overflow: hidden;
        /* Clear floats */
    }

    .admincp_list li {
        float: left;
    }

    .admincp_list li a {
        text-decoration: none;
        color: #fff;
        display: block;
        padding: 12px 24px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .admincp_list li a:hover {
        background-color: #555;
        color: #ff6600;
    }

    /* Style for the "Đăng xuất" link */
    .admincp_list .logout-link {
        float: right;
        background-color: #ff6600;
    }

    .admincp_list .logout-link a:hover {
        background-color: #ff3300;
    }
</style>

<ul class="admincp_list">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
    <li><a href="index.php?action=quanlysanpham&query=them ">Quản lý sản phẩm</a></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet&query=them ">Quản lý danh mục bài viết</a></li>
    <li><a href="index.php?action=quanlybaiviet&query=them ">Quản lý bài viết</a></li>

    <li><a href="index.php?action=quanlydonhang&query=lietke ">Quản lý đơn hàng</a></li>
    <li><a href="index.php?action=dangxuat ">Đăng xuất</a></li>

    <li>
        <form action="index.php?action=quanlydonhang&query=timkiem" method="POST">
            <div class="search-container">
                <input type="text" placeholder="Search..." name="tukhoa">
                <input type="submit" name="timkiem" value="Tìm kiếm">
            </div>
        </form>
    </li>


</ul>