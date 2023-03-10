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
            $isAuth = filter_var($_GET['login'] ?? false, FILTER_VALIDATE_BOOLEAN);
            $isLogout = filter_var($_GET['logout'] ?? false, FILTER_VALIDATE_BOOLEAN);

            if ($isAuth) {
                include $_SERVER['DOCUMENT_ROOT'] . '/templates/auth_form.php';
            }

            if ($isLogout) {
                $auth->out();
                include $_SERVER['DOCUMENT_ROOT'] . '/templates/auth_form.php';
            }
            ?>
        </tr>
    </table>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>