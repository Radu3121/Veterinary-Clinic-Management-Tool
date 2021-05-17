<link rel = "stylesheet" href = "selection.css">

<?php 
    include_once 'header.php';
?>

<?php
    $query = "SELECT * FROM pacienti";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
       echo '<table class = "tablestyle">
        <tr>
            <th><h2>Pacienti</h2></th>
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
        <tr></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr> 
                <td>' . $row['CodPacient'] . '</td>
                <td>' . $row['Nume'] . '</td>
                <td>' . $row['Specie'] . '</td>
                <td>' . $row['Rasa'] . '</td>
                <td>' . $row['Sex'] . '</td>
                <td>' . $row['DataNasterii'] . '</td>
                <td>' . $row['Culoare'] . '</td>
                <td>' . $row['NumarMicrocip'] . '</td>
                <td>' . $row['DataImplantareMicrocip'] . '</td>
                <td>' . $row['LocalizareMicrocip'] . '</td>     
            </tr>';
        }
        
        echo '</table>';
     }
?>

    <form action = "includes/deletePacienti.inc.php" method="POST">
        <table class = 'deleteTable'>
            <tr>
                <td><input type = "text" name = "CodPacient" class = "deleteInput" placeholder="Introduceti codul pacientului de sters"></td>
                <td><button type = "submit" class = "deleteButton">Delete</button></td>
            </tr>
        </table>
    </form>   


    <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "patientcodedoesnotexist") {
                echo '<h4>Codul introdus nu corespunde unui pacient</h4>';
            }
        }
    ?>

<?php
    include_once 'iudFooterPacienti.php';
    include_once 'footer.php';
?>