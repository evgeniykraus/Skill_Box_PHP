<?php
//include 'lib/thumbs-master/thumbs.php';
include 'output_img.php';
include 'drop_img.php';

//$image = new Thumbs(__DIR__ . '/img/originals/img-01.jpg');
//$image->cut(300, 300);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Photo Gallery — Practice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/reset.css" rel="stylesheet">
    <link href="lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <h1>Amazing Photo Gallery</h1>

    <div class="top-menu">
        <label for="photo">
            <form action="" method="post">
                <input type="submit" value="Удалить выбранные фото"/>
                Выбрать все фото: <input type="checkbox" />
            </form>
            <br>
            <form action="route/create/" method="get">
                <input type="submit" value="Добавить фото"/>
            </form>

        </label>
    </div>

    <div id="gallery">
        <?= outputImg() ?>

        <?php
        dropImg();
        ?>
    </div>

</div>

<script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
</body>
</html>