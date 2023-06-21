<html>
<head>
<title>All items</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./public/assets/all_items.css">
</head>

<body>
<div class="main_body">
    <!-- twigs go here -->
    <?php 
    require_once("src/controller/dBHandler.php");
    include "src/controller/links.php";
    include "src/model/product.php";

    // initialise twig environment here
    // initialize db and connect
    $databaseObj = new DB();
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

        
        // create a new Product class and passes to twig
        $current_product = new Product($item);
        $allProducts[] = $current_product;
    
    }
    ?>
</div>
</body>