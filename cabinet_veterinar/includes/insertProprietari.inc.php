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
        header("location: ../insertProprietari.php?error=nameoverflow");
        exit();
    }

    if (varcharOverflow50($prenume) !== false) {
        header("location: ../insertProprietari.php?error=firstnameoverflow");
        exit();
    }

    if (varcharOverflow50($strada) !== false) {
        header("location: ../insertProprietari.php?error=streetoverflow");
        exit();
    }

    if (varcharOverflow50($judet) !== false) {
        header("location: ../insertProprietari.php?error=countyoverflow");
        exit();
    }

    if (varcharOverflow50($oras) !== false) {
        header("location: ../insertProprietari.php?error=cityoverflow");
        exit();
    }

    if (varcharOverflow50($email) !== false) {
        header("location: ../insertProprietari.php?error=emailoverflow");
        exit();
    }

    if (emptyInputInsertProprietari($nume, $prenume, $cnp, $strada, $judet, $oras, $numarTelefon, $email) !== false) {
        header("location: ../insertProprietari.php?error=emptyinput");
        exit();
    }

    if (cnpExistsInsertProprietari($conn, $cnp) !== 0) {
        header("location: ../insertProprietari.php?error=cnpexists");
        exit();
    }

    if (invalidCnp($cnp) !== false) {
        header("location: ../insertProprietari.php?error=cnpinvalid");
        exit();
    }

    if (invalidPhoneNumber($numarTelefon) !== false) {
        header("location: ../insertProprietari.php?error=numartelefoninvalid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../insertProprietari.php?error=emailinvalid");
        exit();
    }
    
    #echo "<script type='text/javascript'>alert('cnpExistsInsertProprietari($conn, $cnp) !== false');</script>";
    $insert = "INSERT INTO `proprietari` (`ProprietarID`, `Nume`, `Prenume`, `CNP`, `Strada`, `Oras / Sector`, `Judet`, `NumarTelefon`, `Email`) VALUES (NULL, '$nume', '$prenume', '$cnp', '$strada', '$oras', '$judet', '$numarTelefon', '$email');";
    mysqli_query($conn, $insert);

    header("location: ../insertProprietari.php?insert=success");
?>