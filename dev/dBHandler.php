<?php
include 'config.php';
class DB {
    public $connection = null;

    public function __construct() { 
        $config = new Config("./not_dev/config.json");

        $hostname = $config->getParameter('hostname');   
        $user = $config->getParameter('user');
        $pass = $config->getParameter('password');
        $selected_db = "db";
        $this->connection = new mysqli($hostname, $user, $pass, $selected_db);
        if ($this->connection->connect_error){
            die("falied to establish connection");
        }
    }

    public function getAll(){
        // Retrieve records from the table
        $sql = "SELECT * FROM own_items";
        $result = $this->connection->query($sql);
        if ($result->num_rows == 1){
            return $result;
        }
        return null;
    }

    public function getById($item_id) {
        $sql = "SELECT * FROM own_items WHERE id=$item_id";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function getByVendor($vendor) {
        $multiResults = array();
        $sql = "SELECT * FROM own_items WHERE vendor=$vendor";
        $result = $this->connection->query($sql);
        while ($row = $result->fetch_assoc()){
            $row_id = array_shift($row);  // both sets the id as key and removes it from the field
            $multiResults[$row[$row_id]] = $row;
        }
        return $multiResults;
    }

}





?>