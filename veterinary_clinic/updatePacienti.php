<link rel = "stylesheet" href = "selection.css">

<?php 
    include_once 'header.php';
?>

<?php
    $query = "SELECT * FROM pacienti";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
       echo '<table class = "tablestyle">
        <tr>
            <th><h2>Pacienti</h2></th>
        </tr>
        <t>
            <th> Cod Pacient </th>
            <th> Nume </th>
            <th> Specie </th>
            <th> Rasa </th>
            <th> Sex </th>
            <th> Data Nasterii </th>
            <th> Culoare </th>
            <th> Numar Microcip </th>
            <th> Data Implantare Microcip </th>
            <th> Localizare Microcip </th>
        <tr></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr> 
                <td>' . $row['CodPacient'] . '</td>
                <td>' . $row['Nume'] . '</td>
                <td>' . $row['Specie'] . '</td>
                <td>' . $row['Rasa'] . '</td>
                <td>' . $row['Sex'] . '</td>
                <td>' . $row['DataNasterii'] . '</td>
                <td>' . $row['Culoare'] . '</td>
                <td>' . $row['NumarMicrocip'] . '</td>
                <td>' . $row['DataImplantareMicrocip'] . '</td>
                <td>' . $row['LocalizareMicrocip'] . '</td>     
            </tr>';
        }
        
     }
?>

        <form action = "includes/updatePacienti.inc.php" method = "POST">
            <tr>
                <td> <input type = "text" placeholder = "Cod Pacient" name = "CodPacient"> </td>
                <td> <input type = "text" placeholder = "Nume" name = "Nume"> </td>
                <td> <input type = "text" placeholder = "Specie" name = "Specie"> </td>
                <td> <input type = "text" placeholder = "Rasa" name = "Rasa"> </td>
                <td> 
                    <select placeholder = "Sex" name = "Sex" style = "width:50px">
                        <option value = "X" selected hidden></option>
                        <option value = "X">X</option>;
                        <option value = "M">M</option>;
                        <option value = "F">F</option>;
                </td>
                <td> <input type = "date" placeholder = "Data Nasterii" name = "DataNasterii"> </td>
                <td> <input type = "text" placeholder = "Culoare" name = "Culoare"> </td>
                <td> <input type = "text" placeholder = "Numar Microcip" name = "NumarMicrocip"> </td>
                <td> <input type = "date" placeholder = "Data Implantare Microcip" name = "DataImplantareMicrocip"> </td>
                <td> <input type = "text" placeholder = "LocalizareMicrocip" name = "LocalizareMicrocip"> </td>
                <td> <button type = "submit" class = "iudButton">Update</button></td>
            </tr>
        </form>
    
    </table>  
    
    <?php

        if (isset($_GET["error"])) {
            if($_GET["error"] == "nameoverflow") {
                echo '<h4>Numele este prea lung</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "speciesoverflow") {
                echo '<h4>Numele speciei este prea lung</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "raceoverflow") {
                echo '<h4>Numele rasei este prea lung</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "coloroverflow") {
                echo '<h4>Culoarea are prea multe caractere</h4>';
            }
        }
    

        if (isset($_GET["error"])) {
            if($_GET["error"] == "patientcodedoesnotexist") {
                echo '<h4>Codul introdus nu corespunde unui pacient</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "invalidMicrohip") {
                echo '<h4>Numarul de microcip introdus este invalid</h4>';
            }
        }


        if (isset($_GET["error"])) {
            if($_GET["error"] == "microchipexists") {
                echo '<h4>Numarul de microchip introdus exista deja in baza de date</h4>';
            }
        }

        
    ?>

<?php
    include_once 'iudFooterPacienti.php';
    include_once 'footer.php';
?>