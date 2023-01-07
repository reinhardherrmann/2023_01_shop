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

$userid = 1337;
$cartItems = 0;

if (isset($_SESSION['userId'])){
    $userid = (int) $_SESSION['userId'];
}
if (isset($_COOKIE['userId'])){
    $userid = (int) $_COOKIE['userId'];
}

$sql = "SELECT COUNT(crt_id) FROM tbl_cart WHERE crt_user_id =" . $userid;
$cartResults = getDB()->query($sql);
$cartItems = $cartResults->fetchColumn();
require __DIR__ . '/templates/main.php';




