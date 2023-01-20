<?php

class Cities
{
    private $conn;
    private string $table = 'cities';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getCitiesList()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY name';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addCity($name, $founded_at, $countryName): bool
    {
        $countries = new Countries($this->conn);
        $country_id = $countries->getCountryID($countryName);


        if (!$this->isValidDate($founded_at, 'd.m.Y') || ($country_id < 1)) {
            return false;
        }

        $query = 'INSERT INTO ' . $this->table . ' 
        SET name = ?, 
        founded_at = str_to_date(?, "%d.%m.%Y"),
        country_id = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $name, $founded_at, $country_id);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function updateCity($id, $name, $founded_at, $country_id): bool
    {
        $query = "UPDATE {$this->table} SET 
                  name = ?,
                  founded_at = str_to_date(?, '%d.%m.%Y'),
                  country_id = ?
                  WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssii", $name, $founded_at, $country_id, $id);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function deleteCity($id): bool
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function getCityID($name): int
    {
        $query = "SELECT id FROM {$this->table} WHERE name = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $name);

        if ($this->catchError($stmt)) {

            return $stmt->get_result()->fetch_assoc()['id'] ?? -1;
        }

        return -1;
    }

    private function isValidDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    private function catchError($statement): bool
    {
        try {

            return $statement->execute();

        } catch (mysqli_sql_exception $e) {
            var_dump("Ошибка: {$e->getMessage()}. Код ошибки: {$e->getCode()}");

            return false;
        }
    }
}