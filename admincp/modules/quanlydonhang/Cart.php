<?php
class Cart {
    private $id_cart;
    private $id_khachhang;
    private $code_cart;
    private $cart_status;
    private $cart_date;
    private $cart_payment;
    private $cart_shipping;

    public function __construct($id_cart, $id_khachhang, $code_cart, $cart_status, $cart_date, $cart_payment, $cart_shipping) {
        $this->id_cart = $id_cart;
        $this->id_khachhang = $id_khachhang;
        $this->code_cart = $code_cart;
        $this->cart_status = $cart_status;
        $this->cart_date = $cart_date;
        $this->cart_payment = $cart_payment;
        $this->cart_shipping = $cart_shipping;
    }

    public function getIdCart() {
        return $this->id_cart;
    }

    public function setIdCart($id_cart) {
        $this->id_cart = $id_cart;
    }

    public function getIdKhachhang() {
        return $this->id_khachhang;
    }

    public function setIdKhachhang($id_khachhang) {
        $this->id_khachhang = $id_khachhang;
    }

    public function getCodeCart() {
        return $this->code_cart;
    }

    public function setCodeCart($code_cart) {
        $this->code_cart = $code_cart;
    }

    public function getCartStatus() {
        return $this->cart_status;
    }

    public function setCartStatus($cart_status) {
        $this->cart_status = $cart_status;
    }

    public function getCartDate() {
        return $this->cart_date;
    }

    public function setCartDate($cart_date) {
        $this->cart_date = $cart_date;
    }

    public function getCartPayment() {
        return $this->cart_payment;
    }

    public function setCartPayment($cart_payment) {
        $this->cart_payment = $cart_payment;
    }

    public function getCartShipping() {
        return $this->cart_shipping;
    }

    public function setCartShipping($cart_shipping) {
        $this->cart_shipping = $cart_shipping;
    }

    public function __toString() {
        return "Cart(id_cart={$this->id_cart}, id_khachhang={$this->id_khachhang}, code_cart={$this->code_cart}, " .
               "cart_status={$this->cart_status}, cart_date={$this->cart_date}, cart_payment={$this->cart_payment}, " .
               "cart_shipping={$this->cart_shipping})";
    }
}
?>