<?php
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
    unset($_SESSION['dangnhap']);
    header('Location: login.php');
}
?>

<style>
    nav {
        width: 200px;
        height: 100%;
        background-color: #000;
        position: fixed
    }
    .admincp_list {
        margin: 0px;
        padding: 0px;
    }

   

    ul {
        background-color: #222;
        /* text-align: center; */
        height: 100%;

    }

    .admincp_list li a {
        font-size: 16px;
        text-decoration: none;
        color: white;
        display: block;
        padding: 22px 22px;
        transition: background-color 0.3s ease, color 0.3s ease;
        width: 100%;
    }

    .admincp_list li a:hover {
        background-color: #fff;
        color: #000;
    }

    /* Style for the "Đăng xuất" link */
    .admincp_list .logout-link {
        float: right;
        background-color: #ff6600;
    }

    .admincp_list .logout-link a:hover {
        background-color: #ff3300;
    }

    .h1 {
        display: flex;
        color: white;
        padding-left: 5px;
        padding-top: 20px;

    }

    .avatar img {
        width: 50px;
        height: 50px;
        margin-left: 15px;
        overflow: hidden;
        border-radius: 50%;
        /* Đảm bảo hình ảnh không vượt ra khỏi khung tròn */
    }
    .menu{ 
       padding-left: 0 !important;
       padding-right: 0 !important;
    }
    .icon{
        margin-right: 20px;
        margin-left: 5px;
    }
</style>
<nav>
    <div class="h1">

        <div class="avatar">
            <img src="https://images.pexels.com/photos/18749414/pexels-photo-18749414.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="Avatar">
        </div>
        
        <h2 class=" " style="font-size:23px;padding-left:15px;padding-top:10px">Admin
        </h2>
    </div>
    <ul class="admincp_list">

        <li><a class="menu" href="index.php"><i class="fa-solid fa-chart-line icon"></i>Thống kê</a></li>
        <li><a class="menu" href="index.php?action=quanlydanhmucsanpham&query=them"><i class="fa-solid fa-shop icon"></i>Danh mục sản phẩm</a></li>
        <li><a class="menu"  href="index.php?action=quanlysanpham&query=them "><i class="fa-solid fa-shirt icon"></i>Sản phẩm</a></li>
        <li><a class="menu"  href="index.php?action=quanlydanhmucbaiviet&query=them "><i class="fa-solid fa-rectangle-list icon"></i>Danh mục bài viết</a></li>
        <li><a class="menu"  href="index.php?action=quanlybaiviet&query=them "><i class="fa-solid fa-book icon"></i>Bài viết</a></li>

        <li><a class="menu"  href="index.php?action=quanlykhachhang&query=xemkhachhang "><i class="fa-regular fa-user icon"></i></i>Khách hàng</a></li>

        <li><a class="menu"  href="index.php?action=quanlydonhang&query=lietke "><i class="fa-solid fa-cube icon"></i>Đơn hàng</a></li>
        <li><a class="menu"  href="index.php?action=quanlyweb&query=capnhat "><i class="fa-solid fa-phone-volume icon"></i>Quản lý Website</a></li>
        <li><a class="menu" href="index.php?action=dangxuat "><i class="fa-solid fa-arrow-right-from-bracket icon"></i>Đăng xuất</a></li>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    </ul>
</nav>
