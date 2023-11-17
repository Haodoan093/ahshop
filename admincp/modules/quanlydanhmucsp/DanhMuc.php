<?php
class DanhMuc {
    private $id_danhmuc;
    private $tendanhmuc;
    private $thutu;

    public function __construct($id_danhmuc, $tendanhmuc, $thutu) {
        $this->id_danhmuc = $id_danhmuc;
        $this->tendanhmuc = $tendanhmuc;
        $this->thutu = $thutu;
    }

    public function getIdDanhmuc() {
        return $this->id_danhmuc;
    }

    public function setIdDanhmuc($id_danhmuc) {
        $this->id_danhmuc = $id_danhmuc;
    }

    public function getTendanhmuc() {
        return $this->tendanhmuc;
    }

    public function setTendanhmuc($tendanhmuc) {
        $this->tendanhmuc = $tendanhmuc;
    }

    public function getThutu() {
        return $this->thutu;
    }

    public function setThutu($thutu) {
        $this->thutu = $thutu;
    }

    public function __toString() {
        return "DanhMuc(id_danhmuc={$this->id_danhmuc}, tendanhmuc={$this->tendanhmuc}, thutu={$this->thutu})";
    }
}
?>