<html>
<head>
<title>All items</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="all_items.css">
</head>

<body>
<div class="main_body">
    <!-- twigs go here-->
    <?php 
    include "dBHandler.php";
    include "links.php";
    include "product.php";

    // initialise twig environment here
    // initialize db and connect
    $databaseObj = new DB();
    $items = $databaseObj.getAll();  // in theory with big dB's should request how many rows then iterate over rows
    foreach($items as $item) {
        // create a new Product class and passes to twig
        $current_product = new Product($item);

    }
    ?>
</div>
</body>