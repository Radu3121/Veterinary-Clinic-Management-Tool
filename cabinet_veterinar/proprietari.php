<link rel = "stylesheet" href = "selection.css">

<?php 
    include_once 'header.php';
?>

<?php

    // Extragere si afisare a datelor din baza de date

    $query = "SELECT * FROM proprietari";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
       echo '<table class = "tablestyle">
        <tr>
            <th><h2>Proprietari</h2></th>
        </tr>
        <t>
            <th> Nume </th>
            <th> Prenume </th>
            <th> CNP </th>
            <th> Strada </th>
            <th> Judet </th>
            <th> Oras / Sector </th>
            <th> Numar Telefon </th>
            <th> Email </th>
        </t>
        <tr></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr> 
                <td>' . $row['Nume'] . '</td>
                <td>' . $row['Prenume'] . '</td>
                <td>' . $row['CNP'] . '</td>
                <td>' . $row['Strada'] . '</td>
                <td>' . $row['Judet'] . '</td>
                <td>' . $row['Oras / Sector'] . '</td>
                <td>' . $row['NumarTelefon'] . '</td>
                <td>' . $row['Email'] . '</td>
                
            </tr>';
            
        }
       echo '</table>';
     }
?>

<?php
    include_once 'iudFooterProprietari.php';
    include_once 'footer.php';
?>


































