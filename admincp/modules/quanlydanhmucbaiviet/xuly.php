<?php


class QuanLyDanhMucBaiViet
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function themDanhMucBaiViet($tendanhmucbaiviet)
    {
        if ($this->dmbaivietExists($tendanhmucbaiviet)) {
            return false;
        } else {
            $sql_them = "INSERT INTO tbl_danhmucbaiviet(tendanhmuc_baiviet) VALUE('" . $tendanhmucbaiviet . "')";
            mysqli_query($this->mysqli, $sql_them);
            return true;
        }
    }

    public function suaDanhMucBaiViet($id, $tendanhmucbaiviet, $thutu)
    {
        if ($this->dmbaivietExistsID($tendanhmucbaiviet, $id)) {
            return false;
        } else {
            $sql_update = "UPDATE tbl_danhmucbaiviet SET tendanhmuc_baiviet='" . $tendanhmucbaiviet . "', thutu='" . $thutu . "' WHERE id_danhmucbaiviet='" . $id . "'";
            mysqli_query($this->mysqli, $sql_update);
            return true;
        }
    }

    public function xoaDanhMucBaiViet($id)
    {
        $sql_xoa = "DELETE FROM tbl_danhmucbaiviet WHERE id_danhmucbaiviet= '" . $id . "'";
        return mysqli_query($this->mysqli, $sql_xoa);
    }

    private function dmbaivietExists($tendanhmucbaiviet)
    {
        $sqlbv = "SELECT * FROM tbl_danhmucbaiviet WHERE tendanhmuc_baiviet='$tendanhmucbaiviet'";
        $result = mysqli_query($this->mysqli, $sqlbv);
        return mysqli_num_rows($result) > 0;
    }

    private function dmbaivietExistsID($tendanhmucbaiviet, $id)
    {
        $sqlbv = "SELECT * FROM tbl_danhmucbaiviet WHERE tendanhmuc_baiviet='$tendanhmucbaiviet' AND id_danhmucbaiviet!='$id'";
        $result = mysqli_query($this->mysqli, $sqlbv);
        return mysqli_num_rows($result) > 0;
    }
}

// Sử dụng class
include('../../config/config.php'); // Đảm bảo file config được include trước khi sử dụng class

$quanlyDanhMuc = new QuanLyDanhMucBaiViet($mysqli);

if (isset($_POST['themdanhmucbv'])) {
    $tendanhmucbaiviet = $_POST["tendanhmuc_baiviet"];
    $result = $quanlyDanhMuc->themDanhMucBaiViet($tendanhmucbaiviet);

    if ($result) {
        header('Location:../../lietkedmbv.php');
    } else {
        header('Location:../../themdmbv.php?message=Thông tin đã tồn tại!');
    }
} elseif (isset($_POST['suadanhmucbv'])) {
    $id = $_GET["idbaiviet"];
    $tendanhmucbaiviet = $_POST["tendanhmuc_baiviet"];
    $thutu = $_POST["thutu"];
    $result = $quanlyDanhMuc->suaDanhMucBaiViet($id, $tendanhmucbaiviet, $thutu);

    if ($result) {
        header('Location:../../lietkedmbv.php');
    } else {
        header('Location:../../suadmbv.php?idbaiviet=' . $id . '&message=Thông tin đã tồn tại!');
    }
} else {
    $id = $_GET['idbaiviet'];
    $result = $quanlyDanhMuc->xoaDanhMucBaiViet($id);

    if ($result) {
        header('Location:../../lietkedmbv.php');
    } else {
        echo "Lỗi khi xóa danh mục!";
    }
}
?>
