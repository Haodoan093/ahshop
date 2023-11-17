<?php
class Shipping {
    private $id_shipping;
    private $name;
    private $phone;
    private $address;
    private $note;
    private $id_dangky;

    public function __construct($id_shipping, $name, $phone, $address, $note, $id_dangky) {
        $this->id_shipping = $id_shipping;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->note = $note;
        $this->id_dangky = $id_dangky;
    }

    public function getIdShipping() {
        return $this->id_shipping;
    }

    public function setIdShipping($id_shipping) {
        $this->id_shipping = $id_shipping;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getNote() {
        return $this->note;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function getIdDangky() {
        return $this->id_dangky;
    }

    public function setIdDangky($id_dangky) {
        $this->id_dangky = $id_dangky;
    }

    public function __toString() {
        return "Shipping(id_shipping={$this->id_shipping}, name={$this->name}, phone={$this->phone}, " .
               "address={$this->address}, note={$this->note}, id_dangky={$this->id_dangky})";
    }
}
 ?>