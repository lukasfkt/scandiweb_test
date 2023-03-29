<?php
include_once('../db/initialize.php');
require "../vendor/autoload.php";
require "../routes/router.php";

try {
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
    $request = $_SERVER["REQUEST_METHOD"];

    if (!isset($routes[$request])) {
        require '../public/notFound.php';
        exit;
    }

    if (!array_key_exists($uri, $routes[$request])) {
        require '../public/notFound.php';
        exit;
    }

    $controller = $routes[$request][$uri];
    $controller();
} catch (Exception $e) {
    $e->getMessage();
}
