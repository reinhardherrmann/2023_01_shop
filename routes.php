<?php

$url = $_SERVER['REQUEST_URI'];
$indexPHPPosition = strpos($url, 'index.php');
$route = substr($url, $indexPHPPosition);
$route = str_replace('index.php', '', $route);
$baseUrl = substr($url, 0, $indexPHPPosition);

$userId = getcurrentUserId();
$countCartItems = countProductsInCart($userId);

$route = null;
if (false !== $indexPHPPosition){
    $route = substr($url, $indexPHPPosition);
    $route = str_replace('index.php', '', $route);
}

if (!$route) {
    $products = getAllProducts();
    require __DIR__ . '/templates/main.php';
    exit();
}

if (strpos($route, '/cart/add/') !== false) {
    $routeParts = explode('/', $route);
    $productId = (int)$routeParts[count($routeParts) - 1];

    addProductToCart($userId, $productId);
    header("Location: ". $baseUrl . "index.php");
    exit();
}

if (strpos($route, '/cart') !== false) {

    $cartItems = getCartItemsForUserId($userId);
    require __DIR__ . '/templates/cartPage.php';
    exit();
}
















