
<?php
    
     $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
     $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
    
    
?>

<?php
// Kiểm tra và xử lý phần đăng xuất
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
    unset($_SESSION['id_khachhang']);
    unset($_SESSION['email']);
}
?>

<div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang chủ</a></li>
        <?php
        $i = 0;
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
            $i++;
            if ($i < 6) {
                ?>
                <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
            <?php
            }
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
</div>
