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
            //Se primeste codul pacientului si se verifica integritatea lui
            $codPacient = $_POST['CodPacient'];

            if (emptyCnp($codPacient) !== false) {
                header("location: simpleQuery5.php?error=emptypacientcode");
                exit();
            }

            if (patientCodeExists($conn, $codPacient) == 0) {
                header("location: simpleQuery5.php?error=pacientcodedoesnotexist");
                echo $codPacient;
                exit();
            }            
            
            // se scrie interogarea
            $query = "SELECT PA.CodPacient, PA.Nume AS NumePacient, T.NumeTratament
                      FROM tratamente T JOIN pacientitratamente PT ON (T.TratamentID = PT.TratamentID)
				      JOIN pacienti PA ON (PT.PacientID = PA.PacientID)
                      WHERE PA.CodPacient = $codPacient;";
        
            // se realizeaza interogarea efectiva
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
            
            // se face afisarea daca au fost gasite rezultate
            if ($resultCheck > 0) {
               echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7"><h3>Query 5 - Afisati ce tratamente urmeaza pacientul cu codul: ' . $codPacient . '</h3></th>
                </tr>
                <t>
                    <th> Cod Pacient </th>
                    <th> Nume </th>
                    <th> Nume Tratament </th>
                </t>
                <tr></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['CodPacient'] . '</td>
                        <td>' . $row['NumePacient'] . '</td>
                        <td>' . $row['NumeTratament'] . '</td>
                    </tr>';

                }
               echo '</table>';
             } else {
                echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7">
                        <h3>
                            Query 5 - Afisati ce tratamente urmeaza pacientul cu codul: ' . $codPacient . ' <br><br>
                            Pacientul nu urmeaza niciun tratament.
                        </h3>
                    </th>
                    
                </tr>';
            }
        ?>
    </div>
</div>