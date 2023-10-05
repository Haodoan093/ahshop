<div id="main">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <?php
            include("sidebar/sidebar.php") ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="maincontent">
                <?php
                if (isset($_GET['quanly'])) {
                    $tmp = $_GET['quanly'];
                } else {
                    $tmp = '';
                }

                if ($tmp == 'danhmucsanpham') {
                    include("main/danhmuc.php");
                } elseif ($tmp == 'giohang') {
                    include("main/giohang.php");
                } elseif ($tmp == 'tintuc') {
                    include("main/tintuc.php");
                } elseif ($tmp == 'danhmucbaiviet') {
                    include("main/danhmucbaiviet.php");
                } elseif ($tmp == 'baiviet') {
                    include("main/baiviet.php");
                } elseif ($tmp == 'lienhe') {
                    include("main/lienhe.php");
                } elseif ($tmp == 'sanpham') {
                    include("main/sanpham.php");
                } elseif ($tmp == 'dangky') {
                    include("main/dangky.php");
                } elseif ($tmp == 'quenmatkhau') {
                    include("main/quenmatkhau.php");
                } elseif ($tmp == 'matkhaumoi') {
                    include("main/matkhaumoi.php");
                } elseif ($tmp == 'thanhtoan') {
                    include("main/thanhtoan.php");
                } elseif ($tmp == 'dangnhap') {
                    include("main/dangnhap.php");
                } elseif ($tmp == 'timkiem') {
                    include("main/timkiem.php");
                } elseif ($tmp == 'thaydoimatkhau') {
                    include("main/thaydoimatkhau.php");
                } elseif ($tmp == 'vanchuyen') {
                    include("main/vanchuyen.php");
                } elseif ($tmp == 'thanhtoant') {
                    include("main/thongtinthanhtoan.php");
                } elseif ($tmp == 'donhangdadat') {
                    include("main/donhangdadat.php");
                } else {
                    include("main/index.php");
                }

                ?>
            </div>
        </div>
    </div>
</div>