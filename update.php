<?php 
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
    if ($pdo) {
    } else {
        echo "Interne server-error. Probeer het later nog eens";
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $sql = "UPDATE Persoon
                SET Voornaam = :voornaam
                    ,Tussenvoegsel = :tussenvoegsel
                    ,Achternaam = :achternaam
                    ,Telefoonnummer = :telefoonnummer
                    ,Straatnaam = :straatnaam
                    ,Huisnummer = :huisnummer
                    ,Woonplaats = :woonplaats
                    ,Postcode = :postcode
                    ,Landnaam = :landnaam
                WHERE ID = :id;";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $statement->bindValue(':voornaam', $_POST['Voornaam'], PDO::PARAM_STR);
        $statement->bindValue('tussenvoegsel', $_POST['Tussenvoegsel'], PDO::PARAM_STR);
        $statement->bindValue(':achternaam', $_POST['Achternaam'], PDO::PARAM_STR);
        $statement->bindValue(':telefoonnummer', $_POST['Telefoonnummer'], PDO::PARAM_INT);
        $statement->bindValue(':straatnaam', $_POST['Straatnaam'], PDO::PARAM_STR);
        $statement->bindValue(':huisnummer', $_POST['Huisnummer'], PDO::PARAM_INT);
        $statement->bindValue(':woonplaats', $_POST['Woonplaats'], PDO::PARAM_STR);
        $statement->bindValue(':postcode', $_POST['Postcode'], PDO::PARAM_STR);
        $statement->bindValue(':landnaam', $_POST['Landnaam'], PDO::PARAM_STR);

        $statement->execute();
        echo "Het opslaan is gelukt";
        header('Refresh:2; url=read.php');
        
    } catch(PDOException $e) {
        echo "Er is een fout opgetreden";
        header('Refresh:2; url=read.php');
    }
    exit();
} 

$sql = "SELECT Id
              ,Voornaam as VN
              ,Tussenvoegsel as TV
              ,Achternaam as AN
              ,Telefoonnummer as TN
              ,Straatnaam as SN
              ,Huisnummer as HN
              ,Woonplaats as WP
              ,Postcode as PC
              ,Landnaam as LN

        FROM Persoon
        WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>PDO CRUD</title>
</head>
<body>
    <h3>Wijzig het record</h3>

    <form action="update.php" method="post">
        <label for="Voornaam">Voornaam:</label><br>
        <input type="text" id="Voornaam" name="Voornaam" value="<?= $result->VN ?>"><br>
        <br>
        <label for="Tussenvoegsel">Tussenvoegsel:</label><br>
        <input type="text" id="Tussenvoegsel" name="Tussenvoegsel" value="<?= $result->TV ?>"><br>
        <br>
        <label for="Achternaam">Achternaam:</label><br>
        <input type="text" id="Achternaam" name="Achternaam" value="<?= $result->AN ?>"><br>
        <br>
        <label for="Telefoonnummer">Telefoonnummer:</label><br>
        <input type="text" id="Telefoonnummer" name="Telefoonnummer" value="<?= $result->TN ?>"><br>
        <br>
        <label for="Straatnaam">Straatnaam:</label><br>
        <input type="text" id="Straatnaam" name="Straatnaam" value="<?= $result->SN ?>"><br>
        <br>
        <label for="Huisnummer">Huisnummer:</label><br>
        <input type="text" id="Huisnummer" name="Huisnummer" value="<?= $result->HN ?>"><br>
        <br>
        <label for="Woonplaats">Woonplaats:</label><br>
        <input type="text" id="Woonplaats" name="Woonplaats" value="<?= $result->WP ?>"><br>
        <br>
        <label for="Postcode">Postcode:</label><br>
        <input type="text" id="Postcode" name="Postcode" value="<?= $result->PC ?>"><br>
        <br>
        <label for="Landnaam">Landnaam:</label><br>
        <input type="text" id="Landnaam" name="Landnaam" value="<?= $result->LN ?>"><br>
        <br>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" value="Verstuur">

    </form>    
</body>
</html>