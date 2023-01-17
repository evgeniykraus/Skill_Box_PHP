<td class="right-collum-index">

    <div class="project-folders-menu">
        <ul class="project-folders-v">
            <li class="project-folders-v-active"><a href="#">Авторизация</a></li>
            <li><a href="#">Регистрация</a></li>
            <li><a href="#">Забыли пароль?</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="index-auth">
        <?php
        if ($auth->auth(trim(LOGIN), PASSWORD)) {
            include 'success_message.php';
        } else { ?>
            <form action="/?login=true" method="post">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="iat">
                            <label for="login_id">Ваш e-mail:</label>
                            <input id="login_id" size="30" name="login"
                                   value="<?= (isset($_POST['login'])) ? $_POST['login'] : $auth->getLogin() ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="iat">
                            <label for="password_id">Ваш пароль:</label>
                            <input id="password_id" size="30" name="password" type="password">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Войти"></td>
                    </tr>

                </table>

                <?php
                if ($auth->loginDetailsSet() && !$auth->auth(trim(LOGIN), PASSWORD)) {
                    include 'error_message.php';
                }
                ?>
            </form>
        <?php }
        ?>
    </div>
</td>