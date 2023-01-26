<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <title>X</title>
</head>
<body>
    <h3>Create een record</h3>

    <form action="create.php" method="POST">
        <!---->
        <label for="voornaam">Voer hier uw voornaam in:</label> <br>
        <input type="text" name="voornaam" placeholder="Voornaam"> <br><br>
        <!---->
        <label for="tussenvoegsel">Voer hier uw tussenvoegsel in:</label> <br>
        <input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel"> <br><br>
        <!---->
        <label for="achternaam">Voer hier uw achternaam in:</label> <br>
        <input type="text" name="achternaam" placeholder="Achternaam"> <br><br>
        <!---->
        <label for="telefoonnummer">Voer hier uw telefoon nummer in:</label> <br>
        <input type="tel" name="telefoonnummer" placeholder="Telefoonnummer"> <br><br>
        <!---->
        <label for="straatnaam">Voer hier uw straatnaam in:</label> <br>
        <input type="text" name="straatnaam" placeholder="Straatnaam"> <br><br>
        <!---->
        <label for="huisnummer">Voer hier uw huisnummer in:</label> <br>
        <input type="number" name="huisnummer" placeholder="Huisnummer"> <br><br>
        <!---->
        <label for="Woonplaats">Voer hier uw woonplaats in:</label> <br>
        <input type="text" name="woonplaats" placeholder="Woonplaats"> <br><br>
        <!---->
        <label for="postcode">Voer hier uw postcode in:</label> <br>
        <input type="text" name="postcode" placeholder="Postcode"> <br><br>
        <!---->
        <label for="landnaam">Voer hier uw landaam in:</label> <br>
        <input type="text" name="landnaam" placeholder="Landnaam"> <br><br>
        <!---->
        <input type="submit" value="Verstuur" class="verstuur">
        <!---->
    </form>
</body>
</html>