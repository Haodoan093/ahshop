<?php
class KhachHang {
    private $id_dangky;
    private $tenkhachhang;
    private $email;
    private $diachi;
    private $matkhau;
    private $dienthoai;
    private $sodonhang;
    private $chitieu;

    public function __construct($id_dangky, $tenkhachhang, $email, $diachi, $matkhau, $dienthoai, $sodonhang, $chitieu) {
        $this->id_dangky = $id_dangky;
        $this->tenkhachhang = $tenkhachhang;
        $this->email = $email;
        $this->diachi = $diachi;
        $this->matkhau = $matkhau;
        $this->dienthoai = $dienthoai;
        $this->sodonhang = $sodonhang;
        $this->chitieu = $chitieu;
    }

    public function getIdDangky() {
        return $this->id_dangky;
    }

    public function setIdDangky($id_dangky) {
        $this->id_dangky = $id_dangky;
    }

    public function getTenkhachhang() {
        return $this->tenkhachhang;
    }

    public function setTenkhachhang($tenkhachhang) {
        $this->tenkhachhang = $tenkhachhang;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getDiachi() {
        return $this->diachi;
    }

    public function setDiachi($diachi) {
        $this->diachi = $diachi;
    }

    public function getMatkhau() {
        return $this->matkhau;
    }

    public function setMatkhau($matkhau) {
        $this->matkhau = $matkhau;
    }

    public function getDienthoai() {
        return $this->dienthoai;
    }

    public function setDienthoai($dienthoai) {
        $this->dienthoai = $dienthoai;
    }

    public function getSodonhang() {
        return $this->sodonhang;
    }

    public function setSodonhang($sodonhang) {
        $this->sodonhang = $sodonhang;
    }

    public function getChitieu() {
        return $this->chitieu;
    }

    public function setChitieu($chitieu) {
        $this->chitieu = $chitieu;
    }

    public function __toString() {
        return "KhachHang(id_dangky={$this->id_dangky}, tenkhachhang={$this->tenkhachhang}, email={$this->email}, " .
               "diachi={$this->diachi}, matkhau={$this->matkhau}, dienthoai={$this->dienthoai}, sodonhang={$this->sodonhang}, " .
               "chitieu={$this->chitieu})";
    }
}

?>