<td class="iat">
    <label for="login_id">Ваш e-mail:</label>
    <input id="login_id" size="30" name="login"
           value="<?= htmlspecialchars($login ?? '') ?>">
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
