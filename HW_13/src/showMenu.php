<?php
function showMenu(array $menu_array, int $sort = SORT_ASC, string $style = null)
{
    $url = $_SERVER["REQUEST_URI"]; //используется для присваивания класса active
    $menu_array = arraySort($menu_array, 'sort', $sort);

    //Выведет все пункты меню, активную ссылку подчеркнет
    foreach ($menu_array as $menu_item) { ?>
        <li <?php if ($url == $menu_item['path']) { ?> class="active" <?php } ?>>
            <a href="<?= $menu_item['path'] ?>"><?= cutString($menu_item['title'], 12) ?></a>
        </li>
    <?php } ?>
<?php }