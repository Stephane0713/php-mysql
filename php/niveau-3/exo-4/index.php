<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
        $is_valid_name = !empty($_POST["name"]) && preg_match('/^([^0-9]*)$/', $_POST["name"]);
        $is_valid_email = !empty($_POST["email"]) && preg_match('/@/', $_POST["email"]);
        $is_valid_tel = !empty($_POST["tel"]) && preg_match('/^(06|05)([ ][0-9]{2}){4}/', $_POST["tel"]);
        $is_valid_address = !empty($_POST["address"]);
        $is_valid_postal = !empty($_POST["postal"]) && strlen($_POST["postal"]) == 5;

        if($is_valid_name &&
        $is_valid_email &&
        $is_valid_tel &&
        $is_valid_address &&
        $is_valid_postal) {

    ?>

        <style>
            table {
                border: 1px solid black;
                border-collapse: collapse;
            }

            th {
                background-color: #eee;
            }

            td,
            th {
                border: 1px solid black;
                padding: 1em;
            }
        </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>E-mail</th>
                <th>Telephone</th>
                <th>Addresse</th>
                <th>Code postal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <?php echo htmlspecialchars($_POST["name"]) ?> </td>
                <td> <?php echo htmlspecialchars($_POST["email"]) ?> </td>
                <td> <?php echo htmlspecialchars($_POST["tel"]) ?> </td>
                <td> <?php echo htmlspecialchars($_POST["address"]) ?> </td>
                <td> <?php echo htmlspecialchars($_POST["postal"]) ?> </td>
            </tr>
        </tbody>
    </table>
</body>

</html>


<?php } else {

?>

    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        form {
            display: flex;
            flex-direction: column;
            background-color: #eee;
            margin: auto;
            padding: 2rem;
            flex: 0 1 400px;
        }

        input {
            padding: .5em;
            margin: 1em 0 1.5em;
        }
    </style>
    </head>

    <body>

        <form action="index.php" method="post">

            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" 
            <?php if($is_valid_name) {echo 'value="'. $_POST["name"].'"';}?>>

            <label for="email">E-mail :</label>
            <input type="text" name="email" id="email"
            <?php if($is_valid_email) {echo 'value="'. $_POST["email"].'"';}?>>

            <label for="tel">Tel :</label>
            <input type="text" name="tel" id="tel"
            <?php if($is_valid_tel) {echo 'value="'. $_POST["tel"].'"';}?>>

            <label for="address">Addresse :</label>
            <input type="text" name="address" id="address"
            <?php if($is_valid_address) {echo 'value="'. $_POST["address"].'"';}?>>

            <label for="postal">Code postal :</label>
            <input type="text" name="postal" id="postal"
            <?php if($is_valid_postal) {echo 'value="'. $_POST["postal"].'"';}?>>

            <input type="submit" name="submit" value="Envoyer">

        </form>

    </body>

    </html>

<?php } ?>