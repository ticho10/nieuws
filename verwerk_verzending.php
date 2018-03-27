<?php
//error Warning: mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set() in C:\Users\Poffertjeskip\Desktop\ma\bewijzenmap\periode1.3\bap\opdracht1\versturen.php on line 2

//lezen post array
$subject = $_POST['subject'];
$message = $_POST['message'];

//1. connectie met DB
$host = 'localhost';
$username = 'ticho_ik';
$password = 'BOIPLOF';
$dbname = '25030_ik';

$dbc = mysqli_connect($host,$username,$password,$dbname) or die ('error connecting.');
//2. kijken in de database en alle mailadressen tevoorschijn halen
$query = "SELECT mailadres FROM nieuwsbrief";
$result = mysqli_query($dbc,$query) or die ('Error querryng');

//3. loopje waarin een bericht wordt verzonden naar mailadressen
while ($row = mysqli_fetch_array($result)){
    echo 'Mail verzonden naar :' . $row['mailadres'] . '<br>';
    $to = $row['mailadres'];
    $headers = 'From: 25030@ma-web.nl';
//    Mail verzenden
    mail($to,$subject,$message,$headers);
}