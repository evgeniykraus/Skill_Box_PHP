<?php
function dropImg()
{
    $dirPreview = $_SERVER['DOCUMENT_ROOT'] . '/img/upload/preview/';
    $dirOriginals = $_SERVER['DOCUMENT_ROOT'] . '/img/upload/originals/';
    if (isset($_POST["selectedPhotos"]) && $_POST["drop"] === "true") {
        if ($_POST["selectedPhotos"] === "dropAllPhotos") {
            $images = scandir($dirPreview);
            dropFile($images, $dirPreview);
            dropFile($images, $dirOriginals);
        } else {
            dropFile($_POST["selectedPhotos"], $dirPreview);
            dropFile($_POST["selectedPhotos"], $dirOriginals);
        }
    }
}

function dropFile(array $array, $dir)
{

    foreach ($array as $file) {
        $fileDir = $dir . $file;
        if (file_exists($fileDir) && !is_dir($fileDir)) {
            unlink($fileDir);
        }
    }
    echo "<meta http-equiv='refresh' content='0'>";
}