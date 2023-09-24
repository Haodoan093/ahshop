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
                    else{
                        include("modules/dashboard.php");
                    }
                    
                ?>
</div>
