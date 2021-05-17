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
                        <h3>Query 1 - Afisati medicul care s-a ocupat de pacientii ce au suferit mai mult de o interventie ai proprietarului cu CNP-ul:</h3>
                        <!--Form folosit pentru a prelua de la tastatura CNP-ul pentru interogare -->
                        <form action = "complexQuery1Results.php" method="POST">
                            <input type = "text" name = "CNP">
                            <button type = "submit" class = "deleteButton">Cauta</button>
                        </form> 
                        
                        <?php
                            if(isset($_GET["error"])) {
                                if($_GET["error"] == "emptycnp") {
                                    echo '<h4>Completati campul cu CNP-ul proprietarului</h4>';
                                }
                            }
                            if(isset($_GET["error"])) {
                                if($_GET["error"] == "cnpinvalid") {
                                    echo '<h4>CNP-ul introdus este invalid</h4>';
                                }
                            }
                            if(isset($_GET["error"])) {
                                if($_GET["error"] == "cnpdoesnotexist") {
                                    echo '<h4>CNP-ul introdus nu exista in baza de date</h4>';
                                }
                            }
                        ?>
                    </th>
                </tr>
    </div>
</div>