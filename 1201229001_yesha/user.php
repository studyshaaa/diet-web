<?php
include 'database.php';

// Membuat objek koneksi
$database = new Database();
// Mendapatkan objek PDO
$pdo = $database->getConnection();


class User{
    private $username;
    private $email;
    private $password;

    public function __construct($username,$email,$password)
    {
        $this->username=$nama;
        $this->email=$email;
        $this->password=$password;
    }

    public function tampilNama()
    {
        return $this->username;
    }

    public function isiNama($username)
    {
        $this->username=$nama;
    }
    
}
?>