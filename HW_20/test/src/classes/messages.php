<?php

class Messages
{
    private $conn;
    private string $table = 'messages';

    public function __construct($db)
    {
        $this->conn = $db;
    }


    /**
     * @param string $text
     * @param string $title
     * @param int $senderUserId
     * @param int $recipientUserId
     * @param int $categoryId
     * @return bool
     */
    public function sendMessage(string $text, string $title, int $senderUserId, int $recipientUserId, int $categoryId): bool
    {
        $query = "INSERT INTO messages (text, title, created_at, sender_user_id, recipient_user_id)
                  VALUES (?, ?, sysdate(), ?, ?)";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("ssii", $text, $title, $senderUserId, $recipientUserId);
        $stmt->execute();

        return $this->seedCategoryMessage($stmt->insert_id, $categoryId);
    }

    /**
     * @param int $messageId
     * @param int $categoryId
     * @return bool
     */
    private function seedCategoryMessage(int $messageId, int $categoryId): bool
    {
        $query = "INSERT INTO category_message (message_id, category_id)
                  VALUES ($messageId, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $categoryId);
        return $stmt->execute();
    }


    /**
     * @param int $recipientId
     * @return int
     */
    public function getCountMessages(int $recipientId): int
    {
        $query = "SELECT count(m.id) AS id
                  FROM $this->table m
                           LEFT JOIN category_message cm ON m.id = cm.message_id
                           LEFT JOIN categories c ON cm.category_id = c.id
                           LEFT JOIN users u ON c.created_by = u.id
                  WHERE m.read_mark = 0
                    AND m.recipient_user_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $recipientId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['id'];
    }


    /**
     * @param string $messageId
     * @param int $recipientId
     * @return mixed
     */
    public function getMessageById(string $messageId, int $recipientId): mixed
    {
        $query = "SELECT m.title,
                         m.created_at + INTERVAL 4 HOUR AS created_at,
                         m.text,
                         concat(concat(concat(concat(users.name, ' '), users.patronymic), ' '), users.surname) AS sender,
                         users.email
                  FROM $this->table m
                         LEFT JOIN users ON sender_user_id = users.id
                  WHERE m.id = ? AND m.recipient_user_id =? ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $messageId, $recipientId);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $this->readMessage($messageId);
        }

        return $result->fetch_assoc();
    }

    /**
     * @param int $messageId
     * @return void
     */
    private function readMessage(int $messageId): void
    {
        $query = "UPDATE $this->table 
                  SET read_mark = 1
                  WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $messageId);
        $stmt->execute();
    }

    /**
     * @param int $recipientUserId
     * @param int $readMark
     * @return array
     */
    public function getAllUserMessages(int $recipientUserId, int $readMark): array
    {
        $query = "SELECT m.*, c.title category_title, c.id category_id
                  FROM $this->table m
                    LEFT JOIN category_message cm ON m.id = cm.message_id
                    LEFT JOIN categories c ON cm.category_id = c.id
                  WHERE m.recipient_user_id = ?
                    AND m.read_mark = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $recipientUserId, $readMark);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @return array
     */
    public function getAllCategories(): array
    {
        $query = 'SELECT * FROM  categories
                  WHERE categories.parent_id != 0';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}