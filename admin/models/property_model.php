<?php

class PropertyModel {
    public $name="";
    public $statusId;
    public $typeId;
    public $price;
    public $desc="";
    public $image;

    // Constructor to initialize the object
    public function __construct( $name,$price,$image,$desc,$statusId,$typeId) {
        $this->name=$name;
        $this->price=$price;
        $this->image=$image;
        $this->typeId=$typeId;
        $this->statusId=$statusId;
        $this->desc = $desc;
    }
}


?>