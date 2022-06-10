<?php

if(isset($_POST["sendResponse"])){

    $name = $_POST["username"];
    $decision = $_POST["status"];
    $response = $_POST["response"];

    require_once '../includes/dbConnection.inc.php';
    require_once '../includes/functions.inc.php';

    // if(emptyAppointmentsForm($name, $quantity)){
    //     header("location:../appointments.php?error=emptyInputAtModifyAppointmentsForm");
    //     exit();
    // }

    modifyBooking($conn, $name, $decision, $response);
}
else{
    header("location: ../appointments.php");
    exit();
}