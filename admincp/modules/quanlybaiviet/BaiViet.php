<?php
class BaiViet {
    private $id_baiviet;
    private $tenbaiviet;
    private $hinhanh;
    private $tomtat;
    private $noidung;
    private $id_danhmuc;
    private $tinhtrang;

    public function getIdBaiviet() {
        return $this->id_baiviet;
    }

    public function setIdBaiviet($id_baiviet) {
        $this->id_baiviet = $id_baiviet;
    }

    public function getTenbaiviet() {
        return $this->tenbaiviet;
    }

    public function setTenbaiviet($tenbaiviet) {
        $this->tenbaiviet = $tenbaiviet;
    }

    public function getHinhanh() {
        return $this->hinhanh;
    }

    public function setHinhanh($hinhanh) {
        $this->hinhanh = $hinhanh;
    }

    public function getTomtat() {
        return $this->tomtat;
    }

    public function setTomtat($tomtat) {
        $this->tomtat = $tomtat;
    }

    public function getNoidung() {
        return $this->noidung;
    }

    public function setNoidung($noidung) {
        $this->noidung = $noidung;
    }

    public function getIdDanhmuc() {
        return $this->id_danhmuc;
    }

    public function setIdDanhmuc($id_danhmuc) {
        $this->id_danhmuc = $id_danhmuc;
    }

    public function getTinhtrang() {
        return $this->tinhtrang;
    }

    public function setTinhtrang($tinhtrang) {
        $this->tinhtrang = $tinhtrang;
    }
    public function __construct($id_baiviet, $tenbaiviet, $hinhanh, $tomtat, $noidung, $id_danhmuc, $tinhtrang) {
        $this->id_baiviet = $id_baiviet;
        $this->tenbaiviet = $tenbaiviet;
        $this->hinhanh = $hinhanh;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->id_danhmuc = $id_danhmuc;
        $this->tinhtrang = $tinhtrang;
    }

    public function __toString() {
        return "BaiViet(id_baiviet={$this->id_baiviet}, tenbaiviet={$this->tenbaiviet}, hinhanh={$this->hinhanh}, " .
               "tomtat={$this->tomtat}, noidung={$this->noidung}, id_danhmuc={$this->id_danhmuc}, " .
               "tinhtrang={$this->tinhtrang})";
    }
}

?>
