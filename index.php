<?php
error_reporting(-1);
ini_set('display_errors', 'on');

$dsn ="mysql:host=localhost;dbname=web283_10;charset=utf8";
$username ="web283";
$password ="saeger";
$db = new PDO($dsn,$username,$password);

$sql ="SELECT prod_id, prod_title, prod_description, prod_price
FROM tbl_products
ORDER By prod_id ASC";
$result = $db->query($sql);



?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reinhards Shop</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<header class="jumbotron">
    <div class="container">
        <h1>Willkommen auf meinem Online Shop</h1>
    </div>
</header>

<section class="container" id="product">
    <div class="row">
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="col">
            <?php include 'card.php' ?>
        </div>
        <?php endwhile; ?>

    </div>
</section>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
