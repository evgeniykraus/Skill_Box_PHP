<?php
session_start();

class AuthClass
{
    private array $users;
    private array $passwords;

    public function __construct()
    {
        $this->users = ['admin', 'manager'];
        $this->passwords = ['123', '321'];
    }

    public function isLoggedIn(): bool
    {
        return $_SESSION['is_logged_in'] ?? false;
    }

    public function auth(string $login, string $password): bool
    {
        if (isset($_POST['login'])) {
            setcookie('login', $_POST['login'], time() + 2.628e+6, '/');
        }

        $userKey = array_search($login, $this->users);

        if ($userKey !== false && $this->passwords[$userKey] === $password) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['login'] = $login;
            return true;
        } else {
            $_SESSION['is_logged_in'] = false;
            return false;
        }
    }

    public function setAuthCookie(int $time): void
    {
        setcookie('login', $this->getLogin(), time() + $time, '/');
    }

    public function loginDetailsSet(): bool
    {
        return isset($_POST['login']) && isset($_POST['password']);
    }

    public function getLogin(): string
    {
        return $_COOKIE['login'] ?? '';
    }

    public function out(): void
    {
        session_unset();
        session_destroy();
    }
}