<?php

$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);


?>

<?php
// Kiểm tra và xử lý phần đăng xuất
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
    unset($_SESSION['id_khachhang']);
    unset($_SESSION['email']);
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width:100%">
    <a class="navbar-brand" href="index.php"><img src="../images/" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php" style="font-size: 16px; padding-left: 32px;">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item"> <a class="nav-link" href="index.php?quanly=tintuc"style="font-size: 16px; padding-left: 32px;">Tin tức</a></li>
             <li class="nav-item"> <a class="nav-link" href="index.php?quanly=lienhe"style="font-size: 16px; padding-left: 32px;">Liên hệ</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"style="font-size: 16px; padding-left: 32px;">
                    Danh mục sản phẩm
                </a>
                <div class="dropdown-menu">
                    <?php
                    $i = 0;
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        $i++;
                        if ($i < 8) {
                    ?>
                            <a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a>

                    <?php

                        }
                    }
                    ?>


                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?quanly=giohang"style="font-size: 16px; padding-left: 28px;">Giỏ hàng</a>
            </li>
         
                        <?php
                           if (isset($_SESSION['dangky'])) {
                            ?>
                             <li class="nav-item"> <a class="nav-link"href="index.php?quanly=lichsu"style="font-size: 16px; padding-left: 32px;">Lịch sử đơn hàng</a></li>
                        <li class="nav-item"> <a class="nav-link"href="index.php?quanly=thaydoimatkhau"style="font-size: 16px; padding-left: 32px;">Đổi mật khẩu</a></li>
                        <li class="nav-item"> <a class="nav-link"  href="index.php?dangxuat=1"style="font-size: 16px; padding-left: 32px;">Đăng xuất</a></li>

                    <?php
                            } else {
                    ?>
                        <li class="nav-item"> <a class="nav-link"  href="index.php?quanly=dangky"style="font-size: 16px; padding-left: 32px;">Đăng ký</a></li>
                    <?php
                            }
                    ?>
      
        </ul>
        
        <form class="form-inline my-2 my-lg-0"  action="index.php?quanly=timkiem" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="tukhoa" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0"  name="timkiem" type="submit">Search</button>
        </form>
    </div>
</nav>
<!-- <div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang chủ</a></li>
        <?php

        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {

        ?>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
        <?php

        }
        ?>
        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <li><a href="index.php?quanly=tintuc">Tin tức</a></li>
        <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
        <?php
        if (isset($_SESSION['dangky'])) {
        ?>
            <li><a href="index.php?quanly=thaydoimatkhau">Đổi mật khẩu</a></li>
            <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>

        <?php
        } else {
        ?>
            <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
        <?php
        }
        ?>
        <li>
            <form action="index.php?quanly=timkiem" method="POST">
                <div class="search-container">
                    <input type="text" placeholder="Search..." name="tukhoa">
                    <input type="submit" name="timkiem" value="Tìm kiếm">
                </div>
            </form>
        </li>
    </ul>
</div> -->