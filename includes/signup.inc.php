<?php

if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $username = $_POST["uid"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $rptpassword = $_POST["pwdrepeat"];

    require_once '../includes/dbConnection.inc.php';
    require_once '../includes/functions.inc.php';

    if(emptyInput($name, $username, $email, $password, $rptpassword)){
        header("location:../signInPage.php?error=emptyInput");
        exit();
    }

    if(invalidEmail($email) !== false)
    {
        header("location:../signInPage.php?error=invalidEmail");
        exit();
    }

    if(passwordLength($password) !== false){
        header("location:../signInPage.php?error=shortPasswordLength");
        exit();
    }

    if(passwordMatch($password, $rptpassword) !== false)
    {
        header("location:../signInPage.php?error=passwordNotMatching");
        exit();
    }
    
    if(invalidUsername($username) !== false)
    {
        header("location:../signInPage.php?error=invalidUsername");
        exit();
    }

    if(usernameTaken($conn, $username, $email) !== false)
    {
        header("location:../signInPage.php?error=usernameTaken");
        exit();
    }

    createUser($conn, $name, $username, $email, $password);
}

else{
    header("location: ../signInPage.php");
    exit();
}