<?php
/*
Задание 1

Что нужно сделать
Реализуйте подсчёт различных букв в слове. Создайте переменную $line, поместите в неё любой текст.
Напишите алгоритм, который подсчитает, сколько в этой переменной содержится различных символов (большие и маленькие буквы считайте за разные символы).

Например, для строки "Student, hello!"
Должен быть сформирован такой результат:

S - 1
t - 2
u - 1
d - 1
e - 2
n - 1
, - 1
- 1
h - 1
l - 2
o - 1
! - 1
*/

$line = 'Student, hello!';
$result = [];


foreach (array_unique(str_split($line)) as $uniqueSymbol) {
    $result[$uniqueSymbol] = 0;
    foreach (str_split($line) as $symbol) {
        if ($symbol === $uniqueSymbol) {
            $result[$uniqueSymbol] += 1;
        }
    }
}

var_dump($result);

