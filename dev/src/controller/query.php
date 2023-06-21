<?php 
require 'src/controller/product.php';

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
    $shell = escapeshellcmd("python3 /foodstore/dev/assets/scrapers/asda.py --barcode ".'"'.$barcode.'"');
    //echo $shell;
    $output = exec($shell, $arr);
    $output_parse = json_decode($output, true);
    # create object
    $product = new Product($output_parse);
    //var_dump($arr);
    die($arr[0]);
}
else {
    die("no_scraper");
}


?>