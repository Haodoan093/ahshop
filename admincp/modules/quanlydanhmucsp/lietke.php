  <?php
      $sql_lietke_danhmucsp= "SELECT * FROM tbl_danhmuc ORDER BY thutu ASC";
      $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
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
        .styled-table thead {
        background-color: #555555; /* Màu nền trắng cho thead */
        color: #fff; /* Màu chữ đen cho thead */
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
            background-color: green; /* Purple for edit */
            color: #fff;
            margin-right: 10px;
        }

        .edit-link:hover {
            background-color: #4b004b; /* Darker purple on hover */
        }

        .delete-link {
            background-color: darkturquoise; /* Black for delete */
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
                <th>Tên danh mục</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['tendanhmuc']; ?></td>
                <td>
                    <a class="edit-link" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
                    <a class="delete-link" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
