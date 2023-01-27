<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
if (!isset($_SESSION['can_write']) || !$isActive) {
    header("Location: http://test/route/auth");
    exit();
}

?>
<div class="user-card">
    <?php if ($_SESSION['can_write']) { ?>
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
        </div> <?php } else {
        header($_SERVER['SERVER_PROTOCOL'] . " 403 Forbidden");
        include $_SERVER['DOCUMENT_ROOT'] . '/templates/status_code_403.php';
    } ?>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>


