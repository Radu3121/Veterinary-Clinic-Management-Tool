<?php 
    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    $codPacient = $_POST['CodPacient'];
    $nume = $_POST['Nume'];
    $specie = $_POST['Specie'];
    $rasa = $_POST['Rasa'];
    $sex = $_POST['Sex'];
    $dataNasterii = $_POST['DataNasterii'];
    $culoare = $_POST['Culoare'];
    $numarMicrocip = $_POST['NumarMicrocip'];
    $dataImplantareMicrocip = $_POST['DataImplantareMicrocip'];
    $localizareMicrocip = $_POST['LocalizareMicrocip'];

    if (varcharOverflow50($nume) !== false) {
        header("location: ../updatePacienti.php?error=nameoverflow");
        exit();
    }

    if (varcharOverflow50($specie) !== false) {
        header("location: ../updatePacienti.php?error=speciesoverflow");
        exit();
    }

    if (varcharOverflow50($rasa) !== false) {
        header("location: ../updatePacienti.php?error=raceoverflow");
        exit();
    }

    if (varcharOverflow50($culoare) !== false) {
        header("location: ../updatePacienti.php?error=coloroverflow");
        exit();
    }

    if (patientCodeExists($conn, $codPacient) == 0) {
        header("location: ../updatePacienti.php?error=patientcodedoesnotexist");
        exit();
    }

    if (invalidMicrohip($numarMicrocip) !== false) {
        header("location: ../updatePacienti.php?error=invalidMicrohip");
        exit();
    }

    if (microchipExists($conn, $numarMicrocip) !== 0) {
        header("location: ../updatePacienti.php?error=microchipexists");
        exit();
    }
     
    if (!empty($nume)) {
        $update = "UPDATE `pacienti` SET `Nume` = '$nume' WHERE `pacienti`.`CodPacient` = $codPacient;";
        mysqli_query($conn, $update);
    }

    if (!empty($specie)) {
        $update = "UPDATE `pacienti` SET `Specie` = '$specie' WHERE `pacienti`.`CodPacient` = $codPacient;";
        mysqli_query($conn, $update);
    }

    if (!empty($rasa)) {
        $update = "UPDATE `pacienti` SET `Rasa` = '$rasa' WHERE `pacienti`.`CodPacient` = $codPacient;";
        mysqli_query($conn, $update);
    }

    if (!empty($sex)) {
        $update = "UPDATE `pacienti` SET `Sex` = '$sex' WHERE `pacienti`.`CodPacient` = $codPacient;";
        mysqli_query($conn, $update);
    }

    if (!empty($dataNasterii)) {
        $dataNasterii = !empty($dataNasterii) ? "'$dataNasterii'" : "NULL";
        $update = "UPDATE `pacienti` SET `DataNasterii` = $dataNasterii WHERE `pacienti`.`CodPacient` = $codPacient;";
        mysqli_query($conn, $update);
    }

    if (!empty($culoare)) {
        $update = "UPDATE `pacienti` SET `Culoare` = '$culoare' WHERE `pacienti`.`CodPacient` = $codPacient;";
        mysqli_query($conn, $update);
    }

    if (!empty($numarMicrocip)) {
        $numarMicrocip = !empty($numarMicrocip) ? "'$numarMicrocip'" : "NULL";
        $update = "UPDATE `pacienti` SET `NumarMicrocip` = $numarMicrocip WHERE `pacienti`.`CodPacient` = $codPacient;";
        mysqli_query($conn, $update);
    }

    if (!empty($dataImplantareMicrocip)) {
        $dataImplantareMicrocip = !empty($dataImplantareMicrocip) ? "'$dataImplantareMicrocip'" : "NULL";
        $update = "UPDATE `pacienti` SET `DataImplantareMicrocip` = $dataImplantareMicrocip WHERE `pacienti`.`CodPacient` = $codPacient;";
        mysqli_query($conn, $update);
    }

    if (!empty($localizareMicrocip)) {
        $update = "UPDATE `pacienti` SET `LocalizareMicrocip` = '$localizareMicrocip' WHERE `pacienti`.`CodPacient` = $codPacient;";
        mysqli_query($conn, $update);
    }

    header("location: ../updatePacienti.php?insert=success");
?>