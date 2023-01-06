<?php
error_reporting(-1);
ini_set('display_errors', 'on');


define('CONFIG_DIR',__DIR__.'/config');
require_once __DIR__.'/functions/database.php';

$sql ="SELECT prod_id, prod_title, prod_description, prod_price
FROM tbl_products
ORDER By prod_id ASC";

$result = getDB()->query($sql);

require __DIR__ . '/templates/main.php';




