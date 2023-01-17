<?php
//if (isset($_COOKIE[session_name()])) session_start();


$session_lifetime = session_get_cookie_params()['lifetime'];
$session_lifetime += (60 * 15);
session_set_cookie_params($session_lifetime);


$cookie_lifetime = ini_get('session.cookie_lifetime');
$cookie_lifetime += (60 * 15);
ini_set('session.cookie_lifetime', $cookie_lifetime);

if (isset($_COOKIE[session_name()])) {
    session_start();
}

require $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
?>

<!DOCTYPE html>
<html>
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
        <?php if (isset($_SESSION["is_logged_in"])) {
            if ($_SESSION["is_logged_in"]) { ?>
                <li><a href="/?logout=true">Выйти</a></li>
                <?php
            } ?>
        <?php } else { ?>
            <li><a href="/?login=true">Войти</a></li>
        <?php } ?>
    </ul>
</div>