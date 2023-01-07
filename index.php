<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'on');


define('CONFIG_DIR',__DIR__.'/config');
require_once __DIR__ . '/includes.php';

$userId = getcurrentUserId();
$products = getAllProducts();

// TODO Logik zurm Überschreiben der Session-ID  folgt später nach Bedarf
setcookie('userId',$userId,strtotime('+30 days'));

$cartItems = countProductsInCart($userId);

require __DIR__ . '/templates/main.php';




