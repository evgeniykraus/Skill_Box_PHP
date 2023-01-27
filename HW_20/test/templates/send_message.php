<form class="message-form" action="/route/send-message" method="post">
    <label>
        <select name="recipient" class="message-form__select">
            <option value="0">Выберите получателя</option>
            <?php
            foreach ($users->usersList($_SESSION['id']) as $user) { ?>
                <option value="<?= $user['id'] ?>"> <?= $user['name'] . ' ' . $user['surname'] ?> </option>
                <?php
            }
            ?>
        </select>
    </label>
    <label>
        <textarea name="message" class="message-form__textarea" placeholder="Введите сообщение"></textarea>
    </label>
    <input type="submit" value="Отправить" class="message-form__submit">
</form>