<?php
// all routes are dfined here
use App\controller\PageController;

$route->respond('GET', '/', [PageController::class, 'allItemsPage']);
$route->respond('GET', '/newitem', [PageController::class, 'newItemPage']);
