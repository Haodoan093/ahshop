

<style>
    body {
        font-family: Arial, sans-serif;
    }

    p {
        font-size: 24px;
        text-align: center;
        margin-top: 20px;
    }

    table {
        border-collapse: collapse;
        width: 90%;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 2px solid #dcdcdc; /* Improved table border */
    }

    table td {
        padding: 10px;
        border: 1px solid #dcdcdc; /* Improved cell borders */
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

  
</style>
<?php
 if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('$message');</script>";
}
?> 
<body>
<table class="them_danhmuc"border="1" width=50% style="border-collapse: collapse;">
  <form method="POST" name="formdmBV"  action="modules/quanlydanhmucbaiviet/xuly.php" onsubmit="return validateFormdmBV()">
 <!-- khi gui du lieu dung POST,lay GET -->
            <tr>
                <td>Tên danh mục bài viết</td>
                <td><input type="text" name="tendanhmuc_baiviet" required></td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input type="text" name="thutu" required></td>
            </tr>
            <tr>
                <!-- nooi hai cot -->
                <td colspan="2"><input type="submit" class="btn btn-primary" name="themdanhmucbv" value="Thêm danh mục bài viết"></td>
            </tr>
  </form>
  
  
  
 
</table>
<script>
        function validateFormdmBV() {
            var tendm = document.forms["formdmBV"]["tendanhmuc_baiviet"].value;
            var thutu = document.forms["formdmBV"]["thutu"].value;
            
            if (tendm === "" ||  thutu === "" ) {
                alert("Vui lòng nhập đầy đủ thông tin");
                return false;
            }
         
           
        }
    </script>
</body>