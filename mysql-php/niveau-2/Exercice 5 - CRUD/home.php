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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                            <!-- <a href="home.php?userid=<?= $user["id"] ?>" class="btn btn-danger">Supprimer</a> -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $user["id"] ?>">Supprimer</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-message">Souhaitez vous vraiment supprimer cet utilisateur ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <a href="#" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-footer a').attr("href", "home.php?userid=" + recipient)
            })
        </script>
    </body>

    </html>

<?php } ?>