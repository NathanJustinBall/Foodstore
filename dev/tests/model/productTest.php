<?php
use App\model\Product;
use PHPUnit\Framework\TestCase;


final class productTest extends TestCase{
    public function testSetName(){ //test set fuction
        $product = new Product([]);
        $name = "cheese";  
        $product->set_name($name);  
        $this->assertSame($name, $product->get_name());
    
    }

    public function getFakeProd() {
        return array (
            'ID' => NULL,
            'item_name' => 'Somerset Brie',
            'item_vendor' => 'asda',
            'item_skuid' => '0',
            'item_price' => '2.25',
            'item_opend' => '0',
            'item_weight' => '160',
            'item_qty' => '1',
            'item_img_url' => 'https://ui.assets-asda.com/dm/asdagroceries/5057172405169',
            'item_date_add' => '2023-06-11',
            'item_date_opend' => '2023-06-13',
            'item_date_expiry' => '2023-08-15',
            'item_expiration_period' => '4',
        );
    }

    public function testConstruct() { // using prefixed array, test product assumilation
        $fakePROD = $this->getFakeProd();
        $productClass = new Product($fakePROD);
        
        $item_name = "Somerset Brie";
        $item_vendor = 'asda';
        $item_skuid = 0;
        $item_price = '2.25';
        $item_opend = 0;
        $item_weight = '160';
        $item_qty = '1';
        $item_img_url = 'https://ui.assets-asda.com/dm/asdagroceries/5057172405169';
        $item_date_add = '2023-06-11';
        $item_date_opend = '2023-06-13';
        $item_date_expiry = '2023-08-15';
        $item_expiration_period = '4';
        $this->assertSame($item_name, $productClass->get_name());
        $this->assertSame($item_vendor, $productClass->get_vendor());
        $this->assertSame($item_skuid, $productClass->get_id());
        $this->assertSame($item_price, $productClass->get_price());
        $this->assertSame($item_opend, $productClass->get_opend());
        $this->assertSame($item_weight, $productClass->get_weight());
        $this->assertSame($item_qty, $productClass->get_qty());
        $this->assertSame($item_img_url, $productClass->get_img_url());
        $this->assertSame($item_date_add, $productClass->get_item_date_add());
        $this->assertSame($item_date_opend, $productClass->get_item_date_opend());
        $this->assertSame($item_date_expiry, $productClass->get_item_date_expiry());
        $this->assertSame($item_expiration_period, $productClass->get_expiration_period());

    }

}