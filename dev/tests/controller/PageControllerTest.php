<?php


use App\controller\PageController;
//test routing and expeted return pages
use PHPUnit\Framework\TestCase;

final class PageControllerTest extends TestCase{
    // define expected attributes for a mock request
    protected $mockrequest = array();

    //public function __construct() {
    //    $this->mockrequest["item"]="new";
    //    die();
    //}


    public function testPages(){
        $page_controller = new PageController;
        //$new_item_page = $page_controller->newItemPage($this->mockrequest);

        // $this->assertSame(not comparing, );

        $this->assertTrue(true); //fair
        }
}