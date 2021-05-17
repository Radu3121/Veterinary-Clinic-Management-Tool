<?php 
    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    $nume = $_POST['Nume'];
    $prenume = $_POST['Prenume'];
    $cnp = $_POST['CNP'];
    $strada = $_POST['Strada'];
    $judet = $_POST['Judet'];
    $oras = $_POST['Oras/Sector'];
    $numarTelefon = $_POST['NumarTelefon'];
    $email = $_POST['Email'];

    if (varcharOverflow50($nume) !== false) {
        header("location: ../updateProprietari.php?error=nameoverflow");
        exit();
    }

    if (varcharOverflow50($prenume) !== false) {
        header("location: ../updateProprietari.php?error=firstnameoverflow");
        exit();
    }

    if (varcharOverflow50($strada) !== false) {
        header("location: ../updateProprietari.php?error=streetoverflow");
        exit();
    }

    if (varcharOverflow50($judet) !== false) {
        header("location: ../updateProprietari.php?error=countyoverflow");
        exit();
    }

    if (varcharOverflow50($oras) !== false) {
        header("location: ../updateProprietari.php?error=cityoverflow");
        exit();
    }

    if (varcharOverflow50($email) !== false) {
        header("location: ../updateProprietari.php?error=emailoverflow");
        exit();
    }

    $selectByCNP = "SELECT * FROM proprietari WHERE CNP = '$cnp';";
    $result = mysqli_query($conn, $selectByCNP);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("location: ../updateProprietari.php?error=nonexistent");
        exit();
    }
    if (invalidCnp($cnp) !== false) {
        header("location: ../updateProprietari.php?error=cnpinvalid");
        exit();
    }

    if (invalidPhoneNumber($numarTelefon) !== false && !empty($numarTelefon)) {
        header("location: ../updateProprietari.php?error=numartelefoninvalid");
        exit();
    }

    if (invalidEmail($email) !== false && !empty($email)) {
        header("location: ../updateProprietari.php?error=emailinvalid");
        exit();
    }
    
    if (!empty($nume)) {
      $upate = "UPDATE `proprietari` SET `Nume` = '$nume' WHERE `proprietari`.`CNP` = '$cnp';"; 
      mysqli_query($conn, $upate);
    }
    if (!empty($prenume)) {
      $upate = "UPDATE `proprietari` SET `Prenume` = '$prenume' WHERE `proprietari`.`CNP` = '$cnp';"; 
      mysqli_query($conn, $upate);
    }
    if (!empty($cnp)) {
      $upate = "UPDATE `proprietari` SET `CNP` = '$cnp' WHERE `proprietari`.`CNP` = '$cnp';"; 
      mysqli_query($conn, $upate);
    }
    if (!empty($strada)) {
      $upate = "UPDATE `proprietari` SET `Strada` = '$strada' WHERE `proprietari`.`CNP` = '$cnp';"; 
      mysqli_query($conn, $upate);
    }
    if (!empty($oras)) {
      $upate = "UPDATE `proprietari` SET `Oras / Sector` = '$oras' WHERE `proprietari`.`CNP` = '$cnp';"; 
      mysqli_query($conn, $upate);
    }
    if (!empty($judet)) {
      $upate = "UPDATE `proprietari` SET `Judet` = '$judet' WHERE `proprietari`.`CNP` = '$cnp';"; 
      mysqli_query($conn, $upate);
    }
    if (!empty($numarTelefon)) {
      $upate = "UPDATE `proprietari` SET `NumarTelefon` = '$numarTelefon' WHERE `proprietari`.`CNP` = '$cnp';"; 
      mysqli_query($conn, $upate);
    }
    if (!empty($email)) {
      $upate = "UPDATE `proprietari` SET `Email` = '$email' WHERE `proprietari`.`CNP` = '$cnp';"; 
      mysqli_query($conn, $upate);
    }
    

    header("location: ../updateProprietari.php?update=success");
        
?>