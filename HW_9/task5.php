<?php
/*
Задание 5

Что нужно сделать
Классическое задание на склонение окончания слова в зависимости от числа.

Создайте переменную $studentsCount и присвойте ей случайное значение от 1 до 1000000.
Создайте программу, которая выведет в нужной форме текстовое сообщение. Например: "На учёбе 100 студентов", "На учебе 2 студента" и т. д.
*/
function pluralCategory($count)
{
    $mod10 = $count % 10;
    $mod100 = $count % 100;

    if (is_int($count) && $mod10 == 1 && $mod100 != 11) {
        return 0;
    } elseif (($mod10 > 1 && $mod10 < 5) && ($mod100 < 12 || $mod100 > 14)) {
        return 1;
    } elseif ($mod10 == 0 || ($mod10 > 4) || ($mod100 > 10 && $mod100 < 15)) {
        return 2;
    } else {
        return 0;
    }
}

$studentsCount = rand(1, 1000000);
$wordVariants = ['студент', 'студента', 'студентов',];
$tmp = pluralCategory($studentsCount);

echo "На учёбе $studentsCount $wordVariants[$tmp]";