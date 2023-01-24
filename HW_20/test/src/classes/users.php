<?php

class Users
{
    private $conn;
    private string $table = 'users';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function usersList($userId)
    {
        $query = "SELECT users.id,
       users.name,
       phone
       email,
       surname,
       password,
       CASE
           WHEN ('Пользователи с правом писать сообщения') in (select g.name from `groups` g
                                        JOIN group_user gu ON g.id = gu.group_id
                 WHERE gu.user_id = users.id) 
               THEN 1
           ELSE 0
           END AS group_name
FROM users
WHERE EMAIL = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function authorize(string $email, string $password): bool
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
                return true;
            }
        }
        return false;
    }

    public function getUserGroups(int $id): array
    {
        $query = "SELECT g.id, g.name, g.description FROM `groups` g
                    LEFT JOIN group_user gu ON g.id = gu.group_id
                    LEFT JOIN users u on u.id = gu.user_id
                  WHERE u.id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function logOut(): void
    {
        session_unset();
        session_destroy();
    }

}