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






















