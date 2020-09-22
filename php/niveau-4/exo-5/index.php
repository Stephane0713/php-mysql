<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="resultatImpot.php" method="GET">
        <label for="name">Votre nom</label>
        <input type="text" name="name" id="name">

        <label for="income">Votre revenu</label>
        <input type="text" name="income" id="income">

        <button type="submit" name="submit">OK</button>
    </form>
</body>

</html>