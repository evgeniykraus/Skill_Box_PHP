<?php
function outputImg()
{

    $dir = $_SERVER['DOCUMENT_ROOT'] . '/img/upload'; // Папка с изображениями

    $images = scandir($dir . '/preview'); // Берём всё содержимое директории

    $count = 1;
    foreach ($images as $image) {
        $urlPreviewImg = 'img/upload/preview/' . $image;
        $urlOriginalImg = 'img/upload/originals/' . preg_replace('/-min\.jpg$/', '.jpg', $image);


        if (!is_dir($image)) {
            ?>
            <figure class="photo">
                <figcaption>Фото №<?= $count ?></figcaption>
                <a href="<?= $urlOriginalImg ?>" data-lightbox="roadtrip" data-title="img_<?= $count ?>">
                    <img src="<?= $urlPreviewImg ?>" alt="img_<?= $count ?>"/>
                </a>

                <label for="photo"> Выбрать:
                    <input type="checkbox" name="selectedPhotos[]" value="<?= $image ?>"/>
                </label>
            </figure>

            <?php
            $count++;
        }
    } ?>
    <?php
}


