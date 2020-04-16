<?php


class DatabaseConnection
{
    const DB_SERVERNAME = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'TalaHethnawi1';
    const DB_NAME = 'sapa';
    private $connection = null;

    public function __construct()
    {
        $this->connection = new mysqli(self::DB_SERVERNAME, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME);
        if ($this->connection->connect_error) {
            die("Connection failed");
        }
    }

    function _destruct()
    {
        $this->connection->close();
    }

    public function getConnection()
    {
        return $this->connection;
    }
}