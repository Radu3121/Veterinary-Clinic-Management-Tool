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
            //Se primeste CNP-ul se verifica integritatea lui
            $cnp = $_POST['CNP'];

            if (emptyCnp($cnp) !== false) {
                header("location: simpleQuery1.php?error=emptycnp");
                exit();
            }

            if (invalidCnp($cnp) !== false) {
                header("location: simpleQuery1.php?error=cnpinvalid");
                exit();
            }

            
            if (cnpExistsInsertProprietari($conn, $cnp) == 0) {
                header("location: simpleQuery1.php?error=cnpdoesnotexist");
                exit();
            }            
            
            // se scrie interogarea
            $query = "SELECT *, Pa.Nume AS NumePacient, Pr.Nume AS NumeProp, Pr.Prenume AS PrenumeProp
                      FROM `pacienti` AS Pa JOIN `proprietari` AS Pr ON (Pa.ProprietarID = Pr.ProprietarID)
                      WHERE Pr.`CNP` = $cnp;";
        
            // se realizeaza interogarea efectiva
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
            
            // se face afisarea daca au fost gasite rezultate
            if ($resultCheck > 0) {
               echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7"><h3>Query 1 - Afisati toti pacienti care apartin proprietarilor cu CNP-ul: ' . $cnp . '</h3></th>
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
                    <th> Nume Proprietar </th>
                    <th> Prenume Proprietar </th>
                </t>
                <tr></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['CodPacient'] . '</td>
                        <td>' . $row['NumePacient'] . '</td>
                        <td>' . $row['Specie'] . '</td>
                        <td>' . $row['Rasa'] . '</td>
                        <td>' . $row['Sex'] . '</td>
                        <td>' . $row['DataNasterii'] . '</td>
                        <td>' . $row['Culoare'] . '</td>
                        <td>' . $row['NumarMicrocip'] . '</td>
                        <td>' . $row['DataImplantareMicrocip'] . '</td>
                        <td>' . $row['LocalizareMicrocip'] . '</td>
                        <td>' . $row['NumeProp'] . '</td>
                        <td>' . $row['PrenumeProp'] . '</td>
                    </tr>';

                }
               echo '</table>';
             }
        ?>
    </div>
</div>