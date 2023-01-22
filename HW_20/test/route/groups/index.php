<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

if (!$status) {
    header("Location: http://test/");
    exit();
}
?>


<div class="groups">
    <ul>
        <?php
        foreach ($users->getUserGroups($_SESSION['id']) as $group) { ?>
            <li><a href="/<?= $group['id'] ?>"><?= $group['name'] ?></a></li>
        <?php } ?>
    </ul>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>


