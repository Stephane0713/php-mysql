<?php

if (isset($_POST["submit"])) {

    $name = preg_match("/^([^0-9]*)$/", $_POST["name"]) ? $_POST["name"] : false;
    $fname = preg_match("/^([^0-9]*)$/", $_POST["fname"]) ? $_POST["fname"] : false;
    $city = preg_match("/^([^0-9]*)$/", $_POST["city"]) ? $_POST["city"] : false;
    $tel = preg_match("/^0[0-9]( [0-9]{2}){4}$/", $_POST["tel"]) ? $_POST["tel"] : false;
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ? $_POST["email"] : false;
    $gender = $_POST["gender"] == "M" ||
        $_POST["gender"] == "F" ||
        $_POST["gender"] == "N/C" ? $_POST["gender"] : false;
    $subject = $_POST["subject"] >= 1 || $_POST["subject"] <= 5 ? $_POST["subject"] : false;
    $message = !empty($_POST["message"]) ? $_POST["message"] : false;

    $success = $name && $fname && $city && $tel && $email && $gender && $subject && $message;

    if ($success) {
        $mailTo = "fakeemail@fake.com";
        $headers = "From: $email";
        $txt = "$name \n \n";

        mail($mailTo, $subject, $txt, $headers);
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
            <div class="col-8 m-auto">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" class="form-control 
                        <?php if (isset($_POST["submit"]) && !$name) {
                            echo "is-invalid";
                        } ?>" <?php if (isset($_POST["submit"]) && $name) {
                                    echo 'value="' . $name . '"';
                                } ?> required>

                    </div>
                    <div class="form-group">
                        <label for="fname">Prénom</label>
                        <input type="text" id="fname" name="fname" class="form-control
                        <?php if (isset($_POST["submit"]) && !$fname) {
                            echo "is-invalid";
                        } ?>" <?php if (isset($_POST["submit"]) && $fname) {
                                    echo 'value="' . $fname . '"';
                                } ?> required>
                    </div>
                    <div class="form-group">
                        <label for="city">Ville</label>
                        <input type="text" id="city" name="city" class="form-control
                        <?php if (isset($_POST["submit"]) && !$fname) {
                            echo "is-invalid";
                        } ?>" <?php if (isset($_POST["submit"]) && $fname) {
                                    echo 'value="' . $fname . '"';
                                } ?> required>
                    </div>

                    <div class="form-group">
                        <label for="tel">Téléphone</label>
                        <input type="tel" id="tel" name="tel" class="form-control
                        <?php if (isset($_POST["submit"]) && !$tel) {
                            echo "is-invalid";
                        } ?>" <?php if (isset($_POST["submit"]) && $tel) {
                                    echo 'value="' . $tel . '"';
                                } ?> required pattern="0[0-9]( [0-9]{2}){4}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control
                        <?php if (isset($_POST["submit"]) && !$email) {
                            echo "is-invalid";
                        } ?>" <?php if (isset($_POST["submit"]) && $email) {
                                    echo 'value="' . $email . '"';
                                } ?> required>
                    </div>

                    <div class="form-group">
                        <p>Votre genre :</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="M" checked>
                            <label class="form-check-label" for="gender1">
                                Homme
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="F">
                            <label class="form-check-label" for="gender2">
                                Femme
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender3" value="N/C">
                            <label class="form-check-label" for="gender3">
                                Autre
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject">L'objet de votre requête :</label>
                        <select class="form-control" id="subject" name="subject" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="validationTextarea">Votre message :</label>
                            <textarea class="form-control
                            <?php if (isset($_POST["submit"]) && !$message) {
                                echo "is-invalid";
                            } ?>" id="message" name="message" required><?php
                                                                        if (isset($_POST["submit"]) && $message) {
                                                                            echo htmlspecialchars($message);
                                                                        } ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Envoyer" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>