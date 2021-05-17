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
            //Se primeste suma si  se verifica integritatea ei
            $sum = $_POST['sum'];

            if (!is_numeric($sum) || $sum <= 0) {
                header("location: complexQuery2.php?error=badsuminput");
                exit();
            }
         
            
            // se scrie interogarea
            $query = "SELECT PR.Nume AS Nume, PR.Prenume AS Prenume, PR.CNP AS CNP, PR.NumarTelefon AS NrTel, PR.Email AS Email
	                  FROM proprietari PR JOIN pacienti P ON (PR.ProprietarID = P.ProprietarID)
	                  WHERE P.PacientID IN ( SELECT PP.PacientID
						   FROM pacienti PP JOIN pacientiinterventii PI ON (PP.PacientID = PI.PacientID)
                                            JOIN interventii I ON (PI.InterventieID = I.InterventieID)
                                            GROUP BY PP.PacientID
                           HAVING SUM(I.Pret) >= '$sum' )";
        
            // se realizeaza interogarea efectiva
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
            
            // se face afisarea daca au fost gasite rezultate
            if ($resultCheck > 0) {
               echo '<table class = "tablestyle">
                <tr>
                    <th colspan = "7"><h3>Query 2 - Proprietari care au cheltuit mai mult de ' . $sum . ' lei pentru interventii  </h3></th>
                </tr>
                <t>
                    <th> Nume </th>
                    <th> Prenume </th>
                    <th> CNP </th>
                    <th> Numar de telefon </th>
                    <th> Email </th>
                </t>
                <tr></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['Nume'] . '</td>
                        <td>' . $row['Prenume'] . '</td>
                        <td>' . $row['CNP'] . '</td>
                        <td>' . $row['NrTel'] . '</td>
                        <td>' . $row['Email'] . '</td>
                    </tr>';

                }
               echo '</table>';
             }
        ?>
    </div>
</div>