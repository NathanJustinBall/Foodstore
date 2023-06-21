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
        
        $rowArray = array();
        $colums = $databaseObj->getColumns();
        $databaseObj->close();
        $allProducts = array();
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
        $twigController = new Twig();
        $twigController->render('product.twig', ["product" => $allProducts]);
    }
}