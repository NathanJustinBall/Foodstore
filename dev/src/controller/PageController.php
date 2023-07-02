<?php
namespace App\controller;
use App\model\Product;
use App\controller\dBHandler;
use App\Utils\Twig;

class PageController {

    public static function allItemsPage() {
        // initialize db and connect
        $databaseObj = new dBHandler();
        $items = $databaseObj->getAll();  // in theory with big dB's should request how many rows then iterate over rows
        // var_dump($items);
        $databaseObj->close();
        $allProducts = array();
        //var_dump($items);
        foreach($items as $item) {
            // create a new Product class and passes to twig renderer
            $current_product = new Product($item);
            $allProducts[] = $current_product;
        }
        //var_dump($allProducts);
        $twigController = new Twig();
        $twigController->render('product.twig', array("allProducts"=>$allProducts));
    }

    public static function newItemPage($request) {
 
        $twigController = new Twig();
        //if ($item == null)
        $twigController->render('item.twig', array("item"=>$request->item));
    }
}