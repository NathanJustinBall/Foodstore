<?php 

$vendor = '';
$barcode = '';  # barcode can also funciton as item name


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
    $output = shell_exec($shell);
    die($output);
}
else {
    die("no_scraper");
}


?>