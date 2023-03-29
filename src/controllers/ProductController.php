<?php

namespace ScandiwebApp\controllers;

use ScandiwebApp\classes\Book;
use ScandiwebApp\classes\DVD;
use ScandiwebApp\classes\Furniture;
use ScandiwebApp\classes\Product;

class ProductController
{
    public function saveProduct()
    {
        $payload = array();
        $payload = $_REQUEST;
        if (!$payload) {
            $json = file_get_contents('php://input');
            if (!$json) {
                http_response_code(403);
                exit();
            }
            $payload = (array)json_decode($json);
        }
        if (!$payload['name'] || !$payload['sku'] || !$payload['price'] || !$payload['productType']) {
            var_dump("1");
            http_response_code(403);
            exit();
        }
        switch ($payload['productType']) {
            case 'dvd':
                if (!$payload['size']) {
                    http_response_code(403);
                    exit();
                }
                $dvd = new DVD($payload);
                if ($dvd->save()) {
                    http_response_code(201);
                    exit();
                }
                break;
            case 'furniture':
                if (!$payload['height'] || !$payload['width'] || !$payload['lenght']) {
                    http_response_code(403);
                    exit();
                }
                $furniture = new Furniture($payload);
                if ($furniture->save()) {
                    http_response_code(201);
                    exit();
                }
                break;
            case 'book':
                if (!$payload['weight']) {
                    http_response_code(403);
                    exit();
                }
                $book = new Book($payload);
                if ($book->save()) {
                    http_response_code(201);
                    exit();
                }
                break;
        }
        http_response_code(403);
        exit();
    }

    public function deleteProducts()
    {
        $payload = array();
        $payload = $_REQUEST;
        if (!$payload) {
            $json = file_get_contents('php://input');
            if (!$json) {
                http_response_code(403);
                exit();
            }
            $payload = (array)json_decode($json);
        }
        if (Product::delete($payload)) {
            http_response_code(200);
            exit();
        };
        http_response_code(403);
        exit();
    }
}
