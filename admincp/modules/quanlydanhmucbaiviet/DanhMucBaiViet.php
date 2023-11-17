<?php
class DanhMucBaiviet {
    private $id_danhmucbaiviet;
    private $tendanhmuc_baiviet;
    private $thutu;

    public function __construct($id_danhmucbaiviet, $tendanhmuc_baiviet, $thutu) {
        $this->id_danhmucbaiviet = $id_danhmucbaiviet;
        $this->tendanhmuc_baiviet = $tendanhmuc_baiviet;
        $this->thutu = $thutu;
    }

    public function getIdDanhmucBaiviet() {
        return $this->id_danhmucbaiviet;
    }

    public function setIdDanhmucBaiviet($id_danhmucbaiviet) {
        $this->id_danhmucbaiviet = $id_danhmucbaiviet;
    }

    public function getTendanhmucBaiviet() {
        return $this->tendanhmuc_baiviet;
    }

    public function setTendanhmucBaiviet($tendanhmuc_baiviet) {
        $this->tendanhmuc_baiviet = $tendanhmuc_baiviet;
    }

    public function getThutu() {
        return $this->thutu;
    }

    public function setThutu($thutu) {
        $this->thutu = $thutu;
    }

    public function __toString() {
        return "DanhMucBaiviet(id_danhmucbaiviet={$this->id_danhmucbaiviet}, " .
               "tendanhmuc_baiviet={$this->tendanhmuc_baiviet}, thutu={$this->thutu})";
    }
}
?>