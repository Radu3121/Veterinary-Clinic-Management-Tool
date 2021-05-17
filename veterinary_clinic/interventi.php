<link rel = "stylesheet" href = "selection.css">

<?php 
    include_once 'header.php';
?>

<?php

    // Extragere si afisare a datelor din baza de date    

    $query = "SELECT * FROM interventii";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
       echo '<table class = "tablestyle">
        <tr>
            <th><h2>Interventi</h2></th>
        </tr>
        <t>
            <th> Cod Interventie </th>
            <th> Nume Interventie </th>
            <th> Tip </th>
            <th> Pret (Lei) </th>
            <th> Durata (Minute) </th>
        </t>
        <tr></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr> 
                <td>' . $row['CodInterventie'] . '</td>
                <td>' . $row['NumeInterventie'] . '</td>
                <td>' . $row['Tip'] . '</td>
                <td>' . $row['Pret'] . '</td>
                <td>' . $row['Durata'] . '</td>
            </tr>';
        }
        
        #echo '</table>';
     }
?>

<?php
    include_once 'footer.php';
?>