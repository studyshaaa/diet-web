<?php
include("UserAccount.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new UserAccount($_POST['txtnama'],$_POST['txtpwd'],$_POST['txtemail'],$_POST['aktif']);
    $user->simpan();
    header('Location:index.php');
    // echo "<pre>";
    // var_dump($user);
    // echo "</pre>";
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['status']=='del') {
    $user = new UserAccount();
    $pesan = $user->hapus($_GET['id']);
    header('Location:header.php?pesan='.$pesan['status']);
    
}

?>