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

 