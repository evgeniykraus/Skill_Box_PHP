<?php
include $_SERVER['DOCUMENT_ROOT'] . '/data/checkData.php';

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
?>

<div class="index-auth">
    <form action="index.php?login=yes" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <?php if (isset($_GET['login'])) {
                if ($_GET['login'] === 'yes') { ?>
                    <tr>
                        <td class="iat">
                            <label for="login_id">Ваш e-mail:</label>
                            <input id="login_id" size="30" name="login"
                                   value="<?= htmlspecialchars($login) ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="iat">
                            <label for="password_id">Ваш пароль:</label>
                            <input id="password_id" size="30" name="password" type="password"
                                   value="<?= htmlspecialchars($password) ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Войти"></td>
                    </tr>
                <?php }
            } ?>

        </table>
    </form>
</div>

<!--<div class="index-auth">-->
<!--    --><?php //if (isset($_GET['login'])) {
//        if ($_GET['login'] === 'yes') {
//            include $_SERVER['DOCUMENT_ROOT'] . '/auth_form.php';
//            if (checkData($login, $password)) {
//                include $_SERVER['DOCUMENT_ROOT'] . '/include/success_message.php';
//            }
//        }
//    } else {
//        include $_SERVER['DOCUMENT_ROOT'] . '/include/success_message.php';
//    } ?>
<!--</div>-->