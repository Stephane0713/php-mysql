<?php

session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <a href="login.php">Allez a login</a>
        <?= $_SESSION["email"] ?>
    </body>

    </html>

<?php } ?>