<div class="clearfix">
    <ul class="main-menu bottom">
        <li><a href="/">Главная</a></li>
        <li><a href="/route/about">О нас</a></li>
        <li><a href="/route/contacts">Контакты</a></li>
        <li><a href="/route/news">Новости</a></li>
        <li><a href="/route/catalog">Каталог</a></li>
        <li>
            <?php if ($auth->isLoggedIn()) { ?>
                <a href="/?logout=true"> Выход </a>
            <?php } else { ?>
                <a href="/?login=true"> Войти </a>
            <?php } ?>
        </li>
    </ul>
</div>

<div class="footer">&copy;&nbsp;<nobr>2023</nobr>
    Project.
</div>

</body>

</html>

