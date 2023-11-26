<?php
class BaiVietManager
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function themBaiViet($tenbaiviet, $hinhanh, $tomtat, $noidung, $tinhtrang, $danhmuc)
    {
        if ($this->baivietExists($tenbaiviet)) {
            header('Location: ../../thembv.php?message=Thông tin đã tồn tại!');
        } else {
            $hinhanh = $this->processImage($hinhanh);

            $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
                VALUES('$tenbaiviet','$hinhanh','$tomtat','$noidung','$tinhtrang','$danhmuc')";
            mysqli_query($this->mysqli, $sql_them);

            move_uploaded_file($_FILES['hinhanh']['tmp_name'], 'uploads/' . $hinhanh);
            header('Location: ../../lietkebv.php?message=Thêm thành công!');
        }
    }

    public function suaBaiViet($tenbaiviet, $hinhanh, $tomtat, $noidung, $tinhtrang, $danhmuc, $idbv)
    {
        if ($this->baivietExistsID($tenbaiviet, $idbv)) {
            header('Location: ../../suabv.php?idbaiviet=' . $idbv . '&message=Thông tin đã tồn tại!');
        } else {
            if ($hinhanh != '') {
                $hinhanh = $this->processImage($hinhanh);

                $sql_update = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet', 
                    hinhanh='$hinhanh', tomtat='$tomtat', noidung='$noidung', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc'
                    WHERE id_baiviet='$idbv'";

                $this->deleteImage($idbv);

                move_uploaded_file($_FILES['hinhanh']['tmp_name'], 'uploads/' . $hinhanh);
            } else {
                $sql_update = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet', 
                    tomtat='$tomtat', noidung='$noidung', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc'
                    WHERE id_baiviet='$idbv'";
            }

            mysqli_query($this->mysqli, $sql_update);
            header('Location: ../../lietkebv.php?message=Sửa thành công!');
        }
    }

    public function xoaBaiViet($id)
    {
        $this->deleteImage($id);

        $sql_xoa = "DELETE FROM tbl_baiviet WHERE id_baiviet='$id'";
        if (mysqli_query($this->mysqli, $sql_xoa)) {
            echo "Xóa sản phẩm thành công";
            header('Location: ../../lietkebv.php');
        } else {
            echo "Lỗi khi xóa sản phẩm: " . mysqli_error($this->mysqli);
        }
    }

    private function baivietExists($tenbaiviet)
    {
        $sqlbv = "SELECT * FROM tbl_baiviet WHERE tenbaiviet='$tenbaiviet'";
        $result = mysqli_query($this->mysqli, $sqlbv);
        return mysqli_num_rows($result) > 0;
    }

    private function baivietExistsID($tenbaiviet, $id)
    {
        $sqlbv = "SELECT * FROM tbl_baiviet WHERE tenbaiviet='$tenbaiviet' AND id_baiviet!='$id'";
        $result = mysqli_query($this->mysqli, $sqlbv);
        return mysqli_num_rows($result) > 0;
    }

    private function processImage($imageName)
    {
        return time() . '_' . $imageName;
    }

    private function deleteImage($id)
    {
        $sql = "SELECT * FROM tbl_baiviet WHERE id_baiviet='$id' LIMIT 1";
        $query = mysqli_query($this->mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
    }
}

include('../../config/config.php'); 
$baiVietManager = new BaiVietManager($mysqli);

if (isset($_POST['thembaiviet'])) {
    $baiVietManager->themBaiViet($_POST["tenbaiviet"], $_FILES['hinhanh']['name'], $_POST["tomtat"], $_POST["noidung"], $_POST["tinhtrang"], $_POST["danhmuc"]);
} elseif (isset($_POST['suabaiviet'])) {
    $idbv = $_GET["idbaiviet"];
    $baiVietManager->suaBaiViet($_POST["tenbaiviet"], $_FILES['hinhanh']['name'], $_POST["tomtat"], $_POST["noidung"], $_POST["tinhtrang"], $_POST["danhmuc"], $idbv);
} else {
    $id = $_GET['idbaiviet'];
    $baiVietManager->xoaBaiViet($id);
}
?>