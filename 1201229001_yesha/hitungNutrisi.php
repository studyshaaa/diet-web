<?php
require 'database.php';

// Inisialisasi objek Database
$database = new Database();

// Mendapatkan objek PDO
$pdo = $database->getConnection();

// Ambil data makanan dari database
try {
    $sql = "SELECT * FROM menu";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $makananList = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Fungsi untuk menghitung nutrisi total
function hitungTotalNutrisi($makananList) {
    $totalKalori = 0;
    $totalKarbohidrat = 0;
    $totalProtein = 0;
    $totalLemak = 0;

    foreach ($makananList as $makanan) {
        $totalKalori += $makanan['kalori'];
        $totalKarbohidrat += $makanan['karbohidrat'];
        $totalProtein += $makanan['protein'];
        $totalLemak += $makanan['lemak'];
    }

    return [
        'totalKalori' => $totalKalori,
        'totalKarbohidrat' => $totalKarbohidrat,
        'totalProtein' => $totalProtein,
        'totalLemak' => $totalLemak,
    ];
}

// Hitung total nutrisi
$totalNutrisi = hitungTotalNutrisi($makananList);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head section -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Meal's Monitor - Nutrient Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Body section -->
    <nav>
        <div class="header"> 
            <div class="logo"><a href=''>Diet Meat's Monitor</a></div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="resep.php">Recipes</a></li>
                    <li><a href="hitungNutrisi.php">Nutrient Calculator</a></li>
                    <li><a href="menu.php">Add Menu</a></li>
                    <li><a href="signup.php" class="tbl-kuning">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <h2>Nutrient Calculator</h2>

        <?php if (!empty($makananList)): ?>
            <table>
                <tr>
                    <th>Nama Makanan</th>
                    <th>Kalori (kcal)</th>
                    <th>Karbohidrat (g)</th>
                    <th>Protein (g)</th>
                    <th>Lemak (g)</th>
                </tr>
                <?php foreach ($makananList as $makanan): ?>
                    <tr>
                        <td><?php echo $makanan['nama_menu']; ?></td>
                        <td><?php echo $makanan['kalori']; ?></td>
                        <td><?php echo $makanan['karbohidrat']; ?></td>
                        <td><?php echo $makanan['protein']; ?></td>
                        <td><?php echo $makanan['lemak']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <h3>Total Nutrisi</h3>
            <p>Total Kalori: <?php echo $totalNutrisi['totalKalori']; ?> kcal</p>
            <p>Total Karbohidrat: <?php echo $totalNutrisi['totalKarbohidrat']; ?> g</p>
            <p>Total Protein: <?php echo $totalNutrisi['totalProtein']; ?> g</p>
            <p>Total Lemak: <?php echo $totalNutrisi['totalLemak']; ?> g</p>
        <?php else: ?>
            <p>Tidak ada data makanan.</p>
        <?php endif; ?>
        </div>

<body>
<style>
    /* Reset style */
body, h1, h2, h3, p, ul, li, table {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

/* Navigation */
nav {
    background-color: #FFFFFF;
    color: #fff;
    padding: 10px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo a {
    color: #FF9B50;
    text-decoration: none;
    font-size: 1;
}

.menu ul {
    list-style: none;
    display: flex;
}

.menu ul li {
    margin-right: 20px;
}

.menu a {
    text-decoration: none;
    color: #FF9B50F;
}

/* Content */
.content {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #333;
    color: #fff;
}

/* Total Nutrisi */
h3 {
    margin-top: 20px;
    color: #333;
}

p {
    margin-bottom: 10px;
}

/* Signup Link */
.tbl-kuning {
    background-color: #ffc107;
    color: #333;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 4px;
}

.tbl-kuning:hover {
    background-color: #ffca2c;
}

</style>
   </html>
