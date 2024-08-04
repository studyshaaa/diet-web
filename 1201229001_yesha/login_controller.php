<?php
require_once('userAccount.php');
if(@$_POST['tbl-login']!=null){
    $usr = $_POST['txtusr'];
    $pwd = $_POST['txtpwd'];

    //echo $usr."|".$pwd;
    $user = new userAccount();
    if($usr!=null && $pwd!=null){
        $data = $user->auth($usr,$pwd);
        if ($data!=null){
            session_start();
            $_SESSION['usr']='$usr';
            header('Location:header.php');
        }else{
            header('Location:login.php?username atau passowrd kosong');
        }
        
    }else{
        header('Location:login.php?pesan=username atau password kosong!');
    }
}
?>