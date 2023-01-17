<?php
require $_SERVER['DOCUMENT_ROOT'] . '/src/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/src/check_credentials.php';
?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">

                <h1>Возможности проекта —</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое.
                    Делится списками с друзьями и просматривать списки друзей.</p>
            </td>

            <?php
            if (filter_var($_GET['login'] ?? false, FILTER_VALIDATE_BOOLEAN) && $_GET['login'] === 'yes') {
                include $_SERVER['DOCUMENT_ROOT'] . '/src/auth_form.php';
            }
            ?>

        </tr>
    </table>

<?php include
    $_SERVER['DOCUMENT_ROOT'] . '/src/footer.php';
?>