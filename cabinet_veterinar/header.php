<!DOCTYPE html>

<?php
    include_once 'includes/dbh.inc.php';
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
              margin: 0;
            }

            .topnav {
              overflow: hidden;
              background-color: #367c39;
              margin-bottom: 4px;
            }

            .topnav a {
              float: left;
              color: #f2f2f2;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
              font-size: 17px;
              font-weight: 900;
              border-style: solid;
              border-width: 0px 1px 0px 0px;
              border-color: black;
            }

            .topnav a:hover {
              background-color: #ddd;
              color: black;
              
            }

            .topnav a.active {
              background-color: #4CAF50;
              color: white;
            }
        </style>
    </head>

    <body>

        <div class="topnav">
          <a href = "angajati.php">Angajati</a>
          <a href = "proprietari.php">Proprietari</a>
          <a href = "pacienti.php">Pacienti</a>
          <a href = "tratamente.php">Tratamente</a>
          <a href = "interventi.php">Interventii</a>
          <a href = "simpleQueries.php">Interogari simple</a>
          <a href = "complexQueries.php">Interogari complexe</a>
          <a href = "includes/logout.inc.php" style = "float:right">Log Out</a>
          
        </div>

        <div>