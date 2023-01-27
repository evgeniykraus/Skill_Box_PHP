<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

if ($isActive) {
    header("Location: http://test/route/profile");
}

?>

    <main class="auth">
        <div class="login-form">
            <form method="post" action="">
                <label>
                    <input type="text" placeholder="Email" name="email" value="<?= ($_POST['email']) ?? '' ?>">
                    <input type="password" placeholder="Пароль" name="password">
                    <input type="submit" value="Войти">
                </label>
            </form>
            <?php
            if (isset($_POST['email'], $_POST['password'])) {
                if ($users->authorize($_POST['email'], $_POST['password'])) {
                    header("Location: http://test/route/profile");
                } else { ?>
                    <p>Не верный логин или пароль</p>
                <?php }
            } ?>

        </div>
    </main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>