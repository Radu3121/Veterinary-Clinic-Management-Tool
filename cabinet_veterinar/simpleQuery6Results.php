<link rel = "stylesheet" href = "queriesStyle.css">

<?php
    include_once 'header.php';
    include_once 'simpleQueryMenu.php';
    include_once 'includes/dbh.inc.php';
    include_once 'includes/functions.inc.php';
?>

<div>

    <div class = "queryContent">
        <?php
            //Se primeste codul pacientuluisi si se verifica integritatea lui
            $codPacient = $_POST['CodPacient'];

            if (emptyCnp($codPacient) !== false) {
                header("location: simpleQuery6.php?error=emptypacientcode");
                exit();
            }

            if (patientCodeExists($conn, $codPacient) == 0) {
                header("location: simpleQuery6.php?error=pacientcodedoesnotexist");
                echo $codPacient;
                exit();
            }            
            
            // se scrie interogarea
            $query = "SELECT PA.CodPacient, PA.Nume AS NumePacient, I.NumeInterventie
                      FROM interventii I JOIN pacientiinterventii PI ON (I.InterventieID = PI.InterventieID)
				      JOIN pacienti PA ON (PI.PacientID = PA.PacientID)
                      WHERE PA.CodPacient = $codPacient";
        
            // se realizeaza interogarea efectiva
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
            
            // se face afisarea daca au fost gasite rezultate
            if ($resultCheck > 0) {
               echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7"><h3>Query 6 - Afisati ce interventii a suferit pacientul cu codul: ' . $codPacient . '</h3></th>
                </tr>
                <t>
                    <th> Cod Pacient </th>
                    <th> Nume </th>
                    <th> Nume Interventie </th>
                </t>
                <tr></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['CodPacient'] . '</td>
                        <td>' . $row['NumePacient'] . '</td>
                        <td>' . $row['NumeInterventie'] . '</td>
                    </tr>';

                }
               echo '</table>';
             } else {
                echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7">
                        <h3>
                            Query 6 - Afisati ce interventii a suferit pacientul cu codul: ' . $codPacient . ' <br><br>
                            Pacientul nu a suferit nicio interventie.
                        </h3>
                    </th>
                    
                </tr>';
            }
        ?>
    </div>
</div>