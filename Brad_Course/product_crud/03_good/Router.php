<?php

namespace app;

class Router {
    // we need to save given routes to somewhere
    public array $getRoutes  = [];
    public array $postRoutes = [];
    public Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve() {
        // detect what's the current URL
        $currentURL = $_SERVER['PATH_INFO'] ?? '/';

        // We want to take that function from getRoutes or postRoutes, so we need the current method also.
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $func = $this->getRoutes[$currentURL] ?? null;
        } else {
            $func = $this->postRoutes[$currentURL] ?? null;
        }

        if ($func) {
            // execute function
            call_user_func($func, $this);
        } else {
            echo "Page not found";
        }
    }

    public function renderView($view, $params = []){
        foreach ($params as $key => $value){
            $$key = $value;
        }

        // I want to start cashing of the output
        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . '/views/_layout.php';
    }
}