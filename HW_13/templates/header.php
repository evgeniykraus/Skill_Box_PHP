<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
include $_SERVER['DOCUMENT_ROOT'] . '/products.php';
include $_SERVER['DOCUMENT_ROOT'] . '/order.php';
include $_SERVER['DOCUMENT_ROOT'] . '/main_menu.php';
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
            <?= showMenu($main_menu, SORT_ASC) ?>
        </ul>
    </div>
</div>

<div class="container">
