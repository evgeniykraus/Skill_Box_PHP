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
        if (getSuccess(trim($login), $password)) {
            session_start();
            setcookie('is_logged_in', true, time() + (60 * 15), "/");
            $_SESSION["is_logged_in"] = true;
            include 'success_message.php';
        } else { ?>
            <form action="index.php?login=yes" method="post">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="iat">
                            <label for="login_id">Ваш e-mail:</label>
                            <input id="login_id" size="30" name="login"
                                   value="<?= htmlspecialchars($login) ?? '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="iat">
                            <label for="password_id">Ваш пароль:</label>
                            <input id="password_id" size="30" name="password" type="password"
                                   value="<?= htmlspecialchars($password) ?? '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Войти"></td>
                    </tr>


                </table>
                <?php
                if (loginDetailsSet() && !getSuccess($login, $password)) {
                    include 'error_message.php';
                }
                ?>
            </form>
        <?php }
        ?>
    </div>
</td>