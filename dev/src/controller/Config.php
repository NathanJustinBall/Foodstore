<?php
namespace App\controller;

class Config{
    protected array $contents = array();

    function __construct($config_file){
        $load_file = file_get_contents($config_file);
        $this->contents = json_decode($load_file, true);
    }
    function getParameter(string $parameter) { // if params dot notation
        $keys = explode('.', $parameter);
        $iterator = $this->contents;
        foreach ($keys as $key) {
            if (isset($iterator[$key])) {
                $iterator = $iterator[$key];
            } else {
                return null;
            }
        }

        return $iterator;
    }
}
