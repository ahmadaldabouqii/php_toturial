<?php
/*
 * App Core Class
 * Creates URL & loads Core Controller
 * URL FORMAT - /controller/method/params
 */

class Core {
    // these variables will change as the URL changes
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->getURL();
        // Look in controllers for first value
        if($url && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            // if exists, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 index
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part of URL
        if(isset($url[1])){
            // Check to see if the method in exists in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
            }
        }
        echo $this->currentMethod;
    }

    public function getURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
        return false;
    }
}