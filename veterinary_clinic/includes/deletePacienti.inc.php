<?php 
    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    $codPacient = $_POST['CodPacient'];

    if (patientCodeExists($conn, $codPacient) == 0) {
        header("location: ../deletePacienti.php?error=patientcodedoesnotexist");
        exit();
    }

    $delete = "DELETE FROM `pacienti` WHERE `pacienti`.`CodPacient` = '$codPacient';";
    mysqli_query($conn, $delete);

    header("location: ../deletePacienti.php?insert=success");
?>