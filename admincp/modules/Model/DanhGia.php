<?php
class DanhGia {
    private $id;
    private $id_sanpham;
    private $id_user;
    private $thongtin;
    private $thoigian;
    private $sosao;

    public function __construct($id, $id_sanpham, $id_user, $thongtin, $thoigian, $sosao) {
        $this->id = $id;
        $this->id_sanpham = $id_sanpham;
        $this->id_user = $id_user;
        $this->thongtin = $thongtin;
        $this->thoigian = $thoigian;
        $this->sosao = $sosao;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdSanpham() {
        return $this->id_sanpham;
    }

    public function setIdSanpham($id_sanpham) {
        $this->id_sanpham = $id_sanpham;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getThongtin() {
        return $this->thongtin;
    }

    public function setThongtin($thongtin) {
        $this->thongtin = $thongtin;
    }

    public function getThoigian() {
        return $this->thoigian;
    }

    public function setThoigian($thoigian) {
        $this->thoigian = $thoigian;
    }

    public function getSosao() {
        return $this->sosao;
    }

    public function setSosao($sosao) {
        $this->sosao = $sosao;
    }

    public function __toString() {
        return "DanhGia(id={$this->id}, id_sanpham={$this->id_sanpham}, id_user={$this->id_user}, " .
               "thongtin={$this->thongtin}, thoigian={$this->thoigian}, sosao={$this->sosao})";
    }
}

?>