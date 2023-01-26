<?php

require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);

    if ($pdo) {
    } else {
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

$sql = "INSERT INTO Persoon (ID
                            ,Voornaam
                            ,Tussenvoegsel
                            ,Achternaam
                            ,Telefoonnummer
                            ,Straatnaam
                            ,Huisnummer
                            ,Woonplaats
                            ,Postcode
                            ,Landnaam)
            
        VALUES              (NULL
                            ,:voornaam
                            ,:tussenvoegsel
                            ,:achternaam
                            ,:telefoonnummer
                            ,:straatnaam
                            ,:huisnummer
                            ,:woonplaats
                            ,:postcode
                            ,:landnaam);";

$statement = $pdo->prepare($sql);

$statement -> bindValue(':voornaam', $_POST['voornaam'], PDO::PARAM_STR);
$statement -> bindValue(':tussenvoegsel', $_POST['tussenvoegsel'], PDO::PARAM_STR);
$statement -> bindValue(':achternaam', $_POST['achternaam'], PDO::PARAM_STR);
$statement -> bindValue(':telefoonnummer', $_POST['telefoonnummer'], PDO::PARAM_INT);
$statement -> bindValue(':straatnaam', $_POST['straatnaam'], PDO::PARAM_STR);
$statement -> bindValue(':huisnummer', $_POST['huisnummer'], PDO::PARAM_INT);
$statement -> bindValue(':woonplaats', $_POST['woonplaats'], PDO::PARAM_STR);
$statement -> bindValue(':postcode', $_POST['postcode'], PDO::PARAM_STR);
$statement -> bindValue(':landnaam', $_POST['landnaam'], PDO::PARAM_STR);

$statement -> execute();

echo "Het opslaan is gelukt";

header('Refresh:2; url=read.php');