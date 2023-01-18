<?php
/*
Что нужно сделать:
Доработаем массив библиотеки с авторами и книгами из предыдущих домашних заданий. Возьмите массив $library, созданный в приложенном файле 005_authors_and_books.php.
Сейчас ключами к каждому автору в этом массиве являются числовые индексы. Давайте заменим их, сделав ключом для каждого из авторов его email.
Теперь, зная email автора, мы сможем без перебора массива с авторами получить нужного автора книги, последовательно указав несколько индексов.

Добавьте каждому автору новое поле — «Год рождения».
Добавьте каждой книге новое поле — «Дата публикации».
Добавьте ещё одного автора в массив авторов и ещё одну книгу, которую написал этот автор, в массив книг.
Выведите информацию по всем книгам в формате: Книга <Название книги>, её написал <ФИО автора> <Год рождения автора> (<email автора>).
 */
$library = [
    'authors' => [
        [
            'name' => 'Джон Маккормик',
            'email' => 'john_makkormik@example.com',
        ],
        [
            'name' => 'Мартин Роберт',
            'email' => 'martin_robert@example.com',
        ],
    ],
    'books' => [
        [
            'title' => 'Чистый код: создание, анализ и рефакторинг',
            'author' => 'martin_robert@example.com',
        ],
        [
            'title' => 'Девять алгоритмов, которые изменили будущее',
            'author' => 'john_makkormik@example.com',
        ],
        [
            'title' => 'Идеальный программист',
            'author' => 'martin_robert@example.com',
        ],
    ],
];

$library = [
    'authors' => [
        'john_makkormik@example.com' => [
            'name' => 'Джон Маккормик',
            'email' => 'john_makkormik@example.com',
            'bDay' => '12.12.1963'
        ],
        'martin_robert@example.com' => [
            'name' => 'Мартин Роберт',
            'email' => 'martin_robert@example.com',
            'bDay' => '01.02.1970'
        ],
        'den_rich@example.com' => [
            'name' => 'Ден Ричардс',
            'email' => 'den_rich@example.com',
            'bDay' => '01.02.1970'
        ]
    ],
    'books' => [
        [
            'title' => 'Чистый код: создание, анализ и рефакторинг',
            'author' => 'martin_robert@example.com',
            'publication_date' => '2013'
        ],
        [
            'title' => 'Девять алгоритмов, которые изменили будущее',
            'author' => 'john_makkormik@example.com',
            'publication_date' => '2000'
        ],
        [
            'title' => 'Идеальный программист',
            'author' => 'martin_robert@example.com',
            'publication_date' => '2010'
        ],
        [
            'title' => 'Тестовая книга',
            'author' => 'den_rich@example.com',
            'publication_date' => '2023'
        ]
    ]
];
foreach ($library['books'] as $book) {
    echo "Книга  {$book['title']}, её написал {$library['authors'][$book['author']]['name']} {$library['authors'][$book['author']]['bDay']} {$book['author']}".PHP_EOL;
}
