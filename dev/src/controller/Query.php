<?php 
namespace App\controller;

class Query {
    public $vendor = '';
    public $searchQuery = '';  # barcode also funcitons as item name

    public function __construct($vendor, $searchQuery){
        $this->searchQuery = $searchQuery;
        if ($vendor === "asda"){
            $this->asda();
        }
        else {  // pass all other scraper checks before we die..
            die("no_scraper");
        }
    }

    public function asda(){
        $shell = escapeshellcmd("python3 /foodstore/dev/assets/scrapers/asda.py --barcode ".'"'.$this->searchQuery.'"');
        //echo $shell;
        $output = exec($shell, $arr);
        $output_parse = json_decode($output, true);
        //var_dump($arr);
        die($arr[0]);
    }

}