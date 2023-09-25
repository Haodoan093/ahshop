<div id="main">
           <?php
           include("sidebar/sidebar.php") ?>
      
           <div class="maincontent">
                <?php
                    if(isset($_GET['quanly']) ){
                        $tmp=$_GET['quanly'];

                    }else {
                        $tmp ='';
                    }

                    if ($tmp == 'danhmucsanpham') {
                        include("main/danhmuc.php");
                    } elseif($tmp=='danhmucbaiviet') {
                        include("main/danhmucbaiviet.php");

                    } elseif($tmp=='baiviet') {
                        include("main/baiviet.php");

                    }elseif($tmp=='giohang') {
                        include("main/giohang.php");

                    } elseif($tmp=='tintuc') {
                        include("main/tintuc.php");

                    }elseif($tmp=='lienhe') {
                        include("main/lienhe.php");
                    }elseif($tmp=='sanpham') {
                        include("main/sanpham.php");
                    }elseif($tmp=='dangky') {
                        include("main/dangky.php");
                    }elseif($tmp=='thanhtoan') {
                        include("main/thanhtoan.php");
                    }elseif($tmp=='dangnhap') {
                        include("main/dangnhap.php");
                    }elseif($tmp=='timkiem') {
                        include("main/timkiem.php");
                    }elseif($tmp=='thaydoimatkhau') {
                        include("main/thaydoimatkhau.php");
                    }
                    else{
                        include("main/index.php");
                    }
                    
                ?>
           </div>
       </div>