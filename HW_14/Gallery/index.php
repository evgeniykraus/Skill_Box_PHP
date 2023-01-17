<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
?>

<form action="route/create/" method="get">
    <input class="btn" type="submit" value="Добавить фото"/>
</form>

<form method="post">

    <div id="gallery">
        <!--            Выводит картинки-->
        <?php
        outputImg();
        ?>

    </div>

    <label for="container">
        <input class="btn2" type="submit" value="Удалить выбранные фото"/>
        <input type="hidden" name="drop" value="true"/>
        Выбрать все фото: <input type="checkbox" name="selectedPhotos" value="dropAllPhotos"/>
        <!--            Удаляет картинки-->
        <?php
        dropImg();
        ?>
</form>
</label>
</div>

<script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
</body>
</html>