<?php

class PropertyTypeModel {
    private $id;
    private $en;
    private $kh;
    private $desc;

    // Constructor to initialize the object
    public function __construct($id, $kh, $en,$desc) {
        $this->id=$id;
        $this->en = $en;
        $this->kh = $kh;
        $this->desc = $desc;
    }

    public function getId() {
        return $this->id;
    }

    public function getEn() {
        return $this->en;
    }

    public function getKh() {
        return $this->kh;
    }

    public function getDesc() {
        return $this->desc;
    }

    // Setter methods to update object properties
    public function setKh($kh) {
        $this->kh = $kh;
    }
    public function setEn($en) {
        $this->en = $en;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    // You can also add methods for database interactions (e.g., save, delete)
}


?>