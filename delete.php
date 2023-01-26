<?php
    require('config.php');

    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPassword, );

        if ($pdo) {
        } else {
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

    $sql = "DELETE FROM Persoon 
            WHERE Id = :id;";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    
    $result = $statement->execute();
    
    if ($result) {
        echo "Het verwijderen is gelukt";

    } else {
        echo "Het verwijderen is niet gelukt";
    }

    header('Refresh:2; url=read.php');
