<?php

namespace app\controllers;

use app\Router;

class ProductController {

    // this function will render list of products
    public function index(Router $router) {
        $router->renderView('products/index');
    }

    public function create() {
        echo "Create Page";
    }

    public function update() {
        echo "Update Page";
    }

    public function delete() {
        echo "Delete Page";
    }
}