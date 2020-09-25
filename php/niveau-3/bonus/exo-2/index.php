<?php

include 'data/data.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">

            <?php foreach ($data as $elt) { ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card">
                        <img src="<?php echo "assets/" . $elt["img"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $elt["name"] ?></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <?=
                                "<p class='card-text'>";
                            if ($elt["note"] != null) {
                                for ($i = 0; $i < $elt["note"]; $i++) {
                                    echo '<i class="fa fa-star"></i>';
                                }
                            } elseif (isset($_POST["submit"])) {
                                for ($i = 0; $i < $_POST['note']; $i++) {
                                    echo '<i class="fa fa-star"></i>';
                                }
                            } else {
                                echo "<form action='index.php' method='POST'>" .
                                    "Note sur 5" .
                                    "<p><select name='note'>" .
                                    "<option value='1'>1</option>" .
                                    "<option value='2'>2</option>" .
                                    "<option value='3'>3</option>" .
                                    "<option value='4'>4</option>" .
                                    "<option value='5'>5</option>" .
                                    "</select></p>" .
                                    "<input type='submit' value='OK' class='btn btn-primary' type='submit' name='submit'>" .
                                    "</form>";
                            }
                            "</p>";
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>