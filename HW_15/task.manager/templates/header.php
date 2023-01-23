<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';

$auth = new AuthClass();

session_start();
$auth->setAuthCookie(COOKIES_LIFETIME);

if (!$auth->isLoggedIn()) {
    if ($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] !== 'task.manager/?login=true') {
        header('Location: http://task.manager/?login=true');
    }
}


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/css/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
</head>

<body>

<div class="header">
    <div class="logo"><img src="/img/logo.png" alt="Project"></div>
    <div class="author">Автор: <span class="author__name">Евгений Краус</span></div>
</div>

<div class="clear">
    <ul class="main-menu">
        <li><a href="/">Главная</a></li>
        <li><a href="/route/about">О нас</a></li>
        <li><a href="/route/contacts">Контакты</a></li>
        <li><a href="/route/news">Новости</a></li>
        <li><a href="/route/catalog">Каталог</a></li>
        <li>
            <?php if ($auth->isLoggedIn()) { ?>
                <a href="/?logout=true"> Выход </a>
            <?php } else { ?>
                <a href="/?login=true"> Войти </a>
            <?php } ?>
        </li>
    </ul>
</div>