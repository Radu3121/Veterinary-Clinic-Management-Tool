<link rel = "stylesheet" href = "queriesStyle.css">

<?php
    include_once 'header.php';
?>

<div>
    <?php
        include_once 'complexQueryMenu.php';
    ?>


    <div class = "queryContent">
        <table class = "tablestyle">
                <tr>
                    <th colspan = "7">
                        <h3>Query 3 - Numele animalelor si proprietarilor ale caror animale urmeaza mai mult de X tratamente</h3>
                        <!--Form folosit pentru a prelua de la tastatura valorii numerice pentru interogare -->
                        <form action = "complexQuery3Results.php" method="POST">
                            <input type = "text" name = "value" placeholder="Valoare numerica pozitiva">
                            <button type = "submit" class = "deleteButton">Cauta</button>
                        </form> 
                        
                        <?php
                            if(isset($_GET["error"])) {
                                if($_GET["error"] == "badsuminput") {
                                    echo '<h4>Completati campul cu o valoare numerica pozitiva</h4>';
                                }
                            }
                        ?>
                    </th>
                </tr>
    </div>
</div>