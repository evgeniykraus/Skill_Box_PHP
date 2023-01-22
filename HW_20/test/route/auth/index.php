<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

if ($status) {
    header("Location: http://test/route/profile");
    exit();
}


?>

    <main class="auth">
        <div class="login-form">
            <form action="" method="post">
                <label>
                    <input type="text" placeholder="Email" name="email">
                    <input type="password" placeholder="Пароль" name="password">
                    <input type="submit" value="Войти">
                </label>
            </form>
        </div>
    </main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>