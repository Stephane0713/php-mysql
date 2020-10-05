<?php
include("../users.class.php");
session_start();
$usersReq = new Users();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
} else {
    if (isset($_GET["userid"])) {
        $usersReq->deleteUserById($_GET["userid"]);
        header("Location: home.php");
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #aaa;
                padding: .2em .4em;
            }

            tr td:last-of-type {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usersData = $usersReq->getUsers();
                foreach ($usersData as $user) { ?>
                    <tr>
                        <td><?= $user["prenom"] ?></td>
                        <td><?= $user["nom"] ?></td>
                        <td><?= $user["email"] ?></td>
                        <td><?= $user["est_professionnel"] ?></td>
                        <td>
                            <a href="formuser.php?userid=<?= $user["id"] ?>" class="btn btn-primary">Modifier</a>
                            <a href="home.php?userid=<?= $user["id"] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>

    </html>

<?php } ?>