<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];

    try {
        $database = new PDO("mysql:host=localhost;dbname=nv2_mysql-php;charset=utf8", "root", "");
    } catch (Exception $err) {
        die("Erreur:" . $err->getMessage());
    }

    $req = $database->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $req->execute(array($email));
    $data = $req->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        $id = $data["id"];
        $token = uniqid();
        $expire = time() + 60;

        $req = $database->prepare("DELETE FROM reinitialiser WHERE utilisateur_id = ?");
        $req->execute([$id]);

        $reqReset = $database->prepare("INSERT INTO reinitialiser (utilisateur_id, token, expire) VALUES(?, ?, ?)");
        $reqReset->execute(array($id, $token, $expire));

        $mailTo = "steph@mail.c";
        $message = "newpassword.php?id=" . $id . "&token=" . $token;
        // "<a href='newpassword.php?id=" . $id . "&token=" . $token . ">
        //     Lien vers newpassword.php
        //     </a>";

        mail($mailTo, "Réinitialisation du mot de passe", $message);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="resetpassword.php" method="post">
        <p class="form__group">
            <label for="email" class="form__label">Entrez votre email :</label>
            <input type="text" name="email" id="email" class="form__input">
        </p>
        <input type="submit" name="submit" value="Envoyer" class="form__input">
    </form>
    <?php if (isset($_POST["submit"]) && !$data) { ?>
        <p class="message--error">
            <?= "$email n'existe pas."; ?>
        </p>
    <?php } ?>
</body>

</html>