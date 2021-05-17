<?php 
    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    $cnp = $_POST['CNP'];

    if (emptyCnp($cnp) !== false) {
        header("location: ../deleteProprietari.php?error=emptycnp");
        exit();
    }

    if (invalidCnp($cnp) !== false) {
        header("location: ../deleteProprietari.php?error=cnpinvalid");
        exit();
    }


    if (cnpExistsInsertProprietari($conn, $cnp) == 0) {
        header("location: ../deleteProprietari.php?error=cnpdoesnotexist");
        exit();
    }

    $delete = "DELETE FROM `proprietari` WHERE `proprietari`.`CNP` = $cnp;";
    mysqli_query($conn, $delete);

    header("location: ../deleteProprietari.php?delete=success");
?>