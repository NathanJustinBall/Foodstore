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
        $rowArray = array();
        $databaseObj->close();
        $allProducts = array();
        //var_dump($items);
        foreach($items as $item) {
            // each column is treated as a key, and the value of that rowXcolumn is the key value
            // var_dump($item);
            $row = array();
            foreach ($item as $key => $value) {
                $row[$key] = $value;
                
            }

            $rowArray[] = $row;

            // create a new Product class and passes to twig renderer
            $current_product = new Product($item);
            $allProducts[] = $current_product;
        
        }
        //var_dump($allProducts);
        $twigController = new Twig();
        $twigController->twig_render('product.twig', $allProducts);
    }
}