<?php
session_start();
include("../../admincp/config/config.php");
if (isset($_SESSION['code_cart'])) {


    if (isset($_GET['vnp_Amount'])) {
        $vnp_Amount = $_GET['vnp_Amount'];
        $vnp_BankCode = $_GET['vnp_BankCode'];
        $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
        $vnp_CardType = $_GET['vnp_CardType'];
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
        $vnp_PayDate = $_GET['vnp_PayDate'];
        $vnp_TmnCode = $_GET['vnp_TmnCode'];
        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
        $code_cart = $_SESSION['code_cart'];


        $insert_vnpay = "INSERT INTO tbl_vnpay(vnp_amount,vnp_bankcode,vnp_banktranno,vnp_cardtype,vnp_orderinfo,vnp_paydate,vnp_tmncode,vnp_transactionno,code_cart)
     VALUES('" . $vnp_Amount . "','" . $vnp_BankCode . "','" . $vnp_BankTranNo . "','" . $vnp_CardType . "','" . $vnp_OrderInfo . "','" . $vnp_PayDate . "','" . $vnp_TmnCode . "','" . $vnp_TransactionNo . "','" . $code_cart . "')";
        $cart_query = mysqli_query($mysqli, $insert_vnpay);
        if ($cart_query) {
            unset($_SESSION['code_cart']);
            echo "Thanh toans VNPAY thanh cong";
            echo "Vui long nhấn vào để xem chi tiết đơn hàng của bạn";
        } else {
            echo "Thanh toan that bai";
        }
    }
}else{
    echo "Khong ton tai";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn đã mua hàng</title>
    <style>
        body {
            background-color: #f2f2f2;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .thank-you {
            font-size: 48px;
            color: #4CAF50;
            animation: scaleUp 1s ease-in-out;
        }

        @keyframes scaleUp {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        .confetti {
            width: 10px;
            height: 10px;
            background-color: #f39c12;
            border-radius: 50%;
            position: absolute;
            animation: confetti-fall 5s linear infinite, confetti-rotate 1s linear infinite;
        }

        @keyframes confetti-fall {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(100%);
            }
        }

        @keyframes confetti-rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .back-to-home {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-to-home:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Cảm ơn bạn đã mua hàng!</h1>
        <p class="thank-you">🎉</p>
        <div class="thank-you-message">
            <h1 class="thank-you-header">Cảm ơn bạn đã mua sản phẩm!</h1>
            <p class="thank-you-text">Chúng tôi rất trân trọng sự ủng hộ của bạn.</p>
            <p class="thank-you-text">Sản phẩm của bạn sẽ được giao trong thời gian sớm nhất.</p>
            <a class="back-to-home" href="../../index.php">Trở về trang chủ</a>
        </div>


</body>

</html>