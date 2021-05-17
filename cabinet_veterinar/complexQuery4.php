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
            // se scrie interogarea
            $query = "SELECT P.CodPacient AS CodPacient, P.Nume AS NumePacient, P.NumarMicrocip AS NumarMicrocip
                      FROM pacienti P
                      WHERE P.PacientID IN ( SELECT PP.PacientID
                                             FROM pacienti PP JOIN pacientitratamente PT ON (PP.PacientID = PT.PacientID) )
                      AND P.PacientID IN ( SELECT PP.PacientID
                                             FROM pacienti PP JOIN pacientiinterventii PI ON (PP.PacientID = PI.PacientID) )";
        
            // se realizeaza interogarea efectiva
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
            
            // se face afisarea daca au fost gasite rezultate
            if ($resultCheck > 0) {
               echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7"><h3>Query 4 - Pacientii care urmeaza tratamente si au suferit interventii in cadrul cabinetului</h3></th>
                </tr>
                <t>
                    <th> CodPacient </th>
                    <th> Nume Pacient </th>
                    <th> Numar Microcip </th>
                </t>
                <tr></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['CodPacient'] . '</td>
                        <td>' . $row['NumePacient'] . '</td>
                        <td>' . $row['NumarMicrocip'] . '</td>
                    </tr>';

                }
               echo '</table>';
             }
        ?>
    </div>
</div>