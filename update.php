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
                WHERE ID = :id;";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $statement->bindValue(':voornaam', $_POST['Voornaam'], PDO::PARAM_STR);
        $statement->bindValue('tussenvoegsel', $_POST['Tussenvoegsel'], PDO::PARAM_STR);
        $statement->bindValue(':achternaam', $_POST['Achternaam'], PDO::PARAM_STR);

        $statement->execute();
        echo "Het opslaan is gelukt";
        header('Refresh:; url=read.php');
        
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
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" value="Verstuur">

    </form>    
</body>
</html>