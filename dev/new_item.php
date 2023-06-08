<?php

// init server and connection]
$hostname = "db";
$user = "user";
$pass = "password";

$conn = new mysqli($hostname, $user, $pass);

if($conn->connect_error){
    die("failed to connect");
}

else {
    echo("connected");
}

# condition array, append conditions in which failed
$failed_conditions = array();

$conn->select_db("db");
$data_for_sql = array();
$form_data = $_GET;


// go over all aspects of form
//`item_name` TEXT NULL,
if (isset($form_data["item"]) && is_string($form_data["item"])) {
        # if item name is a compatible type and is set, append to our sql insert
        $data_for_sql["item_name"] = $form_data["item"];
    }
else { // if not set or not a string
    array_push($failed_conditions, "item");
}

//`item_vendor` TINYTEXT NULL
if (isset($form_data["vendor"]) && is_string($form_data["vendor"])) {
    $data_for_sql["item_vendor"] = $form_data["vendor"];
}
else {
    array_push($failed_conditions, "vendor");
}

//`item_skuid` INT(11) UNSIGNED NULL DEFAULT NULL,
$data_for_sql["item_skuid"] = 0;

//`item_price` FLOAT UNSIGNED NULL DEFAULT NULL,
if (isset($form_data["price"])) {
    $data_for_sql["item_price"] = floatval($form_data["price"]);
}
else {
    array_push($failed_conditions, "price");
}

//`item_opend` TINYINT(4) UNSIGNED NULL DEFAULT NULL,

if (array_key_exists("opend", $form_data)) {  // opend is only returned if set
    $data_for_sql["item_opend"] = 1; //$form_data["opend"];
}
else {
    $data_for_sql["item_opend"] = 0;
}

//`item_weight` FLOAT UNSIGNED NULL DEFAULT NULL,
if (isset($form_data["weight"])) {
    $data_for_sql["item_weight"] = intval($form_data["weight"]);
}
else {
    array_push($failed_conditions, "weight");
}

//`item_qty` INT(11) UNSIGNED NULL DEFAULT NULL,
if (isset($form_data["count"])) {
    $data_for_sql["item_qty"] = intval($form_data["count"]);
}
else {
    array_push($failed_conditions, "qty");
}

//`item_img_url` TEXT NULL,

//`item_date_add` DATE NULL DEFAULT NULL,
$data_for_sql["item_date_add"] = date('Y/m/d');

//`item_date_opend` DATE NULL DEFAULT NULL,
//`item_date_expiry` DATE NULL DEFAULT NULL,
//`item_expiration_peroid` INT(11) UNSIGNED NULL DEFAULT NULL



// test if failed array has contents, if so. Break the mysql insert and return failed parameters
if (empty($failed_conditions)){
    $keys = implode(',', array_keys($data_for_sql));  // use keys as columns header
    $values = "'".implode("', '", array_values($data_for_sql))."'";

    $sql = "INSERT INTO own_items ($keys) VALUES ($values)";

}
else {
    die(implode(",", $failed_conditions));
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

header("Location: new_item.html");
?>