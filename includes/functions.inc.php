<?php

function emptyInput($name, $username, $email, $password, $rptpassword){
    global $result;

    if(empty($name) || empty($username) || empty($email) || empty($password) || empty($rptpassword)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function invalidUsername($username){
    global $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function passwordMatch($password, $rptpassword){
    global $result;
    if($password != $rptpassword){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    global $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
 }

 function passwordLength($password){
    global $result;
    $lengthPwd = strlen($password);
    if($lengthPwd < 6){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
 }

 function usernameTaken($conn, $username){
    $sql= "SELECT * FROM users WHERE userUid = ?; ";
    $statement= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql)){
       header("location:../signInPage.php?error=statementFailed");
       exit();
    }

    mysqli_stmt_bind_param($statement,"s", $username);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);
    if($row = mysqli_fetch_assoc($resultData)){
           return $row;
    }
    else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($statement);
}

function postItem($conn, $name, $quantity, $image, $details){
    $sql = "INSERT INTO postitemdb (nameProduct, quantityProduct, imageProduct, detailsProduct) VALUES(?, ?, ?, ?);";
    $statement= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement, $sql)){
        header("location:../postItemPage.php?error=statementFailed");
        exit();
     }
    mysqli_stmt_bind_param($statement,"ssss", $name, $quantity, $image, $details);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location:../postItemPage.php?error=none");
       exit();
}

function createUser($conn, $name, $username, $email, $password){
    $sql= "INSERT INTO users (userName, userUid, userEmail, userPwd) VALUES (?, ?, ?, ?);";
    $statement= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement, $sql)){
       header("location:../signInPage.php?error=statementFailed");
       exit();
    }
    $hashedPassword=password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($statement,"ssss", $name, $username, $email, $hashedPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location:../signInPage.php?error=none");
       exit();
}


function emptyInputLogin($username, $password){
    global $result;
    if(empty($username) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

function loginUser($conn,$username,$password) {
    $usernameTaken=usernameTaken($conn,$username);
    if($usernameTaken === false){
        header("location: ../signInPage.php?error=wrongLogin");
        exit();

    }

    $hashedPassword=$usernameTaken["userPwd"];
    $checkPassword= password_verify($password, $hashedPassword);

    if($checkPassword===false){
      header("location: ../signInPage.php?error=wrongLogin2");
      exit();
     //console_log($password);
     //console_log($hashedPassword);
     //console_log($checkPassword);
    }
     else if($checkPassword===true){
        session_start();
        $_SESSION["userid"]=$usernameTaken["userId"];
        $_SESSION["useruid"]=$usernameTaken["userUid"];
        header("location: ../mainPage.php");
        exit();
    }

}


function deleteItem($conn, $name){
    $sql = "SELECT * FROM postitemdb WHERE nameProduct = '$name';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        $sql1 = "DELETE FROM postitemdb WHERE nameProduct = ?;";
        $statement= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement,$sql1)){
        header("location:../deleteItemPage.php?error=statementFailed");
        exit();
        }
        mysqli_stmt_bind_param($statement,"s", $name);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
        header("location:../deleteItemPage.php?error=none");
        exit();
        }
        else{
            header("location:../deleteItemPage.php?error=itemNotFound");
            exit();
        }
        header("location:../deleteItemPage.php?error=statementFailed");
        exit();
    }


