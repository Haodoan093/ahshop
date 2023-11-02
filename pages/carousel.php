<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
  /* CSS cho container chứa các bài viết */
  .product-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap;
    overflow-x: auto;
  }

  /* CSS cho mỗi bài viết */
  .product-card {
    width: calc(25% - 10px);
    margin-right: 10px;
  }

  /* CSS cho thẻ a bên trong .product-card */
  .product-card a {
    color: #000;
    text-decoration: none;
  }

  /* CSS cho thẻ h3 */
  h3 {
    text-align: center; /* Căn giữa theo chiều ngang */
  }
</style>
</head>
<body>
  

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="width: 70%; margin: auto; margin-top: 3%; margin-bottom: 3%;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://pubcdn.ivymoda.com/files/news/2023/10/04/ff74da15a8c24facbaeb14418c38360a.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://pubcdn.ivymoda.com/files/news/2023/10/19/9e3e410ed9963aae6e11288e9712c34d.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://pubcdn.ivymoda.com/files/news/2023/10/17/410c124260c9f30bb988fac6d746c18f.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <div style="width: 100px;">
        <img src="../images/Screenshot 2023-10-18 125927.png" alt="">
    </div>


    <?php
  $sql_bv = "SELECT * FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY id_baiviet DESC";
  $query_bv = mysqli_query($mysqli, $sql_bv);
  ?>
  <h3>LỜI BÀY TỎ TỪ GIÁ TRỊ ĐÍCH THỰC</h3>
  <div class="product-container">
    <?php $i = 0;
    while ($row_bv = mysqli_fetch_array($query_bv)) {
      if ($i < 4) {
        $i++;
    ?>
        <div class="product-card card">
          <a href="index.php?quanly=baiviet&idbaiviet=<?php echo $row_bv['id_baiviet'] ?>">
            <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row_bv['tenbaiviet'] ?></h5>
              <p class="card-text"><?php echo $row_bv['tomtat'] ?></p>
            </div>
          </a>
        </div>
      <?php }
    }
    ?>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>