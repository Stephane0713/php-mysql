<?php

if (isset($_POST["submit"])) {
    $player1 = !empty($_POST["player1"]);
    $player2 = !empty($_POST["player2"]);
    $match_nbr = !empty($_POST["match_nbr"] && $_POST["match_nbr"] <= 64 && $_POST["match_nbr"] > 0);
    $screenshot = false;

    if ($_FILES["screenshot"]["error"] === 0) {
        $file_name = $_FILES["screenshot"]["name"];

        $file_ext = explode(".", $file_name);
        $file_ext = end($file_ext);
        $file_ext = strtolower($file_ext);
        $allowed_ext = ["png", "jpg", "jpeg"];

        $file_size = $_FILES["screenshot"]["size"];

        $file_tmp = $_FILES["screenshot"]["tmp_name"];

        $file_new_name = $_POST["match_nbr"] . "_" . $_POST["player1"] . "_" . $_POST["player2"] . "_" . "W" . $_POST["winner"] . "." . strtoupper($file_ext);

        if (in_array($file_ext, $allowed_ext) && $file_size < 2000000) {
            $screenshot = true;
        }
    }

    $success = $player1 && $player2 && $match_nbr && $screenshot;

    if ($success) {
        move_uploaded_file($file_tmp, "uploads/" . $file_new_name);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-dark">
                    <form action="index.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="player1">Nom du joueur 1</label>
                            <?php if (isset($_POST["submit"])) {
                                if ($player1) { ?>
                                    <input type="text" class="form-control" id="player1" name="player1" value="<?php echo $_POST["player1"]?>">
                                <?php } else { ?>
                                    <input type="text" class="form-control is-invalid" id="player1" name="player1">
                                <?php }
                            } else { ?>
                                <input type="text" class="form-control" id="player1" name="player1">
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="player1">Nom du joueur 2</label>
                            <?php if (isset($_POST["submit"])) {
                                if ($player2) { ?>
                                    <input type="text" class="form-control" id="player2" name="player2" value="<?php echo $_POST["player2"]?>">
                                <?php } else { ?>
                                    <input type="text" class="form-control is-invalid" id="player2" name="player2">
                                <?php }
                            } else { ?>
                                <input type="text" class="form-control" id="player2" name="player2">
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="player1">Numero du match</label>
                            <?php if (isset($_POST["submit"])) {
                                if ($match_nbr) { ?>
                                    <input type="text" class="form-control" id="match_nbr" name="match_nbr" value="<?php echo $_POST["match_nbr"]?>">
                                <?php } else { ?>
                                    <input type="text" class="form-control is-invalid" id="match_nbr" name="match_nbr">
                                <?php }
                            } else { ?>
                                <input type="text" class="form-control" id="match_nbr" name="match_nbr">
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <p>Qui a gagné ?</p>
                            <div class="form-check">
                                <input type="radio" name="winner" id="winner1" value="1" class="form-check-input" checked>
                                <label for="winner1" class="form-check-label">Joueur 1</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="winner" id="winner2" value="2" class="form-check-input">
                                <label for="winner2" class="form-check-label">Joueur 2</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input 
                                <?php if (isset($_POST["submit"])) {
                                    echo $screenshot ? "" : "is-invalid";
                                } ?>" id="screenshot" name="screenshot">
                                <label class="custom-file-label" for="screenshot">Uploader votre screenshot</label>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if (isset($_POST["submit"])) {
                    if ($success) { ?>
                        <div class="alert alert-success">Le screenshot a bien été envoyer.</div>
                    <?php } else { ?>
                        <div class="alert alert-danger">
                            <p>Une erreur s'est produite :</p>
                            <?php if (!$player1 || !$player2) {
                                echo "<p>Veuillez remplir les champs dédiés aux nom des joueurs</p>";
                            }
                            if (!$match_nbr) {
                                echo "<p>Veuillez remplir le champ dédié au numero du match, le numero doit etre compris entre 1 et 64</p>";
                            }
                            if (!$screenshot) {
                                echo "<p>Veuillez uploader une image au format jpg, jpeg ou png de moins de 2Mo</p>";
                            } ?>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>

</body>

</html>