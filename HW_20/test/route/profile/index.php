<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

if (!$isActive) {
    header("Location: http://test/route/auth");
}

?>

<main>
    <div class="container">
        <h1>Ну здарова, <?= $_SESSION['name'] ?>!</h1>
    </div>
</main>

<div class="user-card">
    <div class="user-card__header">
        <div class="user-card__photo">
            <!--            Лучше заменить путь!-->
            <img src="../../img/img.png" alt="User Photo">
            <input type="file" class="user-card__photo-input">
        </div>
        <div class="user-card__name">
            <h3><?= $_SESSION['name'] ?></h3>
        </div>
    </div>
    <div class="user-card__body">
        <div class="user-card__info">
            <p>Email: <b><?= $_SESSION['email'] ?></b></p>
            <p>Телефон: <b><?= $_SESSION['phone'] ?></b></p><br>
            <p>Группы:</p>
            <?php
            foreach ($users->getUserGroups($_SESSION['id']) as $group) { ?>
            <p><?= $group['name'] ?><p>
                <?php } ?>
        </div>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>
