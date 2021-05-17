<?php 
    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    $cnp = $_POST['cnpProprietar'];
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
        header("location: ../insertPacienti.php?error=nameoverflow");
        exit();
    }

    if (varcharOverflow50($specie) !== false) {
        header("location: ../insertPacienti.php?error=speciesoverflow");
        exit();
    }

    if (varcharOverflow50($rasa) !== false) {
        header("location: ../insertPacienti.php?error=raceoverflow");
        exit();
    }

    if (varcharOverflow50($culoare) !== false) {
        header("location: ../insertPacienti.php?error=coloroverflow");
        exit();
    }

    if (emptyInputInsertPacienti($cnp, $nume, $specie, $rasa, $sex, $culoare) !== false) {
        header("location: ../insertPacienti.php?error=emptyinput");
        exit();
    }

    if (invalidCnp($cnp) !== false) {
        header("location: ../insertPacienti.php?error=cnpinvalid");
        exit();
    }

    if (cnpExistsInsertProprietari($conn, $cnp) == 0) {
        header("location: ../insertPacienti.php?error=cnpdoesnotexist");
        exit();
    } else {
        $row = cnpExistsInsertProprietari($conn, $cnp);
        $proprietarID = $row['ProprietarID'];
    }

    if (invalidMicrohip($numarMicrocip) !== false) {
        header("location: ../insertPacienti.php?error=invalidMicrohip");
        exit();
    }

    if (microchipExists($conn, $numarMicrocip) !== 0) {
        header("location: ../insertPacienti.php?error=microchipexists");
        exit();
    }

    $numarMicrocip = !empty($numarMicrocip) ? "'$numarMicrocip'" : "NULL";
    $dataNasterii = !empty($dataNasterii) ? "'$dataNasterii'" : "NULL";
    $dataImplantareMicrocip = !empty($dataImplantareMicrocip) ? "'$dataImplantareMicrocip'" : "NULL";
        
    $codPacient = rand(1,1000000);
    $insert = "INSERT INTO `pacienti` (`PacientID`, `ProprietarID`, `CodPacient`, `Nume`, `Specie`, `Rasa`, `Sex`, `Culoare`, `DataNasterii`, `NumarMicrocip`, `DataImplantareMicrocip`, `LocalizareMicrocip`) VALUES (NULL, '$proprietarID', '$codPacient', '$nume', '$specie', '$rasa', '$sex', '$culoare', $dataNasterii, $numarMicrocip, $dataImplantareMicrocip, '$localizareMicrocip');";
    mysqli_query($conn, $insert);

    header("location: ../insertPacienti.php?insert=success");
?>