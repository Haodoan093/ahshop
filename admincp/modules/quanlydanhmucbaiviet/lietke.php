<?php
      $sql_lietke_danhmucbaiviet= "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu ASC";
      $query_lietke_danhmucbaiviet = mysqli_query($mysqli,$sql_lietke_danhmucbaiviet);
  ?>
 
 <style>
        /* Reset default margin and padding for better consistency */
        body, h1, h2, p, ul, li {
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
            font-weight: bold; /* Make text bold */
        }

        /* Style for the table */
        .styled-table {
            width: 90%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .styled-table th, .styled-table td {
            padding: 15px; /* Increase padding for better spacing */
            border: 1px solid #ddd;
            font-size: 18px; /* Increase font size */
            text-align: center; /* Center align all cells */
        }

        .styled-table th {
            background-color: #f2f2f2;
        }

        /* Style for edit and delete links */
        .edit-link, .delete-link {
            display: inline-block;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
        }

        .edit-link {
            background-color: #800080; /* Purple for edit */
            color: #fff;
            margin-right: 10px;
        }

        .edit-link:hover {
            background-color: #4b004b; /* Darker purple on hover */
        }

        .delete-link {
            background-color: #000; /* Black for delete */
            color: #fff;
        }

        .delete-link:hover {
            background-color: #333; /* Darker black on hover */
        }

        /* Center "Quản lý" column */
        .center-column {
            text-align: center;
        }
    </style>

    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục bài viết</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_danhmucbaiviet)) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['tendanhmuc_baiviet']; ?></td>
                <td>
                    <a class="edit-link" href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_danhmucbaiviet'] ?>">Sửa</a>
                    <a class="delete-link" href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_danhmucbaiviet'] ?>">Xóa</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
