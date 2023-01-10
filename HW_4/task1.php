<?php
$number1 = rand(0, 10);
$number2 = rand(1, 10); // Исключил деление на ноль

var_dump("Первое число $number1");
var_dump("Второе число $number2");

var_dump('Сумма ' . ($number1 + $number2));
var_dump('Разность ' . ($number1 - $number2));
var_dump('Произведение ' . ($number1 * $number2));
var_dump('Частное ' . ($number1 / $number2));
var_dump('Инкремента $number1 ' . $number1++);
var_dump('Прекремент $number2 ' . ++$number2);

var_dump($number1 > $number2);
var_dump($number1 < $number2);
var_dump($number1 === $number2);