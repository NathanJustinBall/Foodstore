<?php
namespace App\controller;
use App\controller\config;

class dBHandler
{
    private $connection = null;
    protected $tableName = "";

    public function __construct()
    {
        $config = new Config("../config/config.json");
        $hostname = $config->getParameter('db.hostname');
        $user = $config->getParameter('db.user');
        $pass = $config->getParameter('db.password');
        $this->tableName = $config->getParameter("db.tableName");
        $selected_db = "db";

        $this->connection = new \mysqli($hostname, $user, $pass, $selected_db);
        if ($this->connection->connect_error) {
            die("failed to establish connection");
        }
    }

    public function close(){
        $this->connection->close();
    }

    public function insert($key, $value) {
        $sql = "INSERT INTO $this->tableName ($key) VALUES ($value)";
        if ($this->connection->query($sql) === TRUE) {
            return "New record created successfully";
          } else {
            return "Error: " . $sql . "<br>" . $this->connection->error;
          }
    }

    public function getColumns() {
        return $this->connection->query("SELECT column_name from INFORMATION_SCHEMA.COLUMNS where
        table_schema = 'db' and table_name = $this->tableName");
    }
    
    /**
     * @return bool|mysqli_result|null
     */
    public function getAll(): ?array
    {
        // Retrieve records from the table
        $sql = "SELECT * FROM $this->tableName";
        $result = $this->connection->query($sql);
        $rows = array();
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
        

        // return null;
    }

    public function getById($item_id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE id=$item_id";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function getByVendor($vendor)
    {
        $multiResults = array();
        $sql = "SELECT * FROM $this->tableName WHERE vendor=$vendor";
        $result = $this->connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            $row_id = array_shift($row);  // both sets the id as key and removes it from the field
            $multiResults[$row[$row_id]] = $row;
        }
        return $multiResults;
    }

}
