<?php

class Country
{
    private $conn;
    private string $table = 'countries';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getCountriesList()
    {
        $query = 'SELECT id, name, code FROM ' . $this->table . ' ORDER BY name';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addCountry($name, $code): bool
    {
        $query = 'INSERT INTO ' . $this->table . ' SET name = ?, code = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $name, $code);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function updateCountry($id, $name, $code): bool
    {
        $query = "UPDATE {$this->table} SET name = ?, code = ? WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $name, $code, $id);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function deleteCountry($id): bool
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function getCountryID($name): int
    {
        $query = "SELECT id FROM {$this->table} WHERE name = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $name);

        if ($this->catchError($stmt)) {

            return $stmt->get_result()->fetch_assoc()['id'] ?? -1;
        }

        return -1;
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