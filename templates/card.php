
<div class="card">
    <div class="card-title"><?= $row['prod_title'];?></div>
    <img src="https://placekitten.com/400/220" class="card-img-top" alt="">
    <div class="card-body">
        <?= $row['prod_description'];?><br>
        <hr class="solid">
        Netto Preis: <?= number_format((float)$row['prod_price']/100, 2, ',', '.');;
        echo ' €'?>
    </div>
    <div class="card-footer">
        <a href="" class="btn btn-primary btn-sm">Details</a>
        <a href="index.php/cart/add/<?= $row['prod_id'] ?>" class="btn btn-success btn-sm">In den Warenkorb</a>
    </div>

</div>
