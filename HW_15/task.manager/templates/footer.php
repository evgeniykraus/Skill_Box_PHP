<div class="clearfix">
    <ul class="main-menu bottom">
        <li><a href="/">Главная</a></li>
        <li><a href="/route/about">О нас</a></li>
        <li><a href="/route/contacts">Контакты</a></li>
        <li><a href="/route/news">Новости</a></li>
        <li><a href="/route/catalog">Каталог</a></li>
        <?php if (isset($_SESSION["is_logged_in"])) {
            if ($_SESSION["is_logged_in"]) { ?>
                <li><a href="/?logout=true">Выйти</a></li>
            <?php } ?>
        <?php } else { ?>
            <li><a href="/?login=true">Войти</a></li>
        <?php } ?>
    </ul>
</div>

<div class="footer">&copy;&nbsp;<nobr>2023</nobr>
    Project.
</div>

</body>

</html>

