<?php
class Admin {
    private $id_admin;
    private $username;
    private $password;
    private $admin_status;
    private $hoten;
    private $hinhanh;
    private $email;
    private $sodienthoai;
    private $diachi;
    private $thongtin;
    
    public function __construct($id_admin, $username, $password, $admin_status, $hoten, $hinhanh, $email, $sodienthoai, $diachi, $thongtin) {
        $this->id_admin = $id_admin;
        $this->username = $username;
        $this->password = $password;
        $this->admin_status = $admin_status;
        $this->hoten = $hoten;
        $this->hinhanh = $hinhanh;
        $this->email = $email;
        $this->sodienthoai = $sodienthoai;
        $this->diachi = $diachi;
        $this->thongtin = $thongtin;
    }
    
    public function getIdAdmin() {
        return $this->id_admin;
    }

    public function setIdAdmin($id_admin) {
        $this->id_admin = $id_admin;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getAdminStatus() {
        return $this->admin_status;
    }

    public function setAdminStatus($admin_status) {
        $this->admin_status = $admin_status;
    }

    public function getHoten() {
        return $this->hoten;
    }

    public function setHoten($hoten) {
        $this->hoten = $hoten;
    }

    public function getHinhanh() {
        return $this->hinhanh;
    }

    public function setHinhanh($hinhanh) {
        $this->hinhanh = $hinhanh;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSodienthoai() {
        return $this->sodienthoai;
    }

    public function setSodienthoai($sodienthoai) {
        $this->sodienthoai = $sodienthoai;
    }

    public function getDiachi() {
        return $this->diachi;
    }

    public function setDiachi($diachi) {
        $this->diachi = $diachi;
    }

    public function getThongtin() {
        return $this->thongtin;
    }

    public function setThongtin($thongtin) {
        $this->thongtin = $thongtin;
    }

 
}
?>