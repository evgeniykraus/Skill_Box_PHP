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


    $userIndex = array_search($login, $users);
    return ($userIndex !== false && $passwords[$userIndex] === $password);
}