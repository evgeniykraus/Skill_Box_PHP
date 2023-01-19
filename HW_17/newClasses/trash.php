<?php

$countryName = 'Япония';
$countryCode = 'JPN';

$stmt = $db->prepare("INSERT INTO countries (name, code) VALUES (?, ?)");
$stmt->bind_param("ss", $countryName, $countryCode);
try {
    $stmt->execute();
} catch (mysqli_sql_exception $e) {
    var_dump("Ошибка: {$e->getMessage()}. Код ошибки: {$e->getCode()}");
}
var_dump($stmt->insert_id);


//$allCountries = $countries->getCountriesList()->get_result()->fetch_all(MYSQLI_ASSOC);
//var_dump($allCountries);

//var_dump($countries->getCountryID('Германия'));

//var_dump($countries->addCountry( 'Россия', 'RUS'));

//var_dump($countries->addCountry('Германия','GER'));

//var_dump($countries->deleteCountry(1));

//$allCities = $cities->getCitiesList()->get_result()->fetch_all(MYSQLI_ASSOC);
//var_dump($allCities);

//var_dump($cities->addCity('Кемерово','21.12.1877','Россия'));

//var_dump($cities->updateCity('1','Кемерово','12.12.2022','31'));

//var_dump($cities->getCityID('Кемерово'));

//var_dump($cities->deleteCity(1));

//Заполнит таблицы
//foreach ($data as $item) {
//    $countries->addCountry($item['country'][0], $item['country'][1]);
//    $cities->addCity($item['city'][0], $item['city'][1],$item['country'][0]);
//}