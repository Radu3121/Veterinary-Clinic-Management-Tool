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
                        <h3>Query 2 - Proprietari care au cheltuit mai mult de X lei pentru interventii</h3>
                        <!--Form folosit pentru a prelua de la tastatura vloarea numerica pentru interogare -->
                        <form action = "complexQuery2Results.php" method="POST">
                            <input type = "text" name = "sum" placeholder="Valoare in lei">
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