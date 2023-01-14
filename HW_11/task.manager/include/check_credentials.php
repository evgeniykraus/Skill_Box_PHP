<?php
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

function loginDetailsSet()
{
    return isset($_POST['login']) && isset($_POST['password']);
}

function getSuccess(string $login, string $password): bool
{
    include $_SERVER['DOCUMENT_ROOT'] . '/data/users.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/data/passwords.php';

    if (array_search($login, $users) !== false) {
        return ($passwords[array_search($login, $users)] === $password);
    } else {
        return false;
    }
}