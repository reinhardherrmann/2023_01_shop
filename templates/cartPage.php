<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="/assets/icons/site.webmanifest">
    <title>Reinhards Shop</title>
    <base href="<?= $baseUrl ?>">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

    <?php include __DIR__.'/navbar.php'; ?>

<header class="jumbotron">
    <div class="container">
        <h1>Willkommen auf meinem Online Shop</h1>
    </div>
</header>

<section class="container" id="cartItems">
    <?php foreach ($cartItems as $cartItem): ?>
    <div class="row">
    <?php include __DIR__.'/cartItem.php'; ?>
    </div>
    <?php endforeach; ?>

</section>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>