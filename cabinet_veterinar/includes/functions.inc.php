<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;  
    } else {
        $result = false;
        return $result;
    }
   
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);   
    mysqli_stmt_close($stmt);
    header("location: ../login.php?signup=succesful");
    exit();
}

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result =  true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    
    if($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../selection.php");
        exit();
    }
}

function emptyInputInsertProprietari($nume, $prenume, $cnp, $strada, $judet, $oras, $numarTelefon, $email) {
    $result;
    if (empty($nume) || empty($prenume) || empty($cnp) || empty($strada) || empty($oras) || empty($numarTelefon) || empty($email)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function cnpExistsInsertProprietari($conn, $cnp) {
    $sql = "SELECT * FROM proprietari WHERE CNP = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../insertProprietari.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $cnp);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;  
    } else {
        $result = 0;
        return $result;
    }
   
    mysqli_stmt_close($stmt);
}

function invalidCnp($cnp) {
    $result;
    if (!preg_match("/^[0-9]*$/", $cnp) || strlen($cnp) !== 13) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyCnp($cnp) {
    $result;
    if (empty($cnp)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidPhoneNumber($numarTelefon) {
    $result;
    if (!preg_match("/^[0-9]*$/", $numarTelefon) || strlen($numarTelefon) !== 10) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyInputInsertPacienti($cnp, $nume, $specie, $rasa, $sex, $culoare) {
    if (empty($cnp) || empty($nume) || empty($specie) || empty($rasa) || empty($sex) || empty($culoare)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function microchipExists($conn, $numarMicrocip) {
    $sql = "SELECT * FROM pacienti WHERE NumarMicrocip = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../insertPacienti.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $numarMicrocip);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;  
    } else {
        $result = 0;
        return $result;
    }
   
    mysqli_stmt_close($stmt);
}

function invalidMicrohip($numarMicrocip) {
    $result;
    if (!preg_match("/^[0-9]*$/", $numarMicrocip) || strlen($numarMicrocip) > 11) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function patientCodeExists($conn, $codPacient) {
    $sql = "SELECT * FROM pacienti WHERE CodPacient = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../insertPacienti.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $codPacient);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;  
    } else {
        $result = 0;
        return $result;
    }
   
    mysqli_stmt_close($stmt);
}

function varcharOverflow50 ($string) {
    if (strlen($string) > 50) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}