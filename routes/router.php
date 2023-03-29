<?php

function load(string $controller, string $action)
{
    try {
        // Check if controller exist
        $controllerNamespace = "\\ScandiwebApp\\controllers\\$controller";
        if (!class_exists($controllerNamespace)) {
            var_dump("HELLOW1");
            throw new Exception("Controller $controller does not exist");
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            var_dump("HELLOW2");
            throw new Exception("Method $action does not exist in controller $controller");
        }
        $controllerInstance->$action();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$routes = [
    "GET" => [
        "/" => fn () => require '../public/list.php',
        "/add-product" => fn () => require '../public/addProducts.php'
    ],
    "POST" => [
        "/saveproduct" => fn () => load("ProductController", "saveProduct"),
        "/deleteproducts" => fn () => load("ProductController", "deleteProducts")
    ],
];
