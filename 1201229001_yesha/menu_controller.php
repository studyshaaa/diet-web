<?php
require 'database.php';

// Membuat objek koneksi
$database = new Database();

try {
    // Mendapatkan objek PDO
    $pdo = $database->getConnection();

    // Mengecek apakah form disubmit
    if (isset($_POST['tambah_menu'])) {
        // Mengambil nilai dari formulir
        $nama_menu = $_POST['nama_menu'];
        $kalori = $_POST['kalori'];
        $karbohidrat = $_POST['karbohidrat'];
        $protein = $_POST['protein'];
        $lemak = $_POST['lemak'];

        // Menyiapkan query SQL untuk menyimpan data ke dalam database
        $sql = "INSERT INTO menu (nama_menu, kalori, karbohidrat, protein, lemak) VALUES (?, ?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);

        // Mengeksekusi query dengan menggunakan data yang diambil dari formulir
        $statement->execute([$nama_menu, $kalori, $karbohidrat, $protein, $lemak]);

        // Redirect ke halaman sukses atau halaman lain yang diinginkan
        header("Location: hitungNutrisi.php");
        exit(); // Penting untuk menghentikan eksekusi selanjutnya setelah melakukan redirect
    }
} catch (PDOException $e) {
    // Menampilkan pesan kesalahan jika terjadi error
    echo "Error: " . $e->getMessage();
}
?>
