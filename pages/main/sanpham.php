<p></p>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <style>
        .anhsp img {
            width: 400px;

        }
    </style>
    <div class="wrapper_chitiet">
        <div class="hinhanh_sanpham">
            <img class="anhsp" width="400px" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">

        </div>

        <div class="chitiet_sanpham" style="color:black;">
            <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                <h3>Tên : <?php echo $row_chitiet['tensanpham'] ?></h3>
                <p>Mã : <?php echo $row_chitiet['masp'] ?></p>
                <p>Giá : <?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . ' VND' ?></p>

                <p>Số lượng : <?php echo $row_chitiet['soluong'] ?></p>
                <p>Đã bán : <?php echo $row_chitiet['daban'] ?></p>
                <p>Danh muc : <?php echo $row_chitiet['tendanhmuc'] ?></p>
                <!-- <p> <?php echo $row_chitiet['tomtat'] ?></p>
                <p> <?php echo $row_chitiet['noidung'] ?></p> -->
                <?php if ($row_chitiet['soluong'] > 0) { ?>
                    <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
                    <p><input class="themgiohang" name="mua" type="submit" value="Mua"></p>
                <?php
                }else {
                ?>
                <p><input class="themgiohang" name="" type="" value="Hết hàng"></p>

                  <?php
                }
                ?>
                <div class="clear">
                    <div class="tabs">
                        <ul id="tabs-nav">
                            <li><a href="#tab1">Thông số</a></li>
                            <li><a href="#tab2">Nội dung chi tiết</a></li>
                            <li><a href="#tab3">Hình ảnh</a></li>

                        </ul> <!-- END tabs-nav -->
                        <div id="tabs-content">
                            <div id="tab1" class="tab-content">
                                <?php echo $row_chitiet['tomtat'] ?>
                            </div>
                            <div id="tab2" class="tab-content">
                                <?php echo $row_chitiet['noidung'] ?>
                            </div>
                            <div id="tab3" class="tab-content">
                                <img width="45%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
                                <img width="45%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
                            </div>

                        </div> <!-- END tabs-content -->
                    </div> <!-- END tabs -->
                </div>
            </form>
        </div>

    </div>


<?php
}
?>