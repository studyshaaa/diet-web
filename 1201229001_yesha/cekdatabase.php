<?php
require 'database.php';

try {
    // Membuat objek koneksi
    $database = new Database();

    // Mendapatkan objek PDO
    $pdo = $database->getConnection();

    //koneksi berhasil, tampilkan pesan
    echo "Koneksi ke database berhasil!";
} catch (PDOException $e) {
    // Jika terjadi kesalahan, tampilkan pesan kesalahan
    echo "Error: " . $e->getMessage();
}
?>
