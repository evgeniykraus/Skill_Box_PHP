<?php

class TestDataBase
{
    private $connect;

    public function __construct($host, $user, $password, $dbname)
    {
        $this->connect = mysqli_connect($host, $user, $password, $dbname);
    }

    /**
     * Добавить новое животное в базу данных
     * @param string $name
     * @param int $can_flying
     * @param int $legs_count
     * @return bool
     */
    public function addAnimal(string $name, int $can_flying, int $legs_count): bool
    {
        $query = "INSERT INTO animals (name, can_flying, legs_count, class_id) VALUES ('$name', '$can_flying', '$legs_count', 1)";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    /**
     * Получить информацию о всех животных из базы данных
     * @return array
     */
    public function getAllAnimals(): array
    {
        $result = mysqli_query($this->connect, 'SELECT * FROM animals');
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /**
     * Добавить новую страну в базу данных
     * @param string $name
     * @param int $country_id
     * @return bool
     */
    public function addCountry(string $name, int $code): bool
    {
        $query = "INSERT INTO countries (name, code) VALUES ('$name', '$code')";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    /**
     * Добавить новый город в базу данных
     * @param string $name
     * @param string $founded_at
     * @param int $country_id
     * @return bool
     */
    public function addCity(string $name, string $founded_at, int $country_id): bool
    {
        $_founded_at = date_parse($founded_at);
        if (checkdate($_founded_at['month'], $_founded_at['day'], $_founded_at['year'])) {
            $query = "INSERT INTO cities (name, founded_at, country_id) VALUES ('$name', '$founded_at', '$country_id')";
            $result = mysqli_query($this->connect, $query);
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Выполнить любой запрос
     * @param string $query
     * @return array|bool|mysqli_result
     */
    public function query(string $query)
    {
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }
}

$dataBase = new TestDataBase('localhost', 'test_user', 'test', 'test');


$dataBase->addAnimal('Хомяк', 0, 3);
//$animals = $dataBase->getAllAnimals();
//
//
//foreach ($animals as $animal) {
//    echo $animal['name'] . "<br>";
//}

//var_dump($dataBase->addCountry('США', 1));
//var_dump($dataBase->addCity('Кемерово', '01.01.1918', 7));

var_dump($dataBase->query('select * from countries;'));