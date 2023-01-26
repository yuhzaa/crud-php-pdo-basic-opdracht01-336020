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

    $sql = "SELECT Id
                  ,Voornaam
                  ,Tussenvoegsel
                  ,Achternaam
                  ,Telefoonnummer
                  ,Straatnaam
                  ,Huisnummer
                  ,Woonplaats
                  ,Postcode
                  ,Landnaam
            FROM Persoon
            ORDER BY Id";

    $statement = $pdo->prepare($sql);

    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_OBJ);

    $rows = "";
    foreach ($result as $info) {
        $rows .= "<tr>
                    <td>$info->Id</td>
                    <td>$info->Voornaam</td>
                    <td>$info->Tussenvoegsel</td>
                    <td>$info->Achternaam</td>
                    <td>$info->Telefoonnummer</td>
                    <td>$info->Straatnaam</td>
                    <td>$info->Huisnummer</td>
                    <td>$info->Woonplaats</td>
                    <td>$info->Postcode</td>
                    <td>$info->Landnaam</td>
                    <td>
                        <a href='delete.php?id={$info->Id}'>
                            <img src='img/b_drop.png' alt='kruis'>
                        </a>
                    </td>
                    <td>
                        <a href='update.php?id={$info->Id}'>
                            <img src='img/b_edit.png' alt='pencil'>
                        </a>
                    </td>
                  </tr>";
    }
?>

<h3>Persoonsgegevens</h3>
<a href="index.php"><input type="button" value="Nieuw persoon"></a>
<br><br>
<table border="1">
    <thead>
        <th>Id</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Telefoonnummer</th>
        <th>Straatnaam</th>
        <th>Huisnummer</th>
        <th>Woonplaats</th>
        <th>Postcode</th>
        <th>Landnaam</th>
    </thead>
    <tbody>
        <?= $rows; ?>   
    </tbody>
</table>