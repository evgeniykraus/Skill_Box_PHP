<?php

class Users
{
    private $conn;
    private string $table = 'users';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    /**
     * @param int $userId
     * @return array
     */
    public function usersList(int $userId): array
    {
        $query = "SELECT u.id, u.name, u.surname
                  FROM $this->table u
                    LEFT JOIN group_user gu ON u.id = gu.user_id
                    LEFT JOIN `groups` g ON g.id = gu.group_id
                  WHERE u.id != ?
                    AND g.name = 'Пользователи с правом писать сообщения'
                  ORDER BY u.name";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function authorize(string $email, string $password): bool
    {
        $query = "SELECT users.id, users.name, phone, surname, password,
                         CASE
                             WHEN ('Пользователи с правом писать сообщения') in (select g.name from `groups` g
                                                          JOIN group_user gu ON g.id = gu.group_id
                                   WHERE gu.user_id = users.id) 
                                 THEN 1
                             ELSE 0
                             END AS can_write
                  FROM users
                  WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            if ($_SESSION['is_logged_in'] = password_verify($password, $result['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['can_write'] = $result['can_write'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['phone'] = $result['phone'];
                $_SESSION['name'] = $result['name'] . ' ' . $result['surname'];
                return true;
            }
        }
        return false;
    }

    /**
     * @param int $id
     * @return array
     */
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

    /**
     * @return void
     */
    public function logOut(): void
    {
        session_unset();
        session_destroy();
    }

}