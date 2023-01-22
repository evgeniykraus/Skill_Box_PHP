<?php

class Users
{
    private $conn;
    private string $table = 'USERS';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function usersList()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY name';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function authorize(string $email, string $password): void
    {
        $query = "SELECT id, phone, name, surname, password FROM $this->table WHERE EMAIL = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            if ($_SESSION['is_logged_in'] = password_verify($password, $result['password'])) {
                $_SESSION['id'] = $result['id'];
                $_SESSION['phone'] = $result['phone'];
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $result['name'] . ' ' . $result['surname'];
            }
        }
    }

    public function getUserGroups(int $id): array
    {
        $query = "select g.id, g.name, g.description from `groups` g
                  left join group_user gu on g.id = gu.group_id
                  left join users u on u.id = gu.user_id
                  where u.id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserID(string $name): int
    {
        $query = "SELECT id FROM {$this->table} WHERE name = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $name);

        if ($this->catchError($stmt)) {

            return $stmt->get_result()->fetch_assoc()['id'] ?? -1;
        }

        return -1;
    }

    public function out(): void
    {
        session_unset();
        session_destroy();
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