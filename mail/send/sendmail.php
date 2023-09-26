<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
ob_start(); 
class GuiGmail {
    public function DatHang($tieude,$noidung,$maildathang){
        $mail = new PHPMailer(true); // Đặt biến $mail trong phương thức
        $mail->CharSet='utf8';
        try {
            //Server settings
            $mail->SMTPDebug = 2;
            $mail->isSMTP(); // Sử dụng SMTP để gửi mail
            $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
            $mail->SMTPAuth = true; // Bật xác thực SMTP
            $mail->Username = 'thanhnu093@gmail.com'; // SMTP username
            $mail->Password = 'ftowbsqxjzjqnolt'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
            $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
            $mail->Port = 465; // Cổng kết nối SMTP là 465

            //Recipients
            $mail->setFrom('thanhnu093@gmail.com', 'HSHOP');
            $mail->addAddress($maildathang, 'Hao');


            $mail->addCC('thanhnu093@gmail.com');
            
            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $tieude; // Tiêu đề
            $mail->Body = $noidung; // Nội dung
            
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}


?>
