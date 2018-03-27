<?php

//  POST-ARRAY uitlezen
    $voornaam = $_POST['voornaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $mailadres = $_POST['mailadres'];

//  Data in database stoppen
// connectie maken met de database
$host = 'localhost';
$username = 'ticho_ik';
$password = 'BOIPLOF';
$dbname = '25030_ik';

$dbc = mysqli_connect($host,$username,$password,$dbname) or die ('error connecting.');
//  2. opdracht (QUERY) schrijven voor de database
    $query = "INSERT INTO nieuwsbrief VALUES (0,'$voornaam','$tussenvoegsel','$achternaam','$mailadres')";
//  3. QUERY uitvoeren
    $result = mysqli_query($dbc,$query) or die ('error querying.');
//  4. Verbinding verbreken
    mysqli_close($dbc);

//  Bevestigen dat data in database staat
if ($result){
    echo "De volgende gegevens zijn toegevoegd aan de database.<br>";
    echo $voornaam . '<br>';
    echo $tussenvoegsel . '<br>';
    echo $achternaam . '<br>';
    echo $mailadres . '<br>';
}else{
    echo'Sorry er is iets mis gegaan probeer het opnieuw';
}