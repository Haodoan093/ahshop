<?php
class ThongKe {
    private $id;
    private $ngaydat;
    private $donhang;
    private $doanhthu;
    private $soluongban;

    public function __construct($id, $ngaydat, $donhang, $doanhthu, $soluongban) {
        $this->id = $id;
        $this->ngaydat = $ngaydat;
        $this->donhang = $donhang;
        $this->doanhthu = $doanhthu;
        $this->soluongban = $soluongban;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNgaydat() {
        return $this->ngaydat;
    }

    public function setNgaydat($ngaydat) {
        $this->ngaydat = $ngaydat;
    }

    public function getDonhang() {
        return $this->donhang;
    }

    public function setDonhang($donhang) {
        $this->donhang = $donhang;
    }

    public function getDoanhthu() {
        return $this->doanhthu;
    }

    public function setDoanhthu($doanhthu) {
        $this->doanhthu = $doanhthu;
    }

    public function getSoluongban() {
        return $this->soluongban;
    }

    public function setSoluongban($soluongban) {
        $this->soluongban = $soluongban;
    }

    public function __toString() {
        return "ThongKe(id={$this->id}, ngaydat={$this->ngaydat}, donhang={$this->donhang}, " .
               "doanhthu={$this->doanhthu}, soluongban={$this->soluongban})";
    }
}


 ?>