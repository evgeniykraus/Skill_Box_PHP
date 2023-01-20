<?php

class Animal_classes
{
    private $conn;
    private string $table = 'Animal_classes';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function animalClassesList()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY name';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addAnimalClass(string $name, int $can_flying): bool
    {
        $query = 'INSERT INTO ' . $this->table . ' 
        SET name = ?, 
        can_flying = ?
        ON DUPLICATE KEY UPDATE name = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sis", $name, $can_flying, $name);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function updateAnimalClass(int $id, string $name, int $can_flying): bool
    {
        $query = "UPDATE {$this->table} SET 
                  name = ?,
                  can_flying = ?
                  WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sii", $name, $can_flying, $id);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function deleteAnimalClass(int $id): bool
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function getAnimalClassID(string $name): int
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