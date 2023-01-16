<?php
function dropImg()
{
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/img/upload/preview/';
    if (isset($_POST["selectedPhotos"]) && $_POST["drop"] === "true") {
        if ($_POST["selectedPhotos"] === "dropAllPhotos") {
            $images = scandir($dir);
            dropFile($images, $dir);
        } else {
            dropFile($_POST["selectedPhotos"], $dir);
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