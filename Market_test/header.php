<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include $_SERVER['DOCUMENT_ROOT'] . '/products.php';
include $_SERVER['DOCUMENT_ROOT'] . '/order.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Магазин</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="menu">
    <div class="container">
        <ul>
            <li><a href="/index.php">Главная</a></li>
            <li><a href="/contacts">Контакты</a></li>
            <li><a href="/about/">О нас</a></li>
        </ul>
    </div>
</div>
<div class="container">
