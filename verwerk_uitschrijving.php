<?php
// Formulier uitlezen (data binnenhalen)
$mailadres = $_POST['mailadres'];
// connectie maken met de database
$host = 'localhost';
$username = 'ticho_ik';
$password = 'BOIPLOF';
$dbname = '25030_ik';

$dbc = mysqli_connect($host,$username,$password,$dbname) or die ('error connecting.');
// query schrijven voor zoeken naar data
$query = "Select * FROM nieuwsbrief WHERE mailadres = '$mailadres'";
//query uitvoeren
$result = mysqli_query($dbc,$query) or die ('Error querying.');
//Tellen hoeveel regels we nu hebben
$number_of_rows = mysqli_num_rows($result);
// TESTEN OF ER REGELS ZIJN EN DAAR CONCLUSIES AAN VERBINDEN
if ($number_of_rows == 0){
    echo 'Helaas, het mailadres '. $mailadres . ' staat niet in de database.<br>';
    echo '<a href="uitschrijven.php">Klik hier om om het nogmaals te proberen...</a><br>';
    exit();
}
//Query schrijven voor verwijderen van data
$query = "DELETE FROM nieuwsbrief WHERE mailadres = '$mailadres'";
//query uitvoeren
$result = mysqli_query($dbc,$query) or die ('Error Deleting mail.');
//connectie verbreken
mysqli_close($dbc);
//verslag van het resultaat
echo'Het mailadres ' . $mailadres . ' is verwijdered uit de database.<br>';
?>
<a href="index.php">Klik hier om terug te keren naar de homepage</a>
