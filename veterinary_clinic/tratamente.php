<link rel = "stylesheet" href = "selection.css">

<?php 
    include_once 'header.php';
?>

<?php
    
    // Extragere si afisare a datelor din baza de date

    $query = "SELECT * FROM tratamente";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
       echo '<table class = "tablestyle">
        <tr>
            <th><h2>Angajati</h2></th>
        </tr>
        <t>
            <th> Cod Tratament </th>
            <th> Nume Tratament </th>
        </t>
        <tr></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr> 
                <td>' . $row['CodTratament'] . '</td>
                <td>' . $row['NumeTratament'] . '</td>
            </tr>';
        }
        echo '</table>';
     }
?>
    

<?php
    include_once 'footer.php';
?>