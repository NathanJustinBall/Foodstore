<?php
namespace App\Utils;


class Twig {
    protected $twig = null;
    public function __construct() {
        // define loading vars for twiggy   
        $loader = new \Twig\Loader\FilesystemLoader('../src/twigs');
        $this->twig = new \Twig\Environment($loader,); 


    }

    public function twig_render($twigName, $twigArgs) {
        echo "rendering";
        // load template
        $tmp = $this->twig->load("product.twig");
        echo $tmp->render(["allProducts" => $twigArgs]);
    }    
}