<div class="clear"></div>
<div class="main">
                <?php
                    if(isset($_GET['action']) && $_GET['query']){
                        $tmp=$_GET['action'];
                        $query=$_GET['query'];

                    }else {
                        $tmp ='';
                        $query='';
                    }

                    if ($tmp == 'quanlydanhmucsanpham' && $query=='them'){
                        //them danh muc san pham
                        include("modules/quanlydanhmucsp/them.php");
                        include("modules/quanlydanhmucsp/lietke.php");
                    }
                    elseif ($tmp == 'quanlydanhmucsanpham' && $query=='sua'){
                        //sua danh muc san pham
                        include("modules/quanlydanhmucsp/sua.php");
                     
                    }
                    elseif ($tmp == 'quanlysanpham' && $query=='them'){
                        //them san pham
                        include("modules/quanlysp/them.php");
                        include("modules/quanlysp/lietke.php");
                    }  elseif ($tmp == 'quanlysanpham' && $query=='sua'){
                        //them san pham
                        include("modules/quanlysp/sua.php");
        
                    } elseif ($tmp == 'quanlydonhang' && $query=='lietke'){
                        //them san pham
                        include("modules/quanlydonhang/lietke.php");
        
                    }
                    elseif ($tmp == 'donhang' && $query=='xemdonhang'){
                      
                        include("modules/quanlydonhang/xemdonhang.php");
        
                    }
                    //danh muc
                    elseif ($tmp == 'quanlydanhmucbaiviet' && $query=='them'){
                      
                        include("modules/quanlydanhmucbaiviet/them.php");
                        include("modules/quanlydanhmucbaiviet/lietke.php");
        
                    }
                    elseif ($tmp == 'quanlydanhmucbaiviet' && $query=='sua'){
                      
                        include("modules/quanlydanhmucbaiviet/sua.php");
                      
                    }
                    //bai viet
                    elseif ($tmp == 'quanlybaiviet' && $query=='them'){
                      
                        include("modules/quanlybaiviet/them.php");
                        include("modules/quanlybaiviet/lietke.php");
        
                    }
                    elseif ($tmp == 'quanlybaiviet' && $query=='sua'){
                      
                        include("modules/quanlybaiviet/sua.php");
                      
                    }
                    elseif ($tmp == 'quanlyweb' && $query=='capnhat'){
                      
                        include("modules/thongtinweb/quanly.php");
                      
                    }
                    else{
                        include("modules/dashboard.php");
                    }
                    
                ?>
</div>
