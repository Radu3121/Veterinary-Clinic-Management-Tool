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
        
            $query = "SELECT PA.Nume AS NumePacient, PA.CodPacient, CONCAT(A.Nume, ' ', A.Prenume)  AS NumeMedic
                      FROM pacienti PA JOIN angajatipacienti AP ON (PA.PacientID = AP.PacientID)
                                       JOIN angajati A ON (AP.AngajatID = A.AngajatID)
                      WHERE A.Functie_Ocupata LIKE 'Medic Veterinar'
                      GROUP BY PA.CodPacient;";
        
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
               echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "3"><h3>Query 3 - Afisati medicul care se ocupa de fiecare pacient</h3></th>
                </tr>
                <t>
                    <th> Nume Pacient </th>
                    <th> Cod Pacient </th>
                    <th> Nume Medic </th>
                </t>
                <tr></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['NumePacient'] . '</td>
                        <td>' . $row['CodPacient'] . '</td>
                        <td>' . $row['NumeMedic'] . '</td>
                    </tr>';

                }
               echo '</table>';
             }
        ?>
    </div>
</div>