<?php

if(isset($_POST["BookNow"])){

    $name = $_POST["nameUser"];
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $date = date('Y-m-d', strtotime($_POST["date"])); 
    $image = $_POST["image"];
    $details = $_POST["details"];

    require_once '../includes/dbConnection.inc.php';
    require_once '../includes/functions.inc.php';

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];  
    $fileSize = $_FILES["image"]["size"];
    $fileError = $_FILES["image"]["error"];

    $folder = '../images/bookingImages/'.$filename;

    if($fileError === 0){
        if($fileSize < 100000000){
            move_uploaded_file($tempname, $folder);
            postBooking($conn, $name, $uid, $email, $date, $filename, $details);
            
        } 
        else{
            header("location:../bookingPage.php?error=sizeTooBig");
            exit();
        }
    } 
    else{
        header("location:../bookingPage.php?error=unexpectedError");
        exit();
    }
}
else{
    header("location: ../bookingPage.php");
    exit();
}