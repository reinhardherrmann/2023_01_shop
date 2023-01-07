<?php

function getcurrentUserId()
{
    $userId = random_int(0, time());
//var_dump($userid);

// TODO ggf. prüfen, ob Cookies so in Ornung sind
// Cookie muss vor Session gesetzt werden
    if (isset($_COOKIE['userId'])) {
        $userId = (int)$_COOKIE['userId'];
    }

    if (isset($_SESSION['userId'])) {
        $userId = (int)$_SESSION['userId'];
    }
    return $userId;
}

















