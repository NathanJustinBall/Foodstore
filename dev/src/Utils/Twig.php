<?php
namespace App\Utils;

class Twig {
    protected $twig = null;
    public function __construct() {
        // define loading vars for twiggy
        $loader = new \Twig\Loader\FilesystemLoader('../src/twigs');
        $this->twig = new \Twig\Environment($loader, [
            'cache' => './dev/cache',
            ]);
    }
    public function render($twigName, $twigArgs) {
        echo $this->twig->render($twigName, $twigArgs);
    }
        
    
}