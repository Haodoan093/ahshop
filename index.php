<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ahshop</title>
    <link rel="stylesheet" typr="text/css" href="css/style.css">
    <link rel="stylesheet" typr="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
</head>
<body>
    <div class="wrapper">
       <?php
        session_start();
         include ("admincp/config/config.php"); 
         
         include ("pages/menu.php");
         include ("pages/header.php");
         include ("pages/main.php");
         include ("pages/footer.php");
       ?>
     
    </div>
</body>
</html>