<?php

function getTitleH1($menu_array)
{
    $path = $_SERVER["REQUEST_URI"];
    $result = '';

    foreach ($menu_array as $menu_item) {
        if ($menu_item['path'] == $path) {
            $result = $menu_item['title'];
            break;
        }
    }

    return $result;
}
