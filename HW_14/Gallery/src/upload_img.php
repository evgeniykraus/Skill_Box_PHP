<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple>
    <button type="submit">Загрузить</button>
</form>

</div>


<div>
    <form action="/" method="get">
        <input type="submit" value="В галерею"/>
    </form>
</div>

</body>
</html>

<?php
// File index.php

// Если в $_FILES существует "images" и она не NULL
if (isset($_FILES['images'])) {
    // Если количество загружаемых файлов превышает 5
    if (count($_FILES["images"]['tmp_name']) > 5) {
        die('Максимальное количество одновременно загружаемых файлов не должно превышать 5.');
    }
    // Изменим структуру $_FILES
    foreach ($_FILES['images'] as $key => $value) {
        foreach ($value as $k => $v) {
            $_FILES['images'][$k][$key] = $v;
        }
        // Удалим старые ключи
        unset($_FILES['images'][$key]);
    }
    // Загружаем все картинки по порядку
    foreach ($_FILES['images'] as $k => $v) {
        // Загружаем по одному файлу
        $fileName = $_FILES['images'][$k]['name'];
        $fileTmpName = $_FILES['images'][$k]['tmp_name'];
        $fileType = $_FILES['images'][$k]['type'];
        $fileSize = $_FILES['images'][$k]['size'];
        $errorCode = $_FILES['images'][$k]['error'];

        // Проверим на ошибки
        if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
            // Массив с названиями ошибок
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
                UPLOAD_ERR_FORM_SIZE => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
                UPLOAD_ERR_PARTIAL => 'Загружаемый файл был получен только частично.',
                UPLOAD_ERR_NO_FILE => 'Файл не был загружен.',
                UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
                UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
                UPLOAD_ERR_EXTENSION => 'PHP-расширение остановило загрузку файла.',
            ];
            // Зададим неизвестную ошибку
            $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
            // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
            $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
            // Выведем название ошибки
            die($outputMessage);
        } else {
            // Создадим ресурс FileInfo
            $fi = finfo_open(FILEINFO_MIME_TYPE);
            // Получим MIME-тип
            $mime = (string)finfo_file($fi, $fileTmpName);
            // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
            if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');
            // Результат функции запишем в переменную
            $image = getimagesize($fileTmpName);
            // Зададим ограничения для картинок
            $limitBytes = 5e+6;
            // Проверим нужные параметры
            if (filesize($fileTmpName) > $limitBytes) die('Размер изображения не должен превышать 5 Мбайт.');
            // Сгенерируем новое имя файла через функцию getRandomFileName()
            $name = getRandomFileName($fileTmpName);
            // Сгенерируем расширение файла на основе типа картинки
            $extension = image_type_to_extension($image[2]);
            // Сократим .jpeg до .jpg
            $format = str_replace('jpeg', 'jpg', $extension);
            // Переместим картинку с новым именем и расширением в папку /img/upload/originals
            if (!move_uploaded_file($fileTmpName, $_SERVER['DOCUMENT_ROOT'] . '/img/upload/originals/' . $name . $format)) {
                die('При записи изображения на диск произошла ошибка.');
            }
            // Библиотека thumbs-master позволит обрезать картинку для файла превью.
                $image = new Thumbs($_SERVER['DOCUMENT_ROOT'] . '/img/upload/originals/' . $name . $format);
            $image->cut(300, 300);
            // Сохраним превью картинки с новым именем и расширением в папку /img/upload/preview
            $image->saveJpg($_SERVER['DOCUMENT_ROOT'] . '/img/upload/preview/' . $name . $format, 100);
        }
    };
    echo 'Файлы успешно загружены!';
};


// File functions.php
function getRandomFileName($path)
{
    $path = $path ? $path . '/' : '';

    do {
        $name = md5(microtime() . rand(0, 9999));
        $file = $path . $name;
    } while (file_exists($file));

    return $name;
}