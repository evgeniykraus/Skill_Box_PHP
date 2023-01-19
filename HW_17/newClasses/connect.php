<?php


class Database {
    private string $host     = '127.0.0.1';
    private string $db       = 'test';
    private string $user     = 'root';
    private string $password = '';
    private int $port     = 3306;
    private string $charset  = 'utf8mb4';

    private mysqli $db_connection;

    public function __construct() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->db_connection = new mysqli($this->host, $this->user, $this->password, $this->db, $this->port);
        $this->db_connection->set_charset($this->charset);
        $this->db_connection->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    }

    public function getConnection(): mysqli
    {
        return $this->db_connection;
    }
}