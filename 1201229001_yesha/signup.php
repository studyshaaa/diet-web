<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-widt, initial-scale=1.0">
    <title>Healthy Meal's Monitor</title>
    <link rel="stylesheet" href="style2.css">
 </head>
<?php
require 'database.php';
include 'header.php';
// include ('header.php');
// Inisialisasi objek Database
$database = new Database();

// Mendapatkan objek PDO
$pdo = $database->getConnection();

// Menangani formulir sign up
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["txtname"];
    $email = $_POST["txtemail"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);

        if ($statement->execute()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Registrasi gagal. Silakan coba lagi.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<div class="container">
    <div class="signup">
        <form action="" method="post">
            <h1>Sign Up</h1>
            <p>Diet Meal's Monitor</p>
            <div>
                <label for="txtname">Username</label>
                <input type="text" id="txtname" name="txtname"/>
            </div>
            <div>
                <label for="txtemail">Email</label>
                <input type="text" id="txtemail" name="txtemail"/>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password"/>
            </div>
            <div>
                <p><button type="submit" class="tbl-kuning">Sign Up!!</button></p>
            </div>
            <p><a href="#" class="lupapass">Forgot Password?</a></p>
            <div class="kanan">
                <img src="assetregis/peas.png" alt="">
            </div>
        </form>
    </div>
</div>

<?php 
// include('footer.php');
?>
