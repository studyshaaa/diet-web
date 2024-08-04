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

        // Menampilkan pesan berhasil
        echo "<h3>Menu Makanan Ditambahkan:</h3>";
        echo "<p>Nama Makanan: $nama_menu</p>";
        echo "<p>Kalori: $kalori kcal</p>";
        echo "<p>Karbohidrat: $karbohidrat gram</p>";
        echo "<p>Protein: $protein gram</p>";
        echo "<p>Lemak: $lemak gram</p>";
        echo "<p>Data berhasil disimpan ke database.</p>";
    }
} catch (PDOException $e) {
    // Menampilkan pesan kesalahan jika terjadi error
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include ('header.php');?>
<link rel="stylesheet" type="text/css" href="style.css">


<head>
    <!-- Head section -->
</head>

<body>
    <!-- Body section -->
    <div class="content">
        <h2>Tambah Menu Makanan</h2>

        <form action="" method="post">
            <!-- Form input fields -->
            <label for="nama_menu">Nama Makanan:</label>
            <input type="text" name="nama_menu" id="nama_menu" required>

            <label for="kalori">Kalori:</label>
            <input type="text" name="kalori" id="kalori" required>

            <label for="karbohidrat">Karbohidrat (gram):</label>
            <input type="text" name="karbohidrat" id="karbohidrat" required>

            <label for="protein">Protein (gram):</label>
            <input type="text" name="protein" id="protein" required>

            <label for="lemak">Lemak (gram):</label>
            <input type="text" name="lemak" id="lemak" required>

            <button type="submit" name="tambah_menu">Tambah Menu</button>
        </form>
    </div>
</body>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #FFFFFF;
}

.content {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

form {
    display: grid;
    gap: 15px;
}

label {
    font-size: 16px;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #fdd835;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #fbc02d;
}

/* Optional: Style for success message */
.success-message {
    color: green;
    margin-top: 15px;
    font-weight: bold;
}

</style>
</html>
