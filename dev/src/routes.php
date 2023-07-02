<?php
// all routes are dfined here
use App\controller\PageController;
use App\controller\ProductRepo;

$route->respond('GET', '/', [PageController::class, 'allItemsPage']);
$route->respond('GET', '/newitem/[:item]', [PageController::class, 'newItemPage']);
$route->respond('POST', '/addnewitem', [ProductRepo::class, 'new']);
