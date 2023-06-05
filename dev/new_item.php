

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

$conn->select_db("db");
$data_for_sql = array();
$form_data = $_GET;

// go over all aspects of form
//`item_name` TEXT NULL,
if (isset($form_data["item"]) && is_string($form_data["item"])) {
        # if item name is a compatible type and is set, append to our sql insert
        $data_for_sql["item_name"] = $form_data["name"];
    }
else { // if not set or not a string
        die("name condition");
}

//`item_vendor` TINYTEXT NULL
if (isset($form_data["vendor"]) && is_string($form_data["vendor"])) {
    $data_for_sql["item_vendor"] = $form_data["vendor"];
}
else {
    die("vendor condition");
}

//`item_skuid` INT(11) UNSIGNED NULL DEFAULT NULL,
$data_for_sql["item_skuid"] = 0;

//`item_price` FLOAT UNSIGNED NULL DEFAULT NULL,
if (isset($form_data["price"]) && is_float($form_data["price"])) {
    $data_for_sql["item_price"] = $form_data["price"];
}
else {
    die("price condition");
}

//`item_opend` TINYINT(4) UNSIGNED NULL DEFAULT NULL,
if (isset($form_data["opend"])) {
    $data_for_sql["item_opend"] = $form_data["opend"];
}
else {
    die("opend condition");
}

//`item_weight` FLOAT UNSIGNED NULL DEFAULT NULL,
if (isset($form_data["weight"]) && is_float($form_data["weight"])) {
    $data_for_sql["item_weight"] = $form_data["weight"];
}
else {
    die("weight condition");
}

//`item_qty` INT(11) UNSIGNED NULL DEFAULT NULL,
if (isset($form_data["count"]) && is_integer($form_data["count"])) {
    $data_for_sql["item_qty"] = $form_data["count"];
}
else {
    die("weight condition");
}

//`item_img_url` TEXT NULL,
//`item_date_add` DATE NULL DEFAULT NULL,
//`item_date_opend` DATE NULL DEFAULT NULL,
//`item_date_expiry` DATE NULL DEFAULT NULL,
//`item_expiration_peroid` INT(11) UNSIGNED NULL DEFAULT NULL

var_dump($form_data);


#$sql = "INSERT INTO db ($_POST)"




?>