<?php

$library = [
    'authors' => [
        'john_makkormik@example.com' => [
            'name' => 'Джон Маккормик',
            'email' => 'john_makkormik@example.com',
            'birthYear' => 1972,
        ],
        'martin_robert@example.com' => [
            'name' => 'Мартин Роберт',
            'email' => 'martin_robert@example.com',
            'birthYear' => 1952,
        ],
        'martin_fauler@example.com' => [
            'name' => 'Мартин Фаулер',
            'email' => 'martin_fauler@example.com',
            'birthYear' => 1963,
        ],
    ],
    'books' => [
        [
            'title' => 'Чистый код: создание, анализ и рефакторинг',
            'author' => 'martin_robert@example.com',
            'year' => 2013,
        ],
        [
            'title' => 'Девять алгоритмов, которые изменили будущее',
            'author' => 'john_makkormik@example.com',
            'year' => 2011,
        ],
        [
            'title' => 'Идеальный программист',
            'author' => 'martin_robert@example.com',
            'year' => 2011,
        ],
        [
            'title' => 'Шаблоны корпоративных приложений',
            'author' => 'martin_fauler@example.com',
            'year' => 2002,
        ],
    ],
];

$title = 'Библиотека программиста';
$red = (bool)rand(0, 1);


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php if ($red): ?>
        <link rel="stylesheet" type="text/css" href="alternativeStyle.css">
    <?php endif; ?>
</head>
<body>

<h1><?= $title ?></h1>
<div>Авторов на портале <?= count($library['authors']) ?></div>
<!-- Выведите все книги -->
<?php
$stringNumber = 1;
$temp = '';
foreach ($library['books'] as $book) {
    if ($stringNumber % 2 != 0) {
        $temp = 'grayBackground';
    } else {
        $temp = '';
    }
    $bookTitle = $book['title'];
    $authorName = $library['authors'][$book['author']]['name'];
    $authorBirthYear = $library['authors'][$book['author']]['birthYear'];
    $authorEmail = $book['author'];
    $stringNumber++;

    print "<p class='bottom_indent $temp'>Книга <span class= 'books'> $bookTitle</span>, её написал $authorName <a href='mailto:'>$authorEmail</a>.</p>";
}
?>

</body>
</html>
