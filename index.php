<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'on');


define('CONFIG_DIR',__DIR__.'/config');
require_once __DIR__.'/functions/database.php';

$sql ="SELECT prod_id, prod_title, prod_description, prod_price
FROM tbl_products
ORDER By prod_id ASC";

$result = getDB()->query($sql);

$userid = 0;
$cartItems = 0;

$userid = random_int(0,time());
//var_dump($userid);

// TODO ggf. prüfen, ob Cookies so in Ornung sind
// Cookie muss vor Session gesetzt werden
if (isset($_COOKIE['userId'])){
    $userid = (int) $_COOKIE['userId'];
}

if (isset($_SESSION['userId'])){
    $userid = (int) $_SESSION['userId'];
}

$url = $_SERVER['REQUEST_URI'];
$indexPHPPosition = strpos($url,'index.php');
$route = substr($url,$indexPHPPosition);
$route = str_replace('index.php','',$route);

if (strpos($route,'/cart/add/') !== false){
    $routeParts = explode('/', $route);
    $productId = (int) $routeParts[count($routeParts) - 1];
    $sql = "INSERT INTO tbl_cart SET crt_user_id = :userId, crt_product_id = :productId";
    $statement = getDB()->prepare($sql);

    $statement->execute([
        ':userId' => $userid,
        ':productId' => $productId,
    ]);
    header("Location: /shop/index.php");
    exit();
}

// TODO Logik zurm Überschreiben der Session-ID  folgt später nach Bedarf
setcookie('userId',$userid,strtotime('+30 days'));


$sql = "SELECT COUNT(crt_id) FROM tbl_cart WHERE crt_user_id =" . $userid;
$cartResults = getDB()->query($sql);
$cartItems = $cartResults->fetchColumn();
require __DIR__ . '/templates/main.php';




