<?php
      $sql_sua_danhmucsp= "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
      $query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
  ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f3f3f3;
    }

    p {
        font-size: 24px;
        text-align: center;
        margin-top: 20px;
    }

    table {
        border-collapse: collapse;
        width: 50%;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table td {
        padding: 10px;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    table input[type="text"] {
        width: 100%;
        padding: 8px;
        margin: 4px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05); /* Scale up to 1.05x size */
        }
        100% {
            transform: scale(1);
        }
    }
</style>



<p>Sửa danh mục sản phẩm</p>
<table border="1" width=50% style="border-collapse: collapse;">
  <form method="POST"  action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
 <!-- khi gui du lieu dung POST,lay GET -->
        <?php
          while($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
        ?>
            <tr>
                <td>Tên danh mục</td>
                <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input type="text" value="<?php echo $dong['id_danhmuc'] ?>"  name="thutu"></td>
            </tr>
            <tr>
                <!-- nooi hai cot -->
                <td colspan="2"><input type="submit" class="btn btn-outlet-danger" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
            </tr>
        <?php
          }
        ?>
  </form>
  
  
  
 
</table>