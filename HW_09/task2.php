<?php
/*
Задание 2

Что нужно сделать
Реализуйте алгоритм поиска минимального элемента в массиве.

Создайте массив $values, содержащий десять случайных чисел от 0 до 100.
Найдите в этом массиве минимальное значение.
Выведите сам массив, минимальное значение и его позицию в массиве. Если таких значений несколько, то выведите первое из них.
*/

$values = [];
$minValue = +INF;
for ($i = 0; $i < 10; $i++) {
    $values[$i] = rand(0, 100);
    $minValue = ($values[$i] < $minValue) ? $values[$i] : $minValue;
}


var_dump($values);

var_dump('Минимальное число '. $minValue);
var_dump('Позиция '. array_search($minValue, $values));