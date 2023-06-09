<?php

// main object handler for products

class Product{
    protected $name = "";
    protected $vendor = "";
    protected $price = 0;
    protected $weight = 0;
    protected $url = "";
    protected $img_url = "";
    protected $product_id ="";

    function __construct(array $product_json){
        if (!empty($product_json)){
            if (!empty($product_json["name"])){
                $this->set_name($product_json["name"]);
            }
            else {
                $this->set_name(null);
            }
            if (!empty($product_json["vendor"])){
                $this->set_vendor($product_json["vendor"]);
            }
            else{
                $this->set_vendor(null);
            }
            if (!empty($product_json["price"])){
                $this->set_price($product_json["price"]);
            }
            else{
                $this->set_price(null);
            }
            if (!empty($product_json["url"])){
                $this->set_url($product_json["url"]);
            }
            else{
                $this->set_url(null);
            }
            if (!empty($product_json["image_adr"])){
                $this->set_img_url($product_json["image_adr"]);
            }
            else{
                $this->set_img_url(null);
            }
            if (!empty($product_json["weight"])){
                $this->set_weight($product_json["weight"]);
            }
            else{
                $this->set_weight(null);
            }
            if (!empty($product_json["id"])){
                $this->set_product_id($product_json["id"]);
            }
            else{
                $this->set_product_id(null);
            }
            
        }
    }

    // getters & setters
    public function get_name(): string{
        return $this->name;
    }
    public function get_url(): string{
        return $this->url;
    }
    public function get_img_url(): string{
        return $this->img_url;
    }
    public function get_id(): int{
        return $this->product_id;
    }
    public function get_weight(): int{
        return $this->weight;
    }
    public function get_price(): float{
        return $this->price;
    }
    public function get_vendor(): string{
        return $this->vendor;
    }

    public function set_name(?string $name){
        $this->name = $name;
    }
    public function set_url(?string $url){
        $this->url = $url;
    }
    public function set_img_url(?string $img_url){
        $this->img_url = $img_url;
    }
    public function set_product_id(?int $id){
        $this->product_id = $id;
    }
    public function set_weight(?int $weight){
        $this->weight = $weight;
    }
    public function set_price(?float $price){
        $this->price = $price;
    }
    public function set_vendor(?string $vendor){
        $this->vendor = $vendor;
    }


}

?>