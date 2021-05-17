<link rel = "stylesheet" href = "selection.css">

<?php 
    include_once 'header.php';
?>

<?php
    $query = "SELECT * FROM proprietari";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
       echo '<table class = "tablestyle">
        <tr>
            <th><h2>Proprietari</h2></th>
        </tr>
        <t>
            <th> Nume </th>
            <th> Prenume </th>
            <th> CNP </th>
            <th> Strada </th>
            <th> Judet </th>
            <th> Oras / Sector </th>
            <th> Numar Telefon </th>
            <th> Email </th>
        </t>
        <tr></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr> 
                <td>' . $row['Nume'] . '</td>
                <td>' . $row['Prenume'] . '</td>
                <td>' . $row['CNP'] . '</td>
                <td>' . $row['Strada'] . '</td>
                <td>' . $row['Judet'] . '</td>
                <td>' . $row['Oras / Sector'] . '</td>
                <td>' . $row['NumarTelefon'] . '</td>
                <td>' . $row['Email'] . '</td>
                
            </tr>';
            
        }
       echo '</table>';
     }
?>

    <form action = "includes/deleteProprietari.inc.php" method="POST">
        <table class = 'deleteTable'>
            <tr>
                <td><input type = "text" name = "CNP" class = "deleteInput" placeholder="Introduceti CNP-ul proprietarului de sters"></td>
                <td><button type = "submit" class = "deleteButton">Delete</button></td>
            </tr>
        </table>
    </form>

    <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptycnp") {
                echo '<h4>Completati campul de stergere dupa CNP</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "cnpdoesnotexist") {
                echo '<h4>CNP-ul introdus nu exista in baza de date</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "cnpinvalid") {
                echo '<h4>CNP-ul introdus este invalid</h4>';
            }
        }
    ?>

<?php
    include_once 'iudFooterProprietari.php';
    include_once 'footer.php';
?>


































