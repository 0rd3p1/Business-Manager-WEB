<?php

$route = str_replace('/', '', parse_url($_SERVER['REQUEST_URI'])['path']);

if (!$route) $route = 'index';

if (!file_exists("controllers/{$route}.controller.php")) {
    abort(404);
}

require "controllers/{$route}.controller.php";

?>