<?php
require 'config.php';// memuat file konfigurasi
class DbConnection
{
    public $database;
    public function __construct()
    {
        $dsn = "mysql:host=localhost".DB_HOST.";dbname=dietmonitor".DB_NAME.";charset=UTF8";//perintah koneksi dengan mysql
        try{
            $pdo = new PDO($dsn,user_id,password);
            if($pdo){
                $this->database = $pdo;
                // echo "database telah tersambung.";
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>