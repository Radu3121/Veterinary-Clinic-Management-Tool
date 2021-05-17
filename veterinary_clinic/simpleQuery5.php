<link rel = "stylesheet" href = "queriesStyle.css">

<?php
    include_once 'header.php';
?>

<div>
    <?php
        include_once 'simpleQueryMenu.php';
    ?>


    <div class = "queryContent">
        <table class = "tablestyle">
                <tr>
                    <th colspan = "7">
                        <h3>Query 5 - Afisati ce tratamente urmeaza pacientul cu codul:</h3>
                        <!--Form folosit pentru a prelua de la tastatura CodPacient pentru interogare -->
                        <form action = "simpleQuery5Results.php" method="POST">
                            <input type = "text" name = "CodPacient">
                            <button type = "submit" class = "deleteButton">Cauta</button>
                        </form> 
                        
                        <?php
                            if(isset($_GET["error"])) {
                                if($_GET["error"] == "emptypacientcode") {
                                    echo '<h4>Completati campul cu codul pacientului</h4>';
                                }
                            }
                        
                            if(isset($_GET["error"])) {
                                if($_GET["error"] == "pacientcodedoesnotexist") {
                                    echo '<h4>Codul de pacient introdus nu exista in baza de date</h4>';
                                }
                            }
                        ?>
                    </th>
                </tr>
    </div>
</div>