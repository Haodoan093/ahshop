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
                    include("shop/dist/sanpham.php");
                } elseif ($tmp == 'dangky') {
                    header("Location: pages/main/dangky.php");
                    exit;
                } elseif ($tmp == 'quenmatkhau') {
                
                    header("Location: pages/main/quenmatkhau.php");
                    exit;
                } elseif ($tmp == 'matkhaumoi') {
                   // include("main/matkhaumoi.php");
                    header("Location: pages/main/matkhaumoi.php");
                    exit;
                } elseif ($tmp == 'thanhtoan') {
                    include("main/thanhtoan.php");
                } elseif ($tmp == 'dangnhap') {
                    include("main/dangnhap.php");
                } elseif ($tmp == 'timkiem') {
                    include("main/timkiem.php");
                } elseif ($tmp == 'thaydoimatkhau') {
                   include("main/thaydoimatkhau.php");
                  
                } elseif ($tmp == 'thongtincanhan') {
                    include("main/thongtinuser.php");
                   
                 
                
                } elseif ($tmp == 'lichsu') {
                    include("main/lichsudonhang.php");
                   
                 
                } elseif ($tmp == 'xemdonhang') {
                    include("main/xemdonhang.php");
                }elseif ($tmp == 'vanchuyen') {
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