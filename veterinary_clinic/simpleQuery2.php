<link rel = "stylesheet" href = "queriesStyle.css">

<?php
    include_once 'header.php';
?>

<div>
    <?php
        include_once 'simpleQueryMenu.php';
    ?>


    <div class = "queryContent">
        
        <?php
        
            $query = "SELECT CONCAT(PR.Nume, ' ',PR.Prenume) AS NumeProprietar, COUNT(PA.ProprietarID) AS NumarAnimaleDeCompanie
                      FROM proprietari AS PR JOIN pacienti PA ON (PA.ProprietarID = PR.ProprietarID)
                      GROUP BY NumeProprietar;";
        
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
               echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7"><h3>Query 2 - Afisati numarul de pacienti care apartin fiecarui proprietar</h3></th>
                </tr>
                <t>
                    <th> Nume Proprietar </th>
                    <th> Numar Animale De Companie </th>
                </t>
                <tr></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['NumeProprietar'] . '</td>
                        <td>' . $row['NumarAnimaleDeCompanie'] . '</td>
                    </tr>';

                }
               echo '</table>';
             }
        ?>
    </div>
</div>