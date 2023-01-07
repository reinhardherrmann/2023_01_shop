<?php
function addProductToCart(int $userId, int $productId){
    $sql = "INSERT INTO tbl_cart SET crt_user_id = :userId, crt_product_id = :productId";
    $statement = getDB()->prepare($sql);

    $statement->execute([
        ':userId' => $userId,
        ':productId' => $productId,
    ]);
}


function countProductsInCart(int $userId){
    $sql = "SELECT COUNT(crt_id) FROM tbl_cart WHERE crt_user_id =" . $userId;
    $cartResults = getDB()->query($sql);
    if ($cartResults === false){
        var_dump(printDBErrorMessage());
        return 0;
    }
    $cartItems = $cartResults->fetchColumn();
    return $cartItems;
}

function getCartItemsForUserId($userId):array{

    $sql ="SELECT tbl_cart.crt_product_id, tbl_products.prod_title, tbl_products.prod_description, 
            tbl_products.prod_price as prod_price
            FROM tbl_cart
            JOIN tbl_products ON(tbl_cart.crt_product_id = tbl_products.prod_id)
            WHERE crt_user_id = ".$userId;
    $results = getDB()->query($sql);
    if ($results === false) {
        return [];
    }
    $found = [];
    while ($row = $results->fetch()){
        $found[] = $row;
    }
    return $found;
}






















