<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài giải phuong trình bậc 2</title>
</head>
<body>
    <h1>Tính phương trình bậc 2</h1>
    <form method="POST" action="">
        <label for="a">Nhap gia tri a:</label>
        <input type="text" name="a" >
        <br><br>

        <label for="b">Nhap gia tri b:</label>
        <input type="text" name="b">
        <br><br>

        <label for="c">Nhap gia tri c:</label>
        <input type="text"  name="c">
        <br><br>

        <input type="submit" name="tinh" value="tinh">
    </form>

    <?php
   if(isset($_POST['tinh'])){
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    if(is_numeric($a)&&is_numeric($b)&&is_numeric($c)){

        // Tính delta
    $delta = $b * $b - 4 * $a * $c;

    if ($delta < 0) {
        echo "Phuong trinh vo nhiem";
    } elseif ($delta == 0) {
        $x = -$b / (2 * $a);
        echo "Nghiem kep x = " . $x;
    } else {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        echo "Nghiep 1: x1 = " . $x1 . "<br>";
        echo "Nghiep 2: x2 = " . $x2;
    }

    }else{
        echo "Vui long kiem tra lai cac gia tri";
    }
    

  
   }
    
    ?>
</body>
</html>