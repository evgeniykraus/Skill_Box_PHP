<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
session_start();

$connect = new ConnectDB();
$db = $connect->getConnection();
$users = new Users($db);

if (isset($_GET['logout']) && $_GET['logout']) {
    $users->out();
}

if (isset($_POST['email'], $_POST['password'])) {
    $users->authorize($_POST['email'], $_POST['password']);
}

$status = (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) ?? false;
echo ($status) ? 'Авторизован' : 'Не авторизован';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Мой сайт</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>

<header>
    <nav>
        <ul>
            <li><a href="/route/home">Главная</a></li>
            <li><a href="/route/news">Новости</a></li>
            <li><a href="/route/about">О нас</a></li>
            <li><a href="/route/contacts">Контакты</a></li>
        </ul>
    </nav>
    <div class="right-corner">
        <?php if ($status) { ?>
            <a href="/route/auth/?logout=true">Выход</a>
        <?php } else { ?>
            <a href="#">Регистрация</a>
            <a href="/route/auth">Войти</a>
        <?php } ?>
    </div>
</header>

<?php if ($status) {
    require_once 'sidebar.php';
} ?>
