<?php
function outputImg()
{

    $dir = 'img/preview/'; // Папка с изображениями
    $images = scandir($dir); // Берём всё содержимое директории
    $count = 1;
    foreach ($images as $image) {
        $urlOriginalImg = 'img/originals/' . preg_replace('/-min\.jpg$/', '.jpg', $image);
        $urlPreviewImg = 'img/preview/' . $image;
        if (!is_dir($image)) {
            ?>
            <figure class="photo">
                <figcaption>Фото №<?= $count ?></figcaption>
                <a href="<?= $urlOriginalImg ?>" data-lightbox="roadtrip"
                   data-title="img_<?= $count ?>">

                    <img src="<?= $urlPreviewImg ?>" alt="img_<?= $count ?>"/>
                </a>

                <form method="post">
                    <input type="hidden" name="deleted" value="<?= $urlPreviewImg ?>"/>
                    <label for="photo">
                        <input type="submit" value="Удалить"/>
                        Выбрать:
                        <input type="checkbox" />
                    </label>
                </form>

            </figure> <?php
            $count++;
        }
    }
}

