<?php
$daysBeforeExam = rand(0, 9);
$daysToPrepareForExam = rand(0, 9);
echo "Количество дней до экзамена: $daysBeforeExam. ";

echo $daysBeforeExam < $daysToPrepareForExam ? "Мне крышка. " : "Главное — не расслабляться. ";

echo $daysBeforeExam > $daysToPrepareForExam ? "Ууу, ещё успею в дотку поиграть. " : "Успею или не успею. ";

echo $daysBeforeExam == $daysToPrepareForExam ? "Впритирочку. " : "Либо все плохо, либо очень плохо. ";






