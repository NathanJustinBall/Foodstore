<?php 
namespace App\model;

class Query {
    public $vendor = '';
    public $searchQuery = '';  // barcode also funcitons as item name

    public function __construct($vendor, $searchQuery){
        $this->searchQuery = $searchQuery;
        $this->vendor = $vendor;
       
    }

    public function asda(){
        $shell = escapeshellcmd("python3 /foodstore/dev/assets/scrapers/asda.py --barcode ".'"'.$this->searchQuery.'"');
        $output = exec($shell, $arr);
        // $output_parse = json_decode($output, true);

        return($arr[0]);
    }
    public function get(){
        if ($this->vendor === "asda"){
            return($this->asda());
        }
        else {  // pass all other scraper checks before we die..
            die("no_scraper");
        }
    }

}