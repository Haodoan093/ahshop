<?php
      $sql_sua_sp= "SELECT * FROM tbl_baiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
      $query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
  ?>
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        p {
            font-size: 24px;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table td {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        table input[type="text"],
        table input[type="file"],
        table textarea,
        table select {
            width: 100%;
            padding: 8px;
            margin: 4px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        table img {
            max-width: 150px;
            height: auto;
        }

        table .submit-button-container {
            text-align: center;
        }

        table input[type="submit"] {
            background-color: #ff69b4; /* Pink color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        table input[type="submit"]:hover {
            background-color: #ff1493; /* Darker pink color on hover */
            transform: scale(1.05);
        }
     
    </style>

<p>Sửa sản phẩm</p>
<?php
 if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('$message');</script>";
}
?> 
<body>
<table class="sua_sanpham" border="1" width=50% style="border-collapse: collapse;">
  <?php 
  while($row = mysqli_fetch_array($query_sua_sp)) {
  ?>
  <form method="POST" name="formBV"  action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet']?>"     enctype="multipart/form-data"onsubmit="return validateForm()">
    <!-- khi gui du lieu dung POST,lay GET -->
            <tr>
                <td>Tên bài viết</td>
                <td><input type="text" value="<?php echo $row['tenbaiviet']?>" name="tenbaiviet" required></td>
            </tr>
           
            <tr>
                <td>Danh mục bài viết</td>
                <td>
                     <select name="danhmuc">
                        <?php
                        $sql_danhmuc="SELECT * FROM tbl_danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
                        $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
                        while ($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                            if($row_danhmuc['id_danhmucbaiviet']==$row['id_danhmuc']){

                            
                        ?>
                           <option selected value="<?php echo $row_danhmuc['id_danhmucbaiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet']?></option>
                        <?php  
                        }else{
                            ?>
                            <option  value="<?php echo $row_danhmuc['id_danhmucbaiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet']?></option>
                        <?php
                        }}
                        ?>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinhanh">
                <img src="modules\quanlybaiviet\uploads\<?php echo $row['hinhanh'] ?>" width="150px">
                </td>
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td> <textarea rows="5" name="tomtat" > <?php echo $row['tomtat']?></textarea></td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td> <textarea rows="5" name="noidung" ><?php echo $row['noidung']?></textarea></td>
            </tr>
         
            <tr>
                <td>Tình trạng</td>
                <td>
                     <select name="tinhtrang">
                         <?php 
                          if($row['tinhtrang'] ==1){

                           ?> 
                           <option value="1" selected>Kích hoạt</option>
                           <option value="2">Ẩn</option>
                           <?php 
                          }else {

                        
                           ?> 
                            <option value="1">Kích hoạt</option>
                           <option value="2" selected>Ẩn</option>
                           <?php
                             }
                            ?>
                </td>
            </tr>
            <tr>
                <!-- nooi hai cot -->
                <td colspan="2"><input type="submit" name="suabaiviet" value="Sửa bài viết"></td>
            </tr>
     </form>
  
    <?php
                        }
    ?>

</table>
    <script>
        function validateForm() {
            var tenbaiviet = document.forms["formBV"]["tenbaiviet"].value;
            var hinhanh = document.forms["formBV"]["hinhanh"].value;
            var tomtat = document.forms["formBV"]["tomtat"].value;
            var noidung = document.forms["formBV"]["noidung"].value;
            if (tenbaiviet === "" ||  tomtat === "" || noidung === "") {
                alert("Vui lòng nhập đầy đủ thông tin");
                return false;
            }
            if ( hinhanh == "" ) {
                alert("Vui long tải hình ảnh !");
                return false;
            }
           
        }
    </script>
</body>