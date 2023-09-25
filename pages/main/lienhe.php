
<?php
      $sql_lh= "SELECT * FROM tbl_lienhe WHERE id=1";
      $query_lh = mysqli_query($mysqli,$sql_lh);
  ?>

<style>
/* CSS cho bảng thông tin liên hệ */
.contact-table {
    margin: 20px 0;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Hiệu ứng đổ bóng */
    border-radius: 5px;
    overflow: hidden;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

/* CSS cho cột thông tin liên hệ */
.contact-info {
    font-weight: normal;
}

/* Hiệu ứng đổ bóng khi di chuột qua */
.contact-table:hover {
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
    transition: box-shadow 0.3s;
}


</style>

<div class="contact-table">
    <table>
        <tr>
        
            <th>Thông tin</th>
        </tr>
        <?php
            while($row = mysqli_fetch_array($query_lh)) {
        ?>
        <tr>
         
            <td class="contact-info"><?php echo $row['thongtinlienhe']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

