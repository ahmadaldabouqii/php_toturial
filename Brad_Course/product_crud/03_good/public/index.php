<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\ProductController;
use app\router;

$router = new Router();

// when get request made on / (slash) i wanna use specific class or function.
// this means whenever the URL will be (/) run class ProductController with index action
$router->get('/', array(ProductController::class, 'index'));
$router->get('/products', array(ProductController::class, 'index'));
$router->get('/products/create', array(ProductController::class, 'create'));
$router->get('/products/update', array(ProductController::class, 'update'));
$router->post('/products/update', array(ProductController::class, 'update'));
$router->post('/products/delete', array(ProductController::class, 'delete'));
$router->post('/products/create', array(ProductController::class, 'create'));

$router->resolve();