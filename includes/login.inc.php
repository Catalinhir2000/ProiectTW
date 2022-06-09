<?php

if(isset($_POST["submitLogin"])){

    $usernameLogin = $_POST["uidLogin"];
    $passwordLogin = $_POST["pwdLogin"];

    require_once '../includes/dbConnection.inc.php';
    require_once '../includes/functions.inc.php';

    if(emptyInputLogin($usernameLogin, $passwordLogin)){
        header("location:../signInPage.php?error=emptyInputAtLogin");
        exit();
    }
    
    loginUser($conn , $usernameLogin, $passwordLogin);
}

else{
    header("location: ../signInPage.php");
    exit();
}