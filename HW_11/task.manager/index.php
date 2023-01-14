<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/data/checkCredentials.php';
?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">

                <h1>Возможности проекта —</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое.
                    Делится списками с друзьями и просматривать списки друзей.</p>

            </td>
            <td class="right-collum-index">

                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="/index.php?login=yes">Авторизация</a></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="index-auth">
                    <form action="index.php?login=yes" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <?php
                                if (loginDetailsSet() && getSuccess($login, $password)) {
                                    include $_SERVER['DOCUMENT_ROOT'] . '/include/success_message.php';
                                } elseif (isset($_GET['login'])) {
                                    if ($_GET['login'] === 'yes') {
                                        include $_SERVER['DOCUMENT_ROOT'] . '/include/auth_form.php';
                                    }
                                    if (loginDetailsSet() && !getSuccess($login, $password)) {
                                        include $_SERVER['DOCUMENT_ROOT'] . '/include/error_message.php';
                                    }
                                }
                                ?>
                            </tr>
                        </table>
                    </form>
                </div>

            </td>
        </tr>
    </table>

<?php include
    $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>