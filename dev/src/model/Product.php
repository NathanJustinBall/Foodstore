<?php
namespace App\model;
// main object handler for products

class Product
{
    protected $name = "";
    protected $vendor = "";
    protected $price = 0;
    protected $weight = 0;
    protected $url = "";
    protected $img_url = "";
    protected $product_id = 0;
    protected $qty = 0;
    protected $expiration_period = 0;  // days until product expires
    protected $item_date_opend = "";
    protected $item_date_expiry = "";
    protected $item_date_add = "";
    protected $item_opend = 0;  //boolean int
    protected $json = array();

    function __construct(array $productArray)
    {
        $this->json = $productArray;
        //var_dump($productArray["item_name"]);
        if (!empty($productArray)) {
            if (!empty($productArray["item_name"])) {
                $this->set_name($productArray["item_name"]);
            } else {
                $this->set_name(null);
            }
            if (!empty($productArray["item_vendor"])) {
                $this->set_vendor($productArray["item_vendor"]);
            } else {
                $this->set_vendor(null);
            }
            if (!empty($productArray["item_price"])) {
                $this->set_price($productArray["item_price"]);
            } else {
                $this->set_price(null);
            }
            if (!empty($productArray["item_url"])) {
                $this->set_url($productArray["item_url"]);
            } else {
                $this->set_url(null);
            }
            if (!empty($productArray["item_img_url"])) {
                $this->set_img_url($productArray["item_img_url"]);
            } else {
                $this->set_img_url(null);
            }
            if (!empty($productArray["item_weight"])) {
                $this->set_weight($productArray["item_weight"]);
            } else {
                $this->set_weight(null);
            }
            if (!empty($productArray["item_skuid"])) {
                $this->set_product_id($productArray["item_skuid"]);
            } else {
                $this->set_product_id(null);
            }
            if (!empty($productArray["item_qty"])) {
                $this->set_qty($productArray["item_qty"]);
            } else {
                $this->set_qty(null);
            }
            if (!empty($productArray["item_expiration_peroid"])) {
                $this->set_expiration_peroid($productArray["item_expiration_peroid"]);
            } else {
                $this->set_expiration_peroid(null);
            }
            if (!empty($productArray["item_date_opend"])) {
                $this->set_item_date_opend($productArray["item_date_opend"]);
            } else {
                $this->set_item_date_opend(null);
            }

            if (!empty($productArray["item_date_expiry"])) {
                $this->set_item_date_expiry($productArray["item_date_expiry"]);
            } else {
                $this->set_item_date_expiry(null);
            }
            if (!empty($productArray["item_date_add"])){
                $this->set_item_date_add($productArray["item_date_add"]);
            } else {
                $this->set_item_date_add(null);
            }
            if (!empty($productArray["item_opend"])){
                $this->set_item_opend($productArray["item_opend"]);
            } else {
                $this->set_item_opend(null);
            }


        }
    }

    // getters & setters
    public function get_json(): ?array
    {
        return $this->json;
    }
    public function get_name(): ?string
    {
        return $this->name;
    }
    public function get_opend(): ?int
    {
        return $this->item_opend;
    }

    public function get_url(): ?string
    {
        return $this->url;
    }

    public function get_img_url(): ?string
    {
        return $this->img_url;
    }

    public function get_id(): ?int
    {
        return $this->product_id;
    }
    public function get_qty(): int
    {
        return $this->qty;
    }

    public function get_weight(): ?string
    {
        return $this->weight;
    }

    public function get_price(): float
    {
        return $this->price;
    }

    public function get_vendor(): string
    {
        return $this->vendor;
    }
    public function get_expiration_period(): int
    {
        return $this->expiration_period;
    }
    public function get_item_date_expiry(): string 
    {
        return $this->item_date_expiry;
    }
    public function get_item_date_opend(): string
    {
        return $this->item_date_opend;
    }
    public function get_item_date_add(): string
    {
        return $this->item_date_add;
    }

    public function set_name(?string $name)
    {
        $this->name = $name;
    }
    public function set_item_opend(?int $opend)
    {
        $this->item_opend = $opend;
    }

    public function set_url(?string $url)
    {
        $this->url = $url;
    }
    public function set_qty(?int $qty)
    {
        $this->qty = $qty;
    }

    public function set_img_url(?string $img_url)
    {
        $this->img_url = $img_url;
    }

    public function set_product_id(?int $id)
    {
        $this->product_id = $id;
    }

    public function set_weight(?string $weight)
    {
        $this->weight = $weight;
    }

    public function set_price(?float $price)
    {
        $this->price = $price;
    }

    public function set_vendor(?string $vendor)
    {
        $this->vendor = $vendor;
    }
    public function set_expiration_peroid(?int $expiration_period) 
    {
        $this->expiration_period = $expiration_period;
    }
    public function set_item_date_expiry(?string $item_date_expiry)
    {
        $this->item_date_expiry = $item_date_expiry;
    }
    public function set_item_date_opend(?string $item_date_opend) 
    {
        $this->item_date_opend = $item_date_opend;
    }
    public function set_item_date_add(?string $item_date_add)
    {
        $this->item_date_add = $item_date_add;
    }

}

?>