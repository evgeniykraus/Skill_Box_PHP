<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
if (!$status) {
    header("Location: http://test/");
}


?>
<div class="user-card">
    <div>
        <p>Список непрочитанных сообщений</p>
        <ul>
            <?php
            foreach ($messages->getAllUserMessages($_SESSION['id'], 0) as $message) { ?>
                <li><a href="/route/post/detail.php?id=<?= $message['id'] ?>">
                        <?= "{$message['title']} ({$message['category_title']})" ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <div>
        <p>Список прочитанных сообщений</p>
        <ul>
            <?php
            foreach ($messages->getAllUserMessages($_SESSION['id'], 1) as $message) { ?>
                <li><a href="/route/post/detail.php?id=<?= "{$message['id']}" ?>">
                        <?= "{$message['title']} ({$message['category_title']})" ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <div>
        <a href="/route/post/add">Написать</a>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>


