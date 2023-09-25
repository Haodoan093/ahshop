<p>Thông tin liên hệ</p>
<?php
      $sql_lh= "SELECT * FROM tbl_lienhe WHERE id=1";
      $query_lh = mysqli_query($mysqli,$sql_lh);
  ?>

<style>
    /* Reset default margin and padding for better consistency */
    body,
    h1,
    p,
    ul,
    li {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f3f3f3;
    }

    p {
        font-size: 24px;
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }

    /* Style for the table */
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

    /* Style for the submit button */
    table input[type="submit"] {
        background-color: #28a745;
        /* Green color for the button */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        /* Smooth transition for background color and transform */
    }

    table input[type="submit"]:hover {
        background-color: #218838;
        /* Darker green color on hover */
        transform: scale(1.05);
        /* Slightly scale up the button on hover */
    }
</style>

<table border="1" width=50% style="border-collapse: collapse;">
<?php
          while($row = mysqli_fetch_array($query_lh)) {
        ?>
    <form method="POST" action="modules/thongtinweb/xuly.php?id=<?php echo $row['id']?>" enctype="multipart/form-data">
        <!-- khi gui du lieu dung POST,lay GET -->
   
  
        <tr>
  
            <td> <textarea rows="12" name="thongtinlienhe"><?php echo $row['thongtinlienhe']?> </textarea></td>
        </tr>

      
        <tr>
            <!-- nooi hai cot -->
            <td colspan="2"><input type="submit" name="capnhatthongtin" value="Cập nhật"></td>
        </tr>
        <?php }
        ?>
    </form>




</table>