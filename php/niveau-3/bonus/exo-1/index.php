<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_GET["submit"])) {
        echo "Bonjour " . $_GET["name"] . " " . $_GET["fname"] . "tu es né à " . $_GET["city"];
    }

    ?>
    <p>
        <form action="index.php" method="GET">
            <p>
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name">
            </p>

            <p>
                <label for="fname">Prénom :</label>
                <input type="text" id="fname" name="fname">
            </p>

            <p>
                <label for="city">Ville :</label>
                <input type="text" id="city" name="city">
            </p>


            <input type="submit" value="Send" name="submit">
        </form>
    </p>

    <?php

    if (isset($_POST["psubmit"])) {
        echo "Bonjour " . $_POST["pname"] . " " . $_POST["pfname"] . "tu es né à " . $_POST["pcity"];
    }

    ?>
    <p>
        <form action="index.php" method="POST">
            <p>
                <label for="pname">Nom :</label>
                <input type="text" id="pname" name="pname">
            </p>

            <p>
                <label for="fname">Prénom :</label>
                <input type="text" id="pfname" name="pfname">
            </p>

            <p>
                <label for="city">Ville :</label>
                <input type="text" id="pcity" name="pcity">
            </p>


            <input type="submit" value="Send" name="psubmit">
        </form>
    </p>

</body>

</html>