<?php
class CartDetails {
    private $id_cart_details;
    private $code_cart;
    private $id_sanpham;
    private $soluongmua;

    public function __construct($id_cart_details, $code_cart, $id_sanpham, $soluongmua) {
        $this->id_cart_details = $id_cart_details;
        $this->code_cart = $code_cart;
        $this->id_sanpham = $id_sanpham;
        $this->soluongmua = $soluongmua;
    }

    public function getIdCartDetails() {
        return $this->id_cart_details;
    }

    public function setIdCartDetails($id_cart_details) {
        $this->id_cart_details = $id_cart_details;
    }

    public function getCodeCart() {
        return $this->code_cart;
    }

    public function setCodeCart($code_cart) {
        $this->code_cart = $code_cart;
    }

    public function getIdSanpham() {
        return $this->id_sanpham;
    }

    public function setIdSanpham($id_sanpham) {
        $this->id_sanpham = $id_sanpham;
    }

    public function getSoluongmua() {
        return $this->soluongmua;
    }

    public function setSoluongmua($soluongmua) {
        $this->soluongmua = $soluongmua;
    }

    public function __toString() {
        return "CartDetails(id_cart_details={$this->id_cart_details}, code_cart={$this->code_cart}, " .
               "id_sanpham={$this->id_sanpham}, soluongmua={$this->soluongmua})";
    }
}
 
?>