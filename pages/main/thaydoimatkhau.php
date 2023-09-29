<h3></h3>
        <?php
        
        if (isset($_POST['doimatkhau'])) {
            $taikhoan = $_POST['email'];
            $matkhau_cu = md5($_POST['password_cu']);
            $matkhau_moi = $_POST['password_moi'];
            $xacnhan = $_POST['xacnhan'];

            if ($matkhau_moi !== $xacnhan) {
                echo '<p class="error-message">Mật khẩu mới và xác nhận mật khẩu không khớp.</p>';
            }elseif($taikhoan !== $_SESSION['email']){
                echo '<p class="error-message">Tài khoản không đúng.</p>';
            } else {
                $sql = "SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
                $row = mysqli_query($mysqli, $sql);
                $count = mysqli_num_rows($row);

                if ($count > 0) {
                    $password_moi = md5($_POST['password_moi']);
                    $sql_update = mysqli_query($mysqli, "UPDATE tbl_dangky SET matkhau='".$password_moi."' WHERE email='".$taikhoan."'");
                    echo '<p>Mật khẩu đã được thay đổi thành công.</p>';
                } else {
                    echo '<p class="error-message">Tài khoản hoặc mật khẩu cũ không đúng. Vui lòng kiểm tra lại.</p>';
                }
            }
        }
        ?>
        <style>
                        /* Định dạng cho phần nội dung "Đổi Mật Khẩu" */
                        h3 {
                            font-size: 24px;
                            margin-bottom: 20px;
                            color: #333; /* Màu chữ cho tiêu đề */
                        }

                        .error-message {
                            color: red;
                            font-weight: bold;
                        }

                        /* Form đổi mật khẩu */
                        form.tbldoimatkhau {
                            max-width: 400px;
                            margin: 0 auto;
                            
                            background-color: #f8f8f8; /* Màu nền cho form */
                            padding: 20px;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng form */
                        }

                        .table-doimatkhau {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                        }

                        .table-doimatkhau td {
                            padding: 10px;
                            border-bottom: 1px solid #ddd;
                        }

                        .table-doimatkhau td:first-child {
                            width: 40%;
                        }

                        input[type="text"] {
                            width: 100%;
                            padding: 10px;
                            margin-bottom: 10px;
                            border: 1px solid #ddd;
                            border-radius: 5px;
                        }

                        input[type="submit"] {
                            background-color: #d67d05; /* Màu cam đất */
                            color: #fff;
                            padding: 10px 20px;
                            border: none;
                            cursor: pointer;
                            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease; /* Hiệu ứng chuyển đổi màu nền và đổ bóng */
                            border-radius: 5px;
                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Đổ bóng nút */
                        }

                        input[type="submit"]:hover {
                            background-color: #c46100; /* Màu cam đậm khi di chuột qua */
                            transform: scale(1.05);
                            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); /* Đổ bóng đậm khi di chuột qua */
                        }

        </style>
 <form class="tbldoimatkhau" action="" autocomplete="off" method="POST">
            <table class="table-doimatkhau">
                <tr>
                    <td colspan="2">
                        <h3>Đổi mật khẩu</h3>
                    </td>
                </tr>
                <tr>
                    <td>Tài khoản:</td>
                    <td><input type="text" name="email" placeholder="Email..."></td>
                </tr>
                <tr>
                    <td>Mật khẩu cũ:</td>
                    <td><input type="text" name="password_cu" placeholder="Password cữ..."></td>
                </tr>
                <tr>
                    <td>Mật khẩu mới:</td>
                    <td><input type="text" name="password_moi" placeholder="Password mới..."></td>
                </tr>
                <tr>
                    <td>Xác nhận:</td>
                    <td><input type="text" name="xacnhan" placeholder="Nhập lại pass mới..."></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="doimatkhau" value="Đổi mật khẩu">
                    </td>
                </tr>
            </table>
        </form>