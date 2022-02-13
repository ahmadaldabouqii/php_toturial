<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\ProductController;
use app\router;

$router = new Router();

// when get request made on / (slash) i Wanna use specific class or function.
// this means whenever the URL will be (/) run class ProductController with index action and so on...
$router->get('/', [new ProductController(), 'index']);
$router->get('/products', [new ProductController(), 'index']);
$router->get('/products/index', [new ProductController(), 'index']);
$router->get('/products/create', [new ProductController(), 'create']);
$router->post('/products/create', [new ProductController(), 'create']);
$router->get('/products/update', [new ProductController(), 'update']);
$router->post('/products/update', [new ProductController(), 'update']);
$router->post('/products/delete', [new ProductController(), 'delete']);
$router->get('/products/delete', [new ProductController(), 'delete']);

// will detect what's the current rout and will execute the corresponding function
$router->resolve();