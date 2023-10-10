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
        text-align: center;
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
    
</style>
<nav>
    <div class="h1">

        <div class="avatar">
            <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/369091312_803132351601523_5195796201063561121_n.jpg?stp=dst-jpg_p206x206&_nc_cat=102&ccb=1-7&_nc_sid=aee45a&_nc_ohc=K0Ca2f1ISk4AX87YSMM&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdQ4DuadVOtyeisKEy3pKv_YM6exFI3agoneLiQ8UVxJCA&oe=654BC799"
                alt="Avatar">
        </div>
        
        <h2 class="animate__animated animate__bounce" style="font-size:23px;padding-left:15px;padding-top:10px">Admin
        </h2>
    </div>
    <ul class="admincp_list">

        <li><a href="index.php">Thống kê</a></li>
        <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Danh mục sản phẩm</a></li>
        <li><a href="index.php?action=quanlysanpham&query=them ">Sản phẩm</a></li>
        <li><a href="index.php?action=quanlydanhmucbaiviet&query=them ">Danh mục bài viết</a></li>
        <li><a href="index.php?action=quanlybaiviet&query=them ">Bài viết</a></li>

        <li><a href="index.php?action=quanlydonhang&query=lietke ">Đơn hàng</a></li>
        <li><a href="index.php?action=quanlyweb&query=capnhat ">Quản lý Website</a></li>
        <li><a href="index.php?action=dangxuat ">Đăng xuất</a></li>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    </ul>
</nav>