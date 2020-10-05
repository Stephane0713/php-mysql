<?php

if (isset($_POST["submit"])) {
    $lastname = htmlspecialchars($_POST["lastname"]);
    $isValidLastname = !empty($lastname);

    $firstname = htmlspecialchars($_POST["firstname"]);
    $isValidFirstname = !empty($firstname);

    $email = htmlspecialchars($_POST["email"]);
    $isValidEmail = !empty($email);

    $password = htmlspecialchars($_POST["password"]);
    $password_confirm = htmlspecialchars($_POST["password_confirm"]);
    $isValidPassword = !empty($password) && $password === $password_confirm;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $isPro = htmlspecialchars($_POST["isPro"]);
    $isValidPro = !empty($isPro);

    $isValidMentions = !empty($_POST["mentions"]);

    $success = $isValidLastname && $isValidFirstname && $isValidEmail && $isValidPassword && $isValidPro && $isValidMentions;

    if ($success) {
        try {
            $database = new PDO("mysql:host=localhost;dbname=nv2_mysql-php;charset=utf8", "root", "");
        } catch (Exception $e) {
            echo "Une erreur est survenue.";
        }

        $queryReq = $database->prepare("SELECT email FROM utilisateurs WHERE email = :email");
        $queryReq->bindParam(':email', $email);
        $queryReq->execute();
        $data = $queryReq->fetch();

        if (!$data) {
            $insertReq = $database->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, est_professionnel) VALUES (:lastname, :firstname, :email, :password, :isPro)");
            $insertReq->bindValue(':lastname', $lastname);
            $insertReq->bindValue(':firstname', $firstname);
            $insertReq->bindValue(':email', $email);
            $insertReq->bindValue(':password', $passwordHash);
            $insertReq->bindValue(':isPro', $isPro);
            $insertReq->execute();
        } else {
            echo "Existe déjà.";
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
    <form class="form__group" action="signin.php" method="post">
        <p class="form__group">
            <label for="lastname" class="form__label">Nom :</label>
            <input type="text" name="lastname" id="lastname" class="form__input">
        </p>
        <p class="form__group">
            <label for="firstname" class="form__label">Prénom :</label>
            <input type="text" name="firstname" id="firstname" class="form__input">
        </p>
        <p class="form__group">
            <label for="email" class="form__label">Email :</label>
            <input type="text" name="email" id="email" class="form__input">
        </p>
        <p class="form__group">
            <label for="password" class="form__label">Mot de passe :</label>
            <input type="text" name="password" id="password" class="form__input">
        </p>
        <p class="form__group">
            <label for="password_confirm" class="form__label">Confirmation du mot de passe :</label>
            <input type="text" name="password_confirm" id="password_confirm" class="form__input">
        </p>
        <p class="form__group">
            <input type="radio" name="isPro" value="particulier" id="reg" class="form__input" checked>
            <label for="reg">Particulier</label>
        </p>
        <p class="form__group">
            <input type="radio" name="isPro" value="professionel" id="pro" class="form__input">
            <label for="pro">Professionnel</label>
        </p>
        <p class="form__group">
            <input type="checkbox" name="mentions" id="mentions" class="form__input">
            <label for="mentions">Je reconnais avoir pris connaissance des conditions d’utilisation et y adhère totalement</label>
        </p>
        <p class="form__group">
            <input type="submit" value="Valider" name="submit" class="form__input">
        </p>
    </form>
    <?php if (isset($_POST["submit"]) && !$success) { ?>
        <p class="error__message">Une erreur est survenue.</p>
    <?php } ?>
</body>

</html>