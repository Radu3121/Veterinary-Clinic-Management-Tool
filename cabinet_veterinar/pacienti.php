<link rel = "stylesheet" href = "selection.css">

<?php 
    include_once 'header.php';
?>

<?php

    // Extragere si afisare a datelor din baza de date

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
        
        echo '</table>';
     }
?>
    

<?php
    include_once 'iudFooterPacienti.php';
    include_once 'footer.php';
?>