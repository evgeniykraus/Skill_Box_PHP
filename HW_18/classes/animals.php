<?php

class Animals
{
    private $conn;
    private string $table = 'animals';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAnimalsList()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY name';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addAnimal(string $name, int $can_flying, int $legs_count, string $animalClass): bool
    {
        $animalClasses = new Animal_classes($this->conn);
        $animalClassID = $animalClasses->getAnimalClassID($animalClass);


        $query = 'INSERT INTO ' . $this->table . ' 
        SET name = ?, 
        can_flying = ?,
        legs_count = ?,
        class_id = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siii", $name, $can_flying, $legs_count, $animalClassID);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function updateAnimal(int $id, string $name, int $can_flying, int $animalClassID): bool
    {
        $query = "UPDATE {$this->table} SET 
                  name = ?,
                  can_flying = ?,
                  class_id = ?
                  WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siii", $name, $can_flying, $animalClassID, $id);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function deleteAnimal(int $id): bool
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($this->catchError($stmt)) {
            return true;
        }

        return false;
    }

    public function getAnimalID(string $name): int
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