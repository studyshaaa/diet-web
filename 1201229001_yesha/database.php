<?php
class Database {
    private $pdo;

    public function __construct() {
        try {
            $dsn = "mysql:host=localhost;dbname=dietmonitor;charset=UTF8";
            $this->pdo = new PDO($dsn, 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
