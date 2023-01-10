<?php
$result1 = [
    'author' => [
        'name' => 'Михаил Булгаков',
        'email' => 'MiBu@mail.ru'
    ],
    'book' => [
        'title' => 'Мертвые души',
        'author_email' => 'MiBu@mail.ru'
    ]
];

echo "{$result1['author']['name']} написал книгу, которая называется {$result1['book']['title']}" . PHP_EOL;
echo "{$result1['author']['name']} ждёт ваших отзывов, напишите ему на электронную почту {$result1['author']['email']}" . PHP_EOL;






