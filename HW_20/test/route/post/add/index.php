<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

if (!$isActive) {
    header("Location: http://test/");
}

$messageIsSend = false;
if (isset($_POST['text'], $_POST['title'], $_POST['recipient_user_id'], $_POST['category_id'])) {
    if ($messageIsSend = $messages->sendMessage($_POST['text'], $_POST['title'], $_SESSION['id'], $_POST['recipient_user_id'], $_POST['category_id'])) {
        $_POST = array();
    }
}

?>


<link rel="stylesheet" type="text/css" href="/css/post.css">
<main>
    <form method="post">
        <label>
            <input type="text" name="title" placeholder="Заголовок" value="<?= ($_POST['title']) ?? '' ?>">
        </label>
        <label>
            <input type="text" name="text" placeholder="Текст сообщения" value="<?= ($_POST['text']) ?? '' ?>">
        </label>
        <label>
            <select name="recipient_user_id">
                <option value="" disabled selected>Получатель</option>
                <?php foreach ($users->usersList($_SESSION['id']) as $user) { ?>
                    <option value="<?= $user['id'] ?>"><?= "{$user['name']}  {$user['surname']}" ?></option>
                <?php } ?>
            </select>
        </label>
        <label>
            <select name="category_id">
                <option value="" disabled selected>Категории</option>
                <?php foreach ($messages->getAllCategories() as $category) { ?>
                    <option value=" <?= $category['id'] ?>"><?= $category['title'] ?> </option>
                <?php } ?>
            </select>
        </label>
        <input type="submit" value="Отправить">
        <div>
            <a href="/route/post">Вернуться к списку сообщений</a>
        </div>
        <div>
            <?php if ($messageIsSend ) { ?>
                <p><b>Отправлено!</b></p>
            <?php } elseif (!empty($_POST)){ ?>
                <p><b>Ошибка отправки:</b></p>
                <p>Все поля должны быть заполнены!</p>
            <?php } ?>
        </div>
    </form>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>


