<?php

require_once 'class_data_base.php';
/*
 * Задание 1. Выбор данных
 * Что нужно сделать
 * Напишите следующие SQL-запросы, выбирающие данные из таблиц, созданных в предыдущем модуле:
*/

$dataBase = new TestDataBase('localhost', 'test_user', 'test', 'test');

//Выбрать все данные из таблиц с животными.
var_dump($dataBase->getAllFromTable('animals'));

//Выбрать все данные из таблиц с городами.
var_dump($dataBase->getAllFromTable('cities'));

//Выбрать только названия всех стран.
var_dump($dataBase->query('SELECT NAME FROM COUNTRIES'));

//Выбрать уникальные значения кодов всех стран.
var_dump($dataBase->query('SELECT DISTINCT (CODE) FROM COUNTRIES'));

//Выбрать только название и значение признака (бывают ли среди них летающие) из таблицы с классами животных.
var_dump($dataBase->query('SELECT NAME, CAN_FLYING  FROM ANIMALS'));



/*
 * Задание 2. Добавление данных

 * Что нужно сделать
 * Напишите следующие SQL-запросы, выбирающие данные:
*/
//Запрос, добавляющий Уругвай в таблицу со странами.
$dataBase->addCountry('Уругвай', 1);

//Запрос, добавляющий класс животных «Насекомые».
$dataBase->addAnimalClass('Насекомые', 1);

//Запрос, добавляющий вымышленный класс животных «Несуществующие», среди них точно бывают летающие.
$dataBase->addAnimalClass('Несуществующие', 1);

//Запрос, добавляющий несуществующее летающее животное «Пернатый дракон-утконос».
$dataBase->addAnimal('Пернатый дракон-утконос', '1', 2, 'Несуществующие');

//Запрос, добавляющий город Лас-Вегас.
$dataBase->addCity('Лас-Вегас', '12.12.1900', 1);



/*
 * Задание 3. Обновление данных

 * Что нужно сделать
 * Напишите следующие SQL-запросы, обновляющие данные:
*/

//Запрос, который укажет, что животные в классе «Насекомые» могут летать.
$dataBase->updateTable('animal_classes', 'can_flying', '1', 'name', 'Насекомые');

//Запрос, который установит стране Уругвай код URY.
$dataBase->updateTable('countries', 'code', 'URY', 'name', 'Уругвай');

//Запрос, который переименует «Пернатого дракона-утконоса» в «Пернатого голубокрылого дракона-утконоса».
$dataBase->updateTable('animals',
    'name', 'Пернатый голубокрылый дракон-утконос',
    'name', 'Пернатый дракон-утконос');

//Запрос, который сделает «Пернатого голубокрылого дракона-утконоса» нелетающим.
$dataBase->updateTable('animals',
    'can_flying', '0',
    'name', 'Пернатый голубокрылый дракон-утконос');



/*
 * Задание 4. Удаление данных

 * Что нужно сделать
 * Напишите следующие SQL-запросы, удаляющие данные:

*/

//Запрос, который удалит «Пернатого голубокрылого дракона-утконоса».
$dataBase->deleteRow('animals', 'name', 'Пернатый голубокрылый дракон-утконос');

//Запрос, который удалит все города.
$dataBase->query("TRUNCATE TABLE CITIES");

//Запрос, который удалит страну с кодом URY.
$dataBase->deleteRow('countries', 'code', 'URY');


