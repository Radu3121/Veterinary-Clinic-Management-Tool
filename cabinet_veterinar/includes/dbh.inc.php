<?php

// Conectare la baza de date

$serverName = "localhost";
$dBUserName = "radu";
$dBPassword = "1234Rad!";
$dBName = "cabinet_veterinar";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName); 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}