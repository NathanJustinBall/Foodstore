<?php
class Config{
    protected $contents = array();

    function __construct($config_file){
        $this->contents = file_get_contents($config_file);

    }
    function getParameter(string $paramter) {
        if (in_array($paramter, $this->contents)) {
            return $this->contents[$paramter];
        }
        return null;

    }
}

?>