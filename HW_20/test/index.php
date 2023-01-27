<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

?>

<main>
    <div class="container">
        <h1>Добро пожаловать на мой сайт</h1>
        <p>Здесь вы найдете всю интересующую вас информацию</p>
        <?php if (!$isActive) { ?>
            <p>Но сначала авторизуйтесь!</p><?php } ?>
    </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>
