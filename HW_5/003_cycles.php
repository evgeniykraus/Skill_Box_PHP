<pre>
<?php
echo "1. Выведите числа от 0 до 9\n";
for ($i = 0; $i < 10; $i++) {
    echo "$i ";
}


echo "\n\n2. Выведите 10 случайных чисел от 1 до 10\n";
for ($i = 0; $i < 11; $i++) {
    echo rand(0, 10) . " ";
}

echo PHP_EOL, "\n" . '3. Создайте массив $items из 10 случайных целых значений от 0 до 9' . "\n";
$items = [];
for ($i = 0; $i < 10; $i++) {
    $items[] = rand(0, 9);
}

var_dump($items);


echo "\n4. Добавляйте случайные целые числа от 1 до 9 в массив до тех пор, пока сумма всех элементов этого массива меньше 100.
А затем выведите сколько чисел всего в массиве\n";
$numbers = [];
$sum = 0;

while ($sum < 100) {
    $temp = rand(0, 9);
    $numbers[] = $temp;
    $sum += $temp;
}
echo "Длинна массива numbers = " . count($numbers)."\n";


// 5. Переберите массив $numbers, созданный ранее, и посчитайте сумму всех четных чисел в нем
// Выведите следующие строки (как всегда вместо {} подставив нужные значения):

echo "5. Общая сумма массива numbers = $sum\n";


$evenNumbersSum = 0;
foreach ($numbers as $number){
    if ($number % 2 == 0) {
        $evenNumbersSum += $number;
    }
}
echo "6. Из нее часть, которая приходится на четные числа = $evenNumbersSum\n";

echo "7. И часть из нечетных чисел = " . ($sum - $evenNumbersSum);
?>
</pre>