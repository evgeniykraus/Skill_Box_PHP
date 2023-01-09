<pre>
<?php
$daysBeforeExam = rand(0, 9);
$daysToPrepareForExam = rand(0, 9);
echo "Количество дней до экзамена: $daysBeforeExam\n";

echo "Количество дней для подготовки к экзамену: $daysToPrepareForExam\n";

echo $daysBeforeExam < $daysToPrepareForExam ? "Мне крышка\n" : "Главное — не расслабляться\n";

echo $daysBeforeExam > $daysToPrepareForExam ? "Ууу, ещё успею в дотку поиграть\n" : "Успею или не успею\n";

echo $daysBeforeExam == $daysToPrepareForExam ? "Впритирочку" : "Либо все плохо, либо очень плохо";
?>
</pre>>





