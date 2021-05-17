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
            //Se primeste CNP-ul se verifica integritatea lui
            $cnp = $_POST['CNP'];

            if (emptyCnp($cnp) !== false) {
                header("location: complexQuery1.php?error=emptycnp");
                exit();
            }

            if (invalidCnp($cnp) !== false) {
                header("location: complexQuery1.php?error=cnpinvalid");
                exit();
            }

            
            if (cnpExistsInsertProprietari($conn, $cnp) == 0) {
                header("location: complexQuery1.php?error=cnpdoesnotexist");
                exit();
            }            
            
            // se scrie interogarea
            $query = "SELECT DISTINCT A.Nume AS Nume, A.Prenume AS Prenume, A.Numar_Telefon AS NrTel, A.E_mail AS Email
	                   FROM angajati A JOIN angajatipacienti AP ON (A.AngajatID = AP.AngajatID)
			                           JOIN pacienti P ON (AP.PacientID = P.PacientID)
					                   JOIN proprietari PR ON (P.ProprietarID = PR.ProprietarID)
	                   WHERE A.Functie_Ocupata LIKE 'Medic Veterinar'
                             AND PR.CNP = '$cnp'
                             AND P.CodPacient IN (SELECT DISTINCT PA.CodPacient
                                                   FROM pacienti PA JOIN pacientiinterventii PI ON (PA.PacientID = PI.PacientID)		
                                                   WHERE PA.PacientID IN (SELECT PI1.PacientID
                                                                          FROM pacientiinterventii PI1
                                                                          HAVING COUNT(PI1.InterventieID) > 1) )";
        
            // se realizeaza interogarea efectiva
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
            
            // se face afisarea daca au fost gasite rezultate
            if ($resultCheck > 0) {
               echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7"><h3>Query 1 - Afisati medicul care s-a ocupat de pacientii ce au suferit mai mult de o interventie ai proprietarului cu CNP-ul: ' . $cnp . '</h3></th>
                </tr>
                <t>
                    <th> Nume </th>
                    <th> Prenume </th>
                    <th> Numar de telefon </th>
                    <th> Email </th>
                </t>
                <tr></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['Nume'] . '</td>
                        <td>' . $row['Prenume'] . '</td>
                        <td>' . $row['NrTel'] . '</td>
                        <td>' . $row['Email'] . '</td>
                    </tr>';

                }
               echo '</table>';
             }
        ?>
    </div>
</div>