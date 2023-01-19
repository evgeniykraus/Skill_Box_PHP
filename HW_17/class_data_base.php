<?php

class TestDataBase
{
    private $connect;

    public function __construct($host, $user, $password, $dbname)
    {
        $this->connect = new mysqli($host, $user, $password, $dbname);
    }

    /**
     * Добавить новый класс животных
     * @param string $name
     * @param int $can_flying
     * @return bool
     * @throws Exception
     */
    public function addAnimalClass(string $name, int $can_flying): bool
    {
        $query = "INSERT INTO animal_classes (name, can_flying) VALUES (?, ?)
                  ON DUPLICATE KEY UPDATE name = '$name', can_flying = '$can_flying'";

        $stmt = $this->connect->prepare($query);
        if (!$stmt) {
            throw new Exception("Error: " . $this->connect->error);
        }
        $stmt->bind_param("si", $name, $can_flying);
        $result = $stmt->execute();
        if (!$result) {
            throw new Exception("Error: " . $stmt->error);
        }
        $stmt->close();
        return $result;
    }


    /**
     * Добавить новое животное в БД
     * @param string $name
     * @param int $can_flying
     * @param int $legs_count
     * @return bool
     * @throws Exception
     */
    public function addAnimal(string $name, int $can_flying, int $legs_count, $animal_class): bool
    {

        $query = "INSERT INTO animal_classes (name, can_flying) VALUES (?, 0)
                  ON DUPLICATE KEY UPDATE name = '$animal_class'";

        $animal_class = $this->checkConstraint('animal_classes', $query, $animal_class);

        $query = "INSERT INTO animals (name, can_flying, legs_count, class_id) VALUES (?, ?, ?, $animal_class)";
        $stmt = $this->connect->prepare($query);
        if (!$stmt) {
            throw new Exception("Error: " . $this->connect->error);
        }
        $stmt->bind_param("sii", $name, $can_flying, $legs_count);
        $result = $stmt->execute();
        if (!$result) {
            throw new Exception("Error: " . $stmt->error);
        }
        $stmt->close();
        return $result;
    }

    /**
     * Получить информацию из таблицы
     * @param string $tableName
     * @return array
     * @throws Exception
     */
    public function getAllFromTable(string $tableName): array
    {
        $query = "SELECT * FROM $tableName";
        if ($result = $this->connect->query($query)) {
            return $result->fetch_all();
        } else {
            throw new Exception("Error: " . $this->connect->error);
        }
    }


    /**
     * Добавить новую страну в БД
     * @param string $name
     * @param string $code
     * @return bool
     * @throws Exception
     */

    public function addCountry(string $name, string $code): bool
    {
        $query = "INSERT INTO countries (name, code) VALUES (?, ?)
                  ON DUPLICATE KEY UPDATE name = '$name', code = '$code'";

        $stmt = $this->connect->prepare($query);
        if (!$stmt) {
            throw new Exception("Error: " . $this->connect->error);
        }
        $stmt->bind_param("si", $name, $code);
        $result = $stmt->execute();
        if (!$result) {
            throw new Exception("Error: " . $stmt->error);
        }
        $stmt->close();
        return $result;
    }

    /**
     * Добавить новый город в БД
     * @param string $name
     * @param string $founded_at
     * @param $country
     * @return bool
     * @throws Exception
     */
    public function addCity(string $name, string $founded_at, $country): bool
    {
        $query = "INSERT INTO countries (name, code) VALUES (?, 0)
                  ON DUPLICATE KEY UPDATE name = '$country'";

        $country_id = $this->checkConstraint('countries', $query, $country);

        $query = "INSERT INTO cities (name, founded_at, country_id) 
                  VALUES (?, str_to_date(?, '%d.%m.%Y'), '$country_id')";

        $stmt = $this->connect->prepare($query);
        if (!$stmt) {
            throw new Exception("Error: " . $this->connect->error);
        }
        $stmt->bind_param("ss", $name, $founded_at);
        $result = $stmt->execute();
        if (!$result) {
            throw new Exception("Error: " . $stmt->error);
        }
        $stmt->close();
        return $result;
    }


    /**
     * Обновит любую таблицу в БД
     * @param string $table
     * @param string $set
     * @param string $newValue
     * @param string $where
     * @param string $equal
     * @return bool
     * @throws Exception
     */
    public function updateTable(string $table, string $set, string $newValue, string $where, string $equal): bool
    {
        $query = "UPDATE $table SET $set = ? WHERE $where = ?";
        $stmt = $this->connect->prepare($query);
        if (!$stmt) {
            throw new Exception("Error: " . $this->connect->error);
        }
        $stmt->bind_param("ss", $newValue, $equal);
        $result = $stmt->execute();
        if (!$result) {
            throw new Exception("Error: " . $stmt->error);
        }
        $stmt->close();
        return $result;
    }

    /**
     * @param string $table
     * @param string $where
     * @param string $equal
     * @return bool
     * @throws Exception
     */
    public function deleteRow(string $table, string $where, string $equal): bool
    {
        $query = "DELETE FROM $table WHERE $where = ?";
        $stmt = $this->connect->prepare($query);
        if (!$stmt) {
            throw new Exception("Error: " . $this->connect->error);
        }
        $stmt->bind_param("s", $equal);
        $result = $stmt->execute();
        if (!$result) {
            throw new Exception("Error: " . $stmt->error);
        }
        $stmt->close();
        return $result;
    }

    /**
     * Выполнить любой запрос
     * @param string $query
     * @return array
     * @throws Exception
     */
    public function query(string $query): array
    {
        if ($result = $this->connect->query($query)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all();
            } else {
                return array();
            }
        } else {
            throw new Exception("Error: " . $this->connect->error);
        }
    }

    /**
     * Проверяет наличие ***
     * @param string $table
     * @param string $query
     * @param string $key
     * @return int
     * @throws Exception
     */
    private function checkConstraint(string $table, string $query, string $key): int
    {
        $stmt = $this->connect->prepare($query);
        if (!$stmt) {
            throw new Exception("Error: " . $this->connect->error);
        }
        $stmt->bind_param("s", $key);
        $stmt->execute();
        $result = $this->connect->query("SELECT id FROM $table WHERE lower(name) = lower('$key')");
        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            return $result['id'];
        } else {
            return 0;
        }
    }
}
