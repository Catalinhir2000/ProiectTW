<?php

if(isset($_POST["postItem"])){

    $name = $_POST["nameProduct"];
    $quantity = $_POST["quantity"];
    $image = $_POST["image"];
    $details = $_POST["details"];

    require_once '../includes/dbConnection.inc.php';
    require_once '../includes/functions.inc.php';

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];  
    $fileSize = $_FILES["image"]["size"];
    $fileError = $_FILES["image"]["error"];

    $folder = '../images/imagesStock/'.$filename;

    if($fileError === 0){
        if($fileSize < 100000000){
            move_uploaded_file($tempname, $folder);
            postItem($conn, $name, $quantity, $filename, $details);
        } 
        else{
            header("location:../postItemPage.php?error=sizeTooBig");
            exit();
        }
    } 
    else{
        header("location:../postItemPage.php?error=unexpectedError");
        exit();
    }
}
else{
    header("location: ../postItemPage.php");
    exit();
}