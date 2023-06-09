<?php 
require 'product.php';

$vendor = '';
$barcode = '';  # barcode also funcitons as item name


if (isset($_GET['vendor'])) {
    $vendor = $_GET['vendor'];
}
if (isset($_GET['barcode'])){
    $barcode = $_GET['barcode'];
}

if ($vendor === '') {
    die('no_vend');  # kill condition 
}


// $request->getPostParameter('vendor')

//load appropirate scraper 

if ($vendor === "asda"){
    $shell = escapeshellcmd("python3 /foodstore/dev/asda.py --barcode ".'"'.$barcode.'"');
    //echo $shell;
    $output = exec($shell, $arr);
    //$output_parse = json_decode($arr, true);
    var_dump($arr);

    # create object
    $product = new Product($arr);
    
    echo($product->get_img_url());
    die($arr);
}
else {
    die("no_scraper");
}


?>