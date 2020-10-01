<?php
if (!isset($_SESSION["id"])) {
    if (isset($_GET["id"]) && isset($_GET["token"])) {
        try {
            $database = new PDO("mysql:host=localhost;dbname=nv2_mysql-php;charset=utf8", "root", "");
        } catch (Exception $err) {
            die("Erreur:" . $err->getMessage());
        }

        $req = $database->prepare("SELECT * FROM reinitialiser WHERE utilisateur_id = ?");
        $req->execute([$_GET["id"]]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if ($data["token"] !== $_GET["token"]) {
            header("Location: error.php");
            echo $data["token"];
            echo $_GET["token"];
        } else {
            session_start();
            $_SESSION["id"] = $_GET["id"];
            header("Location: newpassword.php");
        }
    }
}

session_start();

if (isset($_POST["submit"])) {
    $password = htmlspecialchars($_POST["password"]);
    $password_confirm = htmlspecialchars($_POST["password_confirm"]);
    $isValidPassword = !empty($password) && $password === $password_confirm;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if ($password === $password_confirm) {
        try {
            $database = new PDO("mysql:host=localhost;dbname=nv2_mysql-php;charset=utf8", "root", "");
        } catch (Exception $err) {
            die("Erreur:" . $err->getMessage());
        }

        $req = $database->prepare("SELECT expire FROM reinitialiser WHERE utilisateur_id = ?");
        $req->execute([$_SESSION["id"]]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if ($data["expire"] < time()) {
            $req = $database->prepare("DELETE FROM reinitialiser WHERE utilisateur_id = ?");
            $req->execute([$_SESSION["id"]]);
            header("Location: error.php");
        } else {
            $req = $database->prepare("UPDATE utilisateurs SET mot_de_passe = ? WHERE id = ?");
            $req->execute([$passwordHash, $_SESSION["id"]]);

            $req = $database->prepare("DELETE FROM reinitialiser WHERE utilisateur_id = ?");
            $req->execute([$_SESSION["id"]]);

            header("Location: index.php");
        }
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
    <form class="form__group" action="newpassword.php" method="post">

        <p class="form__group">
            <label for="password" class="form__label">Mot de passe :</label>
            <input type="text" name="password" id="password" class="form__input">
        </p>
        <p class="form__group">
            <label for="password_confirm" class="form__label">Confirmation mot de passe :</label>
            <input type="text" name="password_confirm" id="password_confirm" class="form__input">
        </p>
        <?php if (isset($_POST["submit"]) && !$isValidPassword) { ?>
            <p>Les champs doivent être identiques.</p>
        <?php } ?>
        <p class="form__group">
            <input type="submit" value="Envoyer" name="submit" class="form__input">
        </p>
    </form>
</body>

</html>