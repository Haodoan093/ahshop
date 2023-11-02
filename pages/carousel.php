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
    margin-bottom: 20px;
   
    font-size: 32px;
    text-align: center; /* Căn giữa theo chiều ngang */
  }
  .pic-ctn {
  width: 100vw;
  height: 200px;
}

@keyframes display {
  0% {
    transform: translateX(200px);
    opacity: 0;
  }
  10% {
    transform: translateX(0);
    opacity: 1;
  }
  20% {
    transform: translateX(0);
    opacity: 1;
  }
  30% {
    transform: translateX(-200px);
    opacity: 0;
  }
  100% {
    transform: translateX(-200px);
    opacity: 0;
  }
}

.pic-ctn {
  position: relative;
  width: 100vw;
  height: 300px;
 
}
.pic{
  width: 80%;
}

.pic-ctn > img {
  position: absolute;
  top: 0;
  left: calc(50% - 100px);
  opacity: 0;
  animation: display 10s infinite;
}

img:nth-child(2) {
  animation-delay: 2s;
}
img:nth-child(3) {
  animation-delay: 4s;
}
img:nth-child(4) {
  animation-delay: 6s;
}
img:nth-child(5) {
  animation-delay: 8s;
}
.ca {
  display: flex;
  flex-direction: row; /* Sắp xếp theo hàng ngang */
  justify-content: space-between; /* Cách đều các phần tử trong hàng */
  align-items: center; /* Căn giữa theo chiều dọc */
  margin-bottom: 100px;
  padding-right: 30px;

}

</style>
</head>
<body>
<h3>GALLERY</h3>
<div class="ca">
<div class="pic-ctn">
    <img  src="https://pubcdn.ivymoda.com/files/news/2023/10/23/3ba30d59e7497a1aebb9dee83cd475a7.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/75606fe95735c6be71e47784b4ee55ae.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/84122f992c83a8f0046e0cc6242584f2.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/a93485b2213cc23d0913e1d32ebadc52.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/ab6cef1bc439783f092c0c3d2f7eb5b7.jpg" alt="" class="pic">
  </div>
  <div class="pic-ctn">
  <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/75606fe95735c6be71e47784b4ee55ae.jpg" alt="" class="pic">
  <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/84122f992c83a8f0046e0cc6242584f2.jpg" alt="" class="pic">
  <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/a93485b2213cc23d0913e1d32ebadc52.jpg" alt="" class="pic">
  <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/ab6cef1bc439783f092c0c3d2f7eb5b7.jpg" alt="" class="pic">
    <img  src="https://pubcdn.ivymoda.com/files/news/2023/10/23/3ba30d59e7497a1aebb9dee83cd475a7.jpg" alt="" class="pic">
  </div>
 
  <div class="pic-ctn">
  <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/84122f992c83a8f0046e0cc6242584f2.jpg" alt="" class="pic">
  <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/a93485b2213cc23d0913e1d32ebadc52.jpg" alt="" class="pic">
  <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/ab6cef1bc439783f092c0c3d2f7eb5b7.jpg" alt="" class="pic">
    <img  src="https://pubcdn.ivymoda.com/files/news/2023/10/23/3ba30d59e7497a1aebb9dee83cd475a7.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/75606fe95735c6be71e47784b4ee55ae.jpg" alt="" class="pic">
  </div>
  <div class="pic-ctn">
  <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/a93485b2213cc23d0913e1d32ebadc52.jpg" alt="" class="pic">
  <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/ab6cef1bc439783f092c0c3d2f7eb5b7.jpg" alt="" class="pic">
    <img  src="https://pubcdn.ivymoda.com/files/news/2023/10/23/3ba30d59e7497a1aebb9dee83cd475a7.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/75606fe95735c6be71e47784b4ee55ae.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/84122f992c83a8f0046e0cc6242584f2.jpg" alt="" class="pic">
  </div>
  <div class="pic-ctn">
 

    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/ab6cef1bc439783f092c0c3d2f7eb5b7.jpg" alt="" class="pic">
    <img  src="https://pubcdn.ivymoda.com/files/news/2023/10/23/3ba30d59e7497a1aebb9dee83cd475a7.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/75606fe95735c6be71e47784b4ee55ae.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/84122f992c83a8f0046e0cc6242584f2.jpg" alt="" class="pic">
    <img src="https://pubcdn.ivymoda.com/files/news/2023/10/23/a93485b2213cc23d0913e1d32ebadc52.jpg" alt="" class="pic">
    
  </div>
  </div>

</div>


    <!-- sas -->
    
<!-- sas -->
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