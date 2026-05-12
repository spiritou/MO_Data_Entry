<?php
namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . DB_HOST . 
                ';port=' . DB_PORT .
                ';dbname=' . DB_DATABASE,
                DB_USERNAME,
                DB_PASSWORD
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}