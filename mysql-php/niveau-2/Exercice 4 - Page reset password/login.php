<?php

if (isset($_POST["submit"])) {

    $login = htmlspecialchars($_POST["login"]);
    $isValidLogin = !empty($login);

    $password = htmlspecialchars($_POST["password"]);
    $isValidPassword = !empty($password);

    $isValidAll = $isValidLogin && $isValidPassword;

    if ($isValidAll) {
        try {
            $database = new PDO("mysql:host=localhost;dbname=nv2_mysql-php;charset=utf8", "root", "");
        } catch (Exception $err) {
            die("Erreur:" . $err->getMessage());
        }

        $selectReq = $database->prepare("SELECT email, mot_de_passe FROM utilisateurs WHERE email = ?");
        $selectReq->execute(array($login));
        $data = $selectReq->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $data["mot_de_passe"])) {
            session_start();
            $_SESSION["email"] = $login;
            header("Location: index.php");
        } else {
            echo "error";
        }
        $insertReq = $database->prepare("INSERT INTO connexions (login, password) VALUES (:login, :password)");
        $insertReq->bindValue(':login', $login);
        $insertReq->bindValue(':password', $password);
        $insertReq->execute();
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
    <form class="form__group" action="login.php" method="post">
        <p class="form__group">
            <label for="login" class="form__label">Email :</label>
            <input type="text" name="login" id="login" class="form__input">
        </p>
        <p class="form__group">
            <label for="password" class="form__label">Mot de passe :</label>
            <input type="text" name="password" id="password" class="form__input">
        </p>
        <p class="form__group">
            <input type="submit" value="Envoyer" name="submit" class="form__input">
        </p>
    </form>
    <a href="resetpassword.php">Mot de passe oubler ?</a>
</body>

</html>