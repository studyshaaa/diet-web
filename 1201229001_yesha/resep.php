<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Meal's Monitor - Resep</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="header"> 
            <div class="logo"><a href=''>Diet Meat's Monitor</a></div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="resep.php">Recipes</a></li>
                    <li><a href="hitungNutrisi.php">Nutrients Intake</a></li>
                    <li><a href="#kontak">Contact Us</a></li>
                    <li><a href="signup.php" class="tbl-kuning">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <h2>Resep Sehat</h2>

        <?php
        // array resep
        $reseps = array(
            array("Judul" => "Salad Sayur Segar", "Bahan" => "Daun selada, tomat, timun, wortel", "Langkah" => "Campur semua bahan dalam mangkuk besar."),
            array("Judul" => "Oatmeal Pisang", "Bahan" => "Oatmeal, pisang, susu almond", "Langkah" => "Masak oatmeal dengan susu almond dan tambahkan potongan pisang."),
            array("Judul" => "Paha Ayam Panggang", "Bahan" => "Paha ayam, bumbu rempah, olive oil", "Langkah" => "Marinasi paha ayam dengan bumbu rempah, panggang hingga matang.")
        );

        // Menampilkan resep dari array
        foreach ($reseps as $resep) {
            echo "<div class='resep'>";
            echo "<h3>" . $resep['Judul'] . "</h3>";
            echo "<p><strong>Bahan:</strong> " . $resep['Bahan'] . "</p>";
            echo "<p><strong>Langkah:</strong> " . $resep['Langkah'] . "</p>";
            echo "</div>";
        }
        ?>

    </div>
</body>
</html>
