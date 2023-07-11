<?php
// all routes are dfined here
use App\controller\PageController;


$route->respond('GET', '/allitems', [PageController::class, 'allItemsPage']);
$route->respond('GET', '/newitem/[:item]', [PageController::class, 'newItemPage']);
$route->respond('POST', '/addnewitem', [PageController::class, 'addNewItem']);
