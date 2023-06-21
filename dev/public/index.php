<?php
require('../vendor/autoload.php');

$route = new \Klein\Klein();
include('../src/routes.php');


$route->dispatch();
exit();
