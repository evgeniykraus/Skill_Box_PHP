<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

    <h1>Каталог</h1>
    <div class="items">
        <?php
        foreach ($products as $id => $product) {
            ?>
            <figure>
                <p><img src=<?= $product['img'] ?> alt=""/></p>
                <figcaption><?= $product['name'] ?></figcaption>
                <a href="form.php?id=<?= $product['id'] ?>" class="btn">Купить</a>
            </figure>
        <?php } ?>
    </div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
