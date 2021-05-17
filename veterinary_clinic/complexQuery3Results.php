<link rel = "stylesheet" href = "queriesStyle.css">

<?php
    include_once 'header.php';
    include_once 'complexQueryMenu.php';
    include_once 'includes/dbh.inc.php';
    include_once 'includes/functions.inc.php';
?>

<div>

    <div class = "queryContent">
        <?php
            //Se primeste valoarea numerica si se verifica integritatea ei
            $value = $_POST['value'];

            if (!is_numeric($value) || $value <= 0) {
                header("location: complexQuery3.php?error=badsuminput");
                exit();
            }
         
            
            // se scrie interogarea
            $query = "SELECT P.CodPacient AS CodPacient, P.Nume AS NumePacient, CONCAT (PR.Nume, ' ', PR.Prenume) AS Proprietar, T.NumeTratament AS NumeTratament
                      FROM pacienti P JOIN proprietari PR ON (P.ProprietarID = PR.ProprietarID)
                                      JOIN pacientitratamente PT ON (PT.PacientID = P.PacientID)
                                      JOIN tratamente T ON (T.TratamentID = PT.TratamentID)
                      WHERE P.PacientID NOT IN (SELECT PP.PacientID
                                                FROM pacienti PP JOIN pacientitratamente PT ON (PP.PacientID = PT.PacientID)
                                                GROUP BY PP.PacientID
                                                HAVING COUNT(PT.TratamentID) < '$value')
                      GROUP BY P.CodPacient";
        
            // se realizeaza interogarea efectiva
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
            
            // se face afisarea daca au fost gasite rezultate
            if ($resultCheck > 0) {
               echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7"><h3>Query 3 - Numele animalelor si proprietarilor ale caror animale urmeaza mai mult de ' .$value. ' tratamente</h3></th>
                </tr>
                <t>
                    <th> CodPacient </th>
                    <th> Nume Pacient </th>
                    <th> Nume Proprietar </th>
                    <th> Nume Tratament </th>
                </t>
                <tr></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['CodPacient'] . '</td>
                        <td>' . $row['NumePacient'] . '</td>
                        <td>' . $row['Proprietar'] . '</td>
                        <td>' . $row['NumeTratament'] . '</td>
                    </tr>';

                }
               echo '</table>';
             }
        ?>
    </div>
</div>