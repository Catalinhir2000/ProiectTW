<?php

if(isset($_POST["modifyItem"])){

    $name = $_POST["nameProduct"];
    $quantity = $_POST["quantity"];

    require_once '../includes/dbConnection.inc.php';
    require_once '../includes/functions.inc.php';
    if(emptyModifyForm($name, $quantity)){
        header("location:../modifyItemPage.php?error=emptyInputAtModifyForm");
        exit();
    }

    modifyItem($conn, $name, $quantity);
}
else{
    header("location: ../modifyItemPage.php");
    exit();
}