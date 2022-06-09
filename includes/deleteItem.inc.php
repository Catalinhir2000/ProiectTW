<?php

if(isset($_POST["deleteItem"])){

    $name = $_POST["nameProduct"];

    require_once '../includes/dbConnection.inc.php';
    require_once '../includes/functions.inc.php';

    if(emptyDeleteForm($name)){
        header("location:../deleteItemPage.php?error=emptyInputAtDeleteForm");
        exit();
    }

    deleteItem($conn, $name);
}
else{
    header("location: ../deleteItemPage.php");
    exit();
}