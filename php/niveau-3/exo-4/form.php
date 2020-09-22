<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th {
            background-color: #eee;
        }

        td, th {
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
                <td> <?php echo htmlspecialchars($_POST["name"])?> </td>
                <td> <?php echo htmlspecialchars($_POST["email"])?> </td>
                <td> <?php echo htmlspecialchars($_POST["tel"])?> </td>
                <td> <?php echo htmlspecialchars($_POST["address"])?> </td>
                <td> <?php echo htmlspecialchars($_POST["postal"])?> </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
