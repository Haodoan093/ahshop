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
  <script src="https://cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
  <script>
    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
      CKEDITOR.replace("tomtat");
      CKEDITOR.replace("noidung");
    });
  </script>


</body>

</html>