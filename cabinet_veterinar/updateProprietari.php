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
        
     }
?>
    
        <form action = "includes/updateProprietari.inc.php" method = "POST">
            <tr>
                <td> <input type = "text" placeholder = "Nume" name = "Nume"> </td>
                <td> <input type = "text" placeholder = "Prenume" name = "Prenume"> </td>
                <td> <input type = "text" placeholder = "CNP" name = "CNP"> </td>
                <td> <input type = "text" placeholder = "Strada" name = "Strada"> </td>
                <td> <input type = "text" placeholder = "Judet" name = "Judet"> </td>
                <td> <input type = "text" placeholder = "Oras / Sector" name = "Oras/Sector"> </td>
                <td> <input type = "text" placeholder = "Numar Telefon" name = "NumarTelefon"> </td>
                <td> <input type = "text" placeholder = "Email" name = "Email"> </td>
                <td> <button type = "submit" class = "iudButton">Update</button></td>
            </tr>
        </form>
    
    </table>  

    <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "nameoverflow") {
                echo '<h4>Numele este prea lung</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "firstnameoverflow") {
                echo '<h4>Prenumele este prea lung</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "streetoverflow") {
                echo '<h4>Numele strazii este prea lung</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "countyoverflow") {
                echo '<h4>Numele judetului este prea lung</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "cityoverflow") {
                echo '<h4>Numele orasului este prea lung</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "emailoverflow") {
                echo '<h4>Email-ul este prea lung</h4>';
            }
        }

        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo '<h4>Completati toate campurile</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "cnpexists") {
                echo '<h4>CNP-ul introdus exista deja</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "cnpinvalid") {
                echo '<h4>CNP-ul introdus este invalid</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emailinvalid") {
                echo '<h4>Email-ul introdus este invalid</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "numartelefoninvalid") {
                echo '<h4>Numarul de telefon introdus este invalid</h4>';
            }
        }


        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo '<h4>Completati toate campurile</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "cnpexists") {
                echo '<h4>CNP-ul introdus exista deja</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "cnpinvalid") {
                echo '<h4>CNP-ul introdus este invalid</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emailinvalid") {
                echo '<h4>Email-ul introdus este invalid</h4>';
            }
        }
        if (isset($_GET["error"])) {
            if($_GET["error"] == "numartelefoninvalid") {
                echo '<h4>Numarul de telefon introdus este invalid</h4>';
            }
        }
    ?>
    
<?php
    include_once 'iudFooterProprietari.php';
    include_once 'footer.php';
?>