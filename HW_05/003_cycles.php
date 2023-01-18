<?php
// 1. Выведите числа от 0 до 9
for ($i = 0; $i < 10; $i++) {
    echo "$i ";
}


// 2. Выведите 10 случайных чисел от 1 до 10
for ($i = 0; $i < 11; $i++) {
    echo rand(0, 10) . " ";
}

// 3. Создайте массив $items из 10 случайных целых значений от 0 до 9
$items = [];
for ($i = 0; $i < 10; $i++) {
    $items[] = rand(0, 9);
}

var_dump($items);


// 4. Добавляйте случайные целые числа от 1 до 9 в массив до тех пор, пока сумма всех элементов этого массива меньше 100.
// А затем выведите сколько чисел всего в массиве
$numbers = [];
$sum = 0;

while ($sum < 100) {
    $temp = rand(0, 9);
    $numbers[] = $temp;
    $sum += $temp;
}
echo "Длинна массива numbers = " . count($numbers);


// 5. Переберите массив $numbers, созданный ранее, и посчитайте сумму всех четных чисел в нем
// Выведите следующие строки (как всегда вместо {} подставив нужные значения):

echo "Общая сумма массива numbers = $sum";


$evenNumbersSum = 0;
foreach ($numbers as $number){
    if ($number % 2 == 0) {
        $evenNumbersSum += $number;
    }
}
echo "Из нее часть, которая приходится на четные числа = $evenNumbersSum";

echo "И часть из нечетных чисел = " . ($sum - $evenNumbersSum);