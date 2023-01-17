<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">

                <h1>Возможности проекта —</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое.
                    Делится списками с друзьями и просматривать списки друзей.</p>
            </td>

            <?php

            if (filter_var($_GET['login'] ?? false, FILTER_VALIDATE_BOOLEAN)) {
                if ($_GET['login']) {
                    include $_SERVER['DOCUMENT_ROOT'] . '/templates/auth_form.php';
                }
            }

            if (filter_var($_GET['logout'] ?? false, FILTER_VALIDATE_BOOLEAN)) {
                if ($_GET['logout'] && isset($_SESSION['is_logged_in'])) {
                    if (ini_get("session.use_cookies")) {
                        $params = session_get_cookie_params();
                        setcookie(session_name(), '', time() - 42000,
                            $params["path"], $params["domain"],
                            $params["secure"], $params["httponly"]);
                    }
                    session_destroy();
                    include $_SERVER['DOCUMENT_ROOT'] . '/templates/auth_form.php';
                }
            }
            ?>

        </tr>
    </table>

<?php include
    $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>