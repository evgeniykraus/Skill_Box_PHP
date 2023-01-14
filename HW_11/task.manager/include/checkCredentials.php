<?php
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
function checkData($login, $password)
{
    include $_SERVER['DOCUMENT_ROOT'] . '/data/users.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/data/passwords.php';

    if (array_search($login, $users) !== false) {
        if ($passwords[array_search($login, $users)] === $password) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function loginDetailsSet()
{
    return isset($_POST['login']) && isset($_POST['password']);
}