<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php
    $sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
        $goc = $row_chitiet['giasp'] / (1 - $row_chitiet['giamgia'] / 100);
    ?>
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" alt="..." /></div>
                        <div class="col-md-6">

                            <h1 class="display-5 fw-bolder"><?php echo $row_chitiet['tensanpham'] ?></h1>
                            <div class="small mb-1"><?php echo $row_chitiet['masp'] ?></div>
                            <div class="small mb-1">
                                <p>Số lượng : <?php echo $row_chitiet['soluong'] ?></p>
                            </div>
                            <div class="small mb-1">
                                <p>Đã bán : <?php echo $row_chitiet['daban'] ?></p>
                            </div>
                            <div class="fs-5 mb-5">
                                <?php if ($row_chitiet['giamgia'] != 0) {
                                ?>
                                    <span class="text-decoration-line-through"> Giá gốc <?php echo number_format($goc, 0, ',', '.') . 'VND' ?></span><br>

                                <?php
                                }
                                ?>
                                <span>Giá :<?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . ' VND' ?></span>
                            </div>
                            <p class="lead"><?php echo $row_chitiet['noidung'] ?></p>
                            <div class="d-flex">
                                <?php if ($row_chitiet['soluong'] > 0) { ?>

                                    <button name="themgiohang" class="btn btn-outline-dark flex-shrink-0" type="submit">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                    <button name="mua" class="btn btn-outline-dark flex-shrink-0" type="submit">

                                        Mua ngay
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-outline-dark flex-shrink-0" type="button">

                                        Hết hàng
                                    </button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    <?php
    }
    ?>

    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4 text-center">Sản phẩm tương tự</h2>

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham!='$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 4";
                $query_pro = mysqli_query($mysqli, $sql_pro);
                while ($row = mysqli_fetch_array($query_pro)) {
                    $goc = $row['giasp'] / (1 - $row['giamgia'] / 100);
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <img class="card-img-top" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="..." />
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h6 class="fw-bolder"><?php echo $row['tensanpham'] ?></h6>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <?php if ($row['giamgia'] != 0) {
                                    ?>
                                        <span class="text-muted text-decoration-line-through"><?php echo number_format($goc, 0, ',', '.') . 'VND' ?></span><br>
                                    <?php
                                    }
                                    ?>
                                    Giá : <?php echo number_format($row['giasp'], 0, ',', '.') . 'VND' ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row['id_sanpham'] ?>">
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">  <button name="themgiohang" class="btn btn-outline-dark flex-shrink-0" type="submit">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button></div>
                            </div>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

        </div>
    </section>
    <!-- Footer-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>