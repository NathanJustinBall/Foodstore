<?php
namespace App\model;
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


    public function insert($item) {
        $column_array = $this->getColumns();

        $all_keys = array_keys($item);
        foreach($all_keys as $header) {  // selecting the title of each
            if (in_array($header, array_keys($column_array))){
                // get current itme value type
                //$curr_type = gettype($item[$header]);
                //$column_type = $column_array[$header];
                //if ($curr_type == $column_type){
                    // checking values of array to match against expected db entry
                    continue;
                //}
                //else {
                //    return array("invalid_value", $item[$header], $curr_type, $column_array[$header], $column_type);
               // }
            }
            else {
                return "invalid_col";
            } 
        }

        $key = implode(',', array_keys($item));  // use keys as columns header
        $value = "'".implode("', '", array_values($item))."'";

        $sql = "INSERT INTO $this->tableName ($key) VALUES ($value)";
        if ($this->connection->query($sql) === TRUE) {
            return "New record created successfully";
          } else {
            return "Error: " . $sql . "<br>" . $this->connection->error;
          }
    }

    public function getColumns() {  // gets names of columns from database, asigns array of column: data_type
        $columnArray = array();
        $columns = $this->connection->query("SELECT * from " . $this->tableName);
        
        while ($columnInfo = $columns->fetch_field()){

            $columnArray[$columnInfo->name] = $columnInfo->type; // returns number relative to tpye
        }
        return $columnArray;
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
