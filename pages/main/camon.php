<?php
    session_start();
    include("../../admincp/config/config.php");
    require('../../carbon/autoload.php');
    require('../../mail/send/sendmail.php');

    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    if (isset($_SESSION['now'])){
        $now = Carbon::parse($_SESSION['now']);
     echo "ton tai";
    }
    $code_cart =  rand(0, 9999);
    $code_order=$code_cart;
    if (isset($_SESSION['code_cart'])) {


        if (isset($_GET['vnp_Amount'])) {
            $vnp_Amount = $_GET['vnp_Amount']/100;
            $vnp_BankCode = $_GET['vnp_BankCode'];
            $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
            $vnp_CardType = $_GET['vnp_CardType'];
            $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
            $vnp_PayDate = $_GET['vnp_PayDate'];
            $vnp_TmnCode = $_GET['vnp_TmnCode'];
            $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
            $code_cart = $_SESSION['code_cart'];
            $code_order=$code_cart;

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
    } elseif (isset($_GET['partnerCode'])) {
    echo "Thanh toanMOMO";
        $partnerCode = $_GET['partnerCode'];
        $orderId = $_GET['orderId'];
        $amount = $_GET['amount'];
        $orderInfo = $_GET['orderInfo'];
        $orderType = $_GET['orderType'];
        $transId = $_GET['transId'];
        $payType = $_GET['payType'];
        $id_khachhang = $_SESSION['id_khachhang'];
    
        $cart_payment = 'momo';


        $insert_momo = "INSERT INTO tbl_momo(partnercode,order_id,amount,order_info,order_type,trans_id,pay_type,code_cart)
    VALUES('" . $partnerCode . "','" . $orderId . "','" . $amount . "','" . $orderInfo . "','" . $orderType . "','" . $transId . "','" . $payType . "','" . $code_cart . "')";
        $cart_query = mysqli_query($mysqli, $insert_momo);
        if ($cart_query) {
            $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky = '$id_khachhang' LIMIT 1");
            $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
            $id_shipping = $row_get_vanchuyen['id_shipping'];
            $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('" . $id_khachhang . "','" . $code_cart . "',1,'" . $now . "','" . $cart_payment . "','" . $id_shipping . "')  ";
            $cart_query = mysqli_query($mysqli, $insert_cart);



            //them gio hang chi tiet
            foreach ($_SESSION['cart'] as $key => $value) {
                $id_sanpham = $value['id'];
                $soluong = $value['soluong'];
                $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_cart . "','" . $soluong . "')";
                mysqli_query($mysqli, $insert_order_details);
            }
        
            echo "Thanh toans MOMO thanh cong";
            echo "Vui long nhấn vào để xem chi tiết đơn hàng của bạn";
        } else {
            echo "Thanh toan that bai";
        }
    } else {
        echo "Khong ton tai";
    }


    $tieude = "AHSHOP CẢM ƠN !";

    $noidung = "
    <style>
    .guimail {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    p {
        margin: 0;
    }
    </style>
    <div class='guimail'>
        <p>CẢM ƠN BẠN ĐÃ ĐẶT HÀNG</p>
        <p>Mã đơn hàng : $code_order</p>
        <p>Đơn hàng sẽ được giao sớm nhất</p>
    </div>
    ";
    $tong=$_SESSION['tongtien'];
    foreach($_SESSION['cart'] as $key=>$val){
    $noidung.="<ul>
    <li>".$val['tensanpham']."</li>
    <li>".$val['masp']."</li>
    <li>Giá : ".number_format($val['giasp'],0,',','.').' VND'."</li>
    <li>Số lượng :".$val['soluong']."</li>
    <li>Ngày đặt :".$now."</li>
    <li>Tổng tiền : ".number_format($tong,0,',','.').' VND'."</li>


    </ul>";


    }
    $maildathang=$_SESSION['email'];
    // Tạo một đối tượng từ lớp GuiGmail và gọi phương thức đatHang() để gửi email
    $guiEmail = new GuiGmail();
    $guiEmail->DatHang($tieude,$noidung,$maildathang);
    if(isset($_SESSION['now']))
    {
        unset($_SESSION['now']);
    }
    unset($_SESSION['cart']);
    unset($_SESSION['tongtien']);
    header('Location:loicamon.php');
    ob_end_flush();
?>