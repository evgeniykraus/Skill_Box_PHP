<?php
require('functions.php');

// require __DIR__ . '/cut_string.php';
$data = [
    'short line',
    'what the fox say?',
    'very very very long line',
    'i dont know what to write here)',
    'QSOFT is great',
    'teacher is crazy',
    'qwertyqwertyqwertyqwerty',
];

$result = [];

foreach ($data as $longString) {
    $result[] = cutString($longString, 14);
}

var_dump($result);
