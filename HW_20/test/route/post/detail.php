<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

if (!$status) {
    header("Location: http://test/");
}

$message = $messages->getMessageById($_GET['id'], $_SESSION['id']);

?>

<div class="user-card">

    <div class="user-card__body">
        <div class="user-card__info">
            <p>Заголовок: <b><?= $message['title'] ?></b></p>
            <p>Дата: <b><?= $message['created_at'] ?></b></p><br>
            <p>Текст: <b></b>
            <p><b><?= $message['text'] ?></b></p><br>
            <p>Отправитель: <b><?= "{$message['sender']} ({$message['email']})"?></b>
        </div>
    </div>
    <div>
        <a href="/route/post">Вернуться к списку сообщений</a>
    </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>

