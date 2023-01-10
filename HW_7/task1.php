<?php
require_once __DIR__ . '/app/core.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="tailwind.min.css" rel="stylesheet">
    <title>Модуль 07 - Задание 1</title>
</head>
<body class="bg-gray-400 font-sans leading-normal tracking-normal">

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/HW_7/templates/navigation.php';
?>

<div class="container shadow-lg mx-auto bg-white mt-24 md:mt-14 h-screen p-10">

    <?php
    // Разместите здесь решение задачи
    include_once __DIR__ . '/templates/task_1_content.php';
    ?>

</div>
</body>
</html>