<?php
session_start();
if (!isset($_SESSION['dangnhap'])) {
  header('Location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admincp</title>
  <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

</head>

<body>
  <h3 class="title_admin">Wellcome to Admin</h3>
  <div class="wrapper">
    <?php
    include("config/config.php");
    include("modules/header.php");
    include("modules/menu.php");
    include("modules/main.php");
    include("modules/footer.php");
    ?>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('noidung');
    CKEDITOR.replace('thongtinlienhe');
    CKEDITOR.replace('tomtat');
  </script>
  <script type="text/javascript">
    new Morris.Area({
      // ID of the element in which to draw the chart.
      element: 'chart',
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
      data: [{
          year: '2020',order: 7,sales:1,
          quantity: 20
        },
        {
          year: '2021',order: 2,sales:9,
          quantity: 10
        },
        {
          year: '2022',order: 3,sales:7,
          quantity: 5
        },
        {
          year: '2023',order: 3,sales:6,
          quantity: 5
        },
        {
          year: '2024',order: 11,sales:4,
          quantity: 20
        }
      ],
      // The name of the data record attribute that contains x-values.
      xkey: 'year',
      // A list of names of data record attributes that contain y-values.
      ykeys: ['order','sales','quantity'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: ['Đơn hàng', 'Danh thu', 'Số lượng bán ra']
    });
  </script>

</body>

</html>