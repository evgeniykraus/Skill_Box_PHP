<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

if (!$status) {
    header("Location: http://test/");
    exit();
}
?>

<main>
    <div class="container">
        <h1>Тут будут сообщения</h1>
    </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>


