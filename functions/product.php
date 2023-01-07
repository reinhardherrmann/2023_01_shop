<?php

function getAllProducts()
{
    $sql = "SELECT prod_id, prod_title, prod_description, prod_price
            FROM tbl_products
            ORDER By prod_id ASC";

    $result = getDB()->query($sql);
    if (!$result){
        return [];
    }
    $products = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $products[] = $row;
    }

    return $products;
}




















