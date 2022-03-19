<?php

namespace app\core;

class Request {
    public function getPath() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        // SYNTAX: strpos(string, find, start = 0) => return index of '?'
        $position = strpos($path, '?');

        // that means we don't have ? in the URL
        if ($position === false) return $path;

        // SYNTAX: substr(string, start, length)
        return substr($path, 0, $position);
    }

    public function getMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody() {

    }
}