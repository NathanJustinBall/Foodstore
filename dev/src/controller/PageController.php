<?php
namespace App\controller;
use App\model\Product;
use App\model\dBHandler;
use App\Utils\Twig;
use App\model\ProductRepo;
use App\model\Query;

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
        if ($request->item == "new") {
            $args = array("item"=>"new");
        }
        else {
            parse_str($request->item, $out);
            $args = array("item"=>$out);
        }
        
        // $prodObj = new Product($out);

        return $twigController->render('item.twig', $args);
    }

    public static function addNewItem ($request) {
        if ($request->param("check_item")){ // if checking item, Query
            $query = new Query($request->param("vendor"), $request->param("barcode"));
            // redirect back to newitem page with array from Query
            $url = json_decode($query->get());
            $uri = http_build_query($url);
            header("location: ./newitem/".$uri);
            
        }
        else {
            $productRepo = new ProductRepo();
            $productRepo->new($request);
            // add new item to DB
        }

        
    }
}