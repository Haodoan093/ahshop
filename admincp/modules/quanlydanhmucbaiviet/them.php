<p>THÊM DANH MỤC BÀI VIẾT</p>

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

    table input[type="submit"] {
        background-color: #800080; /* Purple (tím) color */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .them_danhmuc input[type="submit"] {
        background-color: #800080; /* Purple (tím) color */
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .them_danhmuc input[type="submit"]:hover {
        background-color: #4B0082; /* Darker purple on hover */
        transform: scale(1.05);
    }
</style>

<table class="them_danhmuc"border="1" width=50% style="border-collapse: collapse;">
  <form method="POST"  action="modules/quanlydanhmucbaiviet/xuly.php">
 <!-- khi gui du lieu dung POST,lay GET -->
            <tr>
                <td>Tên danh mục bài viết</td>
                <td><input type="text" name="tendanhmuc_baiviet"></td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input type="text" name="thutu"></td>
            </tr>
            <tr>
                <!-- nooi hai cot -->
                <td colspan="2"><input type="submit" name="themdanhmucbv" value="Thêm danh mục bài viết"></td>
            </tr>
  </form>
  
  
  
 
</table>