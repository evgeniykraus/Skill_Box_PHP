<pre>
<?php
$result2 = [
    'authors' => [
        [
            'name' => 'Михаил Булгаков',
            'email' => 'MiBu@mail.ru'
        ],
        [
            'name' => 'Федор Достаевский',
            'email' => 'FDost@mai.ru'
        ]
    ],
    'books' => [
        [
            'title' => 'Мертвые души',
            'author_email' => 'MiBu@mail.ru'
        ],
        [
            'title' => 'Преступление и наказание',
            'author_email' => 'FDost@mai.ru'
        ]
    ]
];

echo 'В нашей библиотеке точно есть две книги, которые вы ищете: "' . $result2['books'][0]['title'] . "\" и \"" . $result2['books'][1]['title'] . "\"\n";

echo 'Пожалуйста, перестаньте писать гневные письма на адрес нашего любимого автора ' . $result2['authors'][0]['name'] . " " . $result2['authors'][0]['email'] . ". " .
    'Пишите их лучше другому нашему автору — ' . $result2['authors'][1]['name'] . " " . $result2['authors'][1]['email'] . ', мы его любим поменьше.'
?>
</pre>>





