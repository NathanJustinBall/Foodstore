<?php
namespace App\Utils;


class Twig {
    protected $twig = null;
    public function __construct() {
        // define loading vars for twiggy   
        $loader = new \Twig\Loader\FilesystemLoader('../src/twigs');
        $loader->addPath("../public/", "public");
        $this->twig = new \Twig\Environment($loader,); 

    }

    public function render($twigName, $twigArgs) {
        $tmp = $this->twig->load($twigName);
        echo $tmp->render($twigArgs);
    }    
}