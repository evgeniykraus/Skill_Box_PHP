<?php

require_once 'classes/ConnectDB.php';
require_once 'classes/countries.php';
require_once 'classes/cities.php';
require_once 'classes/animal_classes.php';
require_once 'classes/animals.php';


$connection = new ConnectDB;
$db = $connection->getConnection();

$countries = new Countries($db);
$cities = new Cities($db);
$animal_classes = new Animal_classes($db);
$animals = new Animals($db);

//Заполняет все 4 таблицы данными из массивов 'data.php'
function seedAllTables($countries, $cities, $animal_classes, $animals): void
{
    require_once 'data/data.php';

    foreach ($data as $item) {
        $countries->addCountry($item['country'][0], $item['country'][1]);
        $cities->addCity($item['city'][0], $item['city'][1],$item['country'][0]);
    }


    foreach ($animal_data as $item) {
        $animal_classes->addAnimalClass($item['animal_class'][0], $item['animal_class'][1]);
        $animals->addAnimal($item['animal'][0],$item['animal'][1],$item['animal'][2],$item['animal_class'][0]);
    }
}

// seedAllTables($countries, $cities, $animal_classes, $animals);

